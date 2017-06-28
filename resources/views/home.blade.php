@extends('profile.master')

@section('content')
<div class="container">
    <ol class="breadcrumb">
      <li><a href="{{url('/')}}">Home - home.blade</a></li>
    </ol>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Sidebar</div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">USER Dashboard home.blade</div>

                <div class="panel-body">
                    You are logged in as <strong>{{ ucwords(Auth::user()->name) }}</strong>!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
