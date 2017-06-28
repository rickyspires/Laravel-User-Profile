@extends('profile.master')

@section('content')

<div class="container">
    <ol class="breadcrumb">
      <li><a href="{{url('/')}}">Home</a></li>
      <li><a href="{{url('/friendsRequests')}}">Friends Requests</a></li>
    </ol>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Sidebar</div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">

                <div class="panel-heading">Friends Requests</div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            @foreach($FriendRequests as $uList)

                                <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                                    <div class="col-md-2 pull-left">
                                        <img src="{{url('../')}}/img/{{$uList->pic}}"
                                        width="80px" height="80px" class="img-rounded"/>
                                    </div>

                                    <div class="col-md-7 pull-left">
                                        <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$uList->slug}}">
                                          {{ucwords($uList->name)}}</a></h3>

                                          <p><i class="fa fa-globe"></i> {{$uList->city}}  - {{$uList->country}}</p>
                                          
                                          
                                    </div>

                                    <div class="col-md-3 pull-right">
                                        <p>
                                            <a href="{{url('/acceptFriend')}}/{{$uList->id}}" class="btn btn-info btn-sm">Confirm</a>
                                        </p>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
