@extends('profile.master')

@section('content')

<div class="container">
    <ol class="breadcrumb">
      <li><a href="{{url('/')}}">Home</a></li>
      <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
      <li><a href="{{url('/editProfile')}}">Edit Profile</a></li>
    </ol>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Sidebar</div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">

                <div class="panel-heading">{{Auth::user()->name}} - Update Your Profile</div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <h3 class="text-center">{{ucwords(Auth::user()->name)}}</h3>
                                <img src="{{url('../')}}/img/{{Auth::user()->pic}}" alt="default male user image" width="120px" height="120px" />

                                <a href="{{url('/')}}/changeProfilePhoto" title="change profile image" style="display: block;" class="text-center">Change Image</a>
                                
                                
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-8">

                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="form-label">About</span>
                                        <textarea type="text" class="form-control col-md-12" rows="10" placeholder="About me" name="about" value="{{$data->about}}"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="form-label">City</span>
                                        <input type="text" class="form-control col-md-12" placeholder="City Name" name="city" value="{{$data->city}}">
                                    </div>
                                    <div class="input-group">
                                        <span class="form-label">County</span>
                                        <input type="text" class="form-control col-md-12" placeholder="County Name" name="state" value="{{$data->state}}">
                                    </div>
                                    <div class="input-group">
                                        <span class="form-label">Country</span>
                                        <input type="text" class="form-control col-md-12" placeholder="Country Name" name="country" value="{{$data->country}}">
                                    </div>
                                    <div class="input-group">
                                        <input type="submit" class="btn btn-success pull-right">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
