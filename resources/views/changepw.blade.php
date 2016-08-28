@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>

                <div class="panel-body">
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4" style="padding-top:10%;">
                                <form method="POST" action="/password/reset">
                                {!! csrf_field() !!}
                                <input type="hidden" name="token" value="{{ $token }}">

                                @if (count($errors) > 0)
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div>
                                    Email
                                    <input type="email" name="email" value="{{ old('email') }}">
                                </div>

                                <div>
                                    Password
                                    <input type="password" name="password">
                                </div>

                                <div>
                                    Confirm Password
                                    <input type="password" name="password_confirmation">
                                </div>

                                <div>
                                    <button type="submit">
                                        Reset Password
                                    </button>
                                </div>
                            </form>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <?php if(isset($_GET['error'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                                <h4>
                                                    Alert!
                                                </h4> <strong>Warning!</strong> <?php echo $_GET['error']; ?>
                                            </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
