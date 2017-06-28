<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\friendships;
//use App\notifcations;

class ProfileController extends Controller
{
    public function index($slug){
        return view('profile.index')->with('data', Auth::user()->profile);
    }

    public function uploadProfilePhoto(Request $request){

    	// use dd to see the data on the screen
    	//dd($request->all('pic'));

        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $filename = $file->getClientOriginalName();
            $path = 'img/';
            $file->move($path, $filename);
            $user_id = Auth::user()->id;

            //laravel update query
            DB::table('users')->where('id', $user_id)->update(['pic' => $filename]);

            return back();

        }else{
            echo 'There was an error uploading the image';
        }
    }

    public function editProfileForm(){
        return view('profile.editProfile')->with('data', Auth::user()->profile);
    }

    public function searchMembers(){
        $uid = Auth::user()->id;
        $allUsers = DB::table('profiles')
            ->leftJoin('users', 'users.id', '=', 'profiles.user_id')
            ->where('users.id', '!=', $uid)
            // ->where('users.id', '!=', 1)
            ->get(); 
        return view('profile.searchMembers', compact('allUsers'));
    }

    //send friend request to database
    public function sendFriendRequest($id){
        Auth::user()->addFriend($id); //pass id to friendable.php
        return back();
    }

    //view friend requests
    public function friendRequests(){
        $uid = Auth::user()->id;
        $FriendRequests = DB::table('friendships')
            ->rightJoin('users', 'users.id', '=', 'friendships.requester')
            ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('friendships.user_requested', '=', $uid)->get();

        return view('profile.friendRequests', compact('FriendRequests'));
    }


    //accept friend requests
    public function acceptFriend($id){
        $uid = Auth::user()->id;
        $checkRequest = friendships::where('requester', $id)
            ->where('user_requested', $uid)
            ->first();

        if($checkRequest){
            DB::table('friendships')
            ->where('user_requested', $id)
            ->where('requester', $uid)
            ->update(['status' => 1]);

            return back();
        }
        else
        {
            echo "error";
        }
    }


}
