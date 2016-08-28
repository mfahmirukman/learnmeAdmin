@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">View Profile</div>

                <div class="panel-body">
                    

                    Name {{Auth::user()->name}}

                    <br>
                    E-mail {{Auth::user()->email}}

                    <a href = "editprofile"><button type="button" class="btn btn-block btn-primary"> Edit Profile</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
