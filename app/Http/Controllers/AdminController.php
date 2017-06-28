<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }


    // public function index($slug){
    //     return view('admin.admin')->with('data', Auth::user()->profile);
    // }

    public function uploadProfilePhoto(Request $request){


        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $filename = $file->getClientOriginalName();
            $path = 'img/';
            $file->move($path, $filename);
            $user_id = Auth::user()->id;

            //laravel update query
            DB::table('admins')->where('id', $user_id)->update(['pic' => $filename]);

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
        $alladmins = DB::table('profiles')
            ->leftJoin('admins', 'admins.id', '=', 'profiles.user_id')
            ->where('admins.id', '!=', $uid)
            // ->where('admins.id', '!=', 1)
            ->get(); 
        return view('profile.searchMembers', compact('alladmins'));
    }


}