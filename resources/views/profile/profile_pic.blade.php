@extends('profile.master')

@section('content')

<div class="container">
    <ol class="breadcrumb">
      <li><a href="{{url('/')}}">Home</a></li>
      <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
      <li><a href="{{url('/editProfile')}}">Edit Profile</a></li>
      <li><a href="{{url('/changeProfilePhoto')}}">Change Profile Picture</a></li>
    </ol>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Sidebar</div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">

                <div class="panel-heading">{{Auth::user()->name}} - Change your profile picture</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <h3 class="text-center">{{ucwords(Auth::user()->name)}}</h3>
                                <img src="{{url('../')}}/img/{{Auth::user()->pic}}" width="100" height="100" alt="user image" width="120px" height="120px" class="img-circle"/>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-8">

                            <form action="{{url('/')}}/uploadProfilePhoto" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="file" name="pic" class="form-control"/>
                                <br>
                                <input type="submit" name="btn" class="btn btn-success"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
