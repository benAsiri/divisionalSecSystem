@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 9433c531a44c6f164c418979d3209923dfbd288e
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
<<<<<<< HEAD
=======
=======
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
>>>>>>> e055a0f7cc05b2a4e3d0659f2d15cb2a10be7c56
>>>>>>> 9433c531a44c6f164c418979d3209923dfbd288e

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
<<<<<<< HEAD
                                    <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
=======
<<<<<<< HEAD
                                    <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
=======
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
>>>>>>> e055a0f7cc05b2a4e3d0659f2d15cb2a10be7c56
>>>>>>> 9433c531a44c6f164c418979d3209923dfbd288e
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
