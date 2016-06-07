@extends('masterPage')

@section('content')
    <style>
        .c_img_upload_btn{
            background: #228500;
            border: 1px solid #228500;
            color: #FFF;
            padding: 8px 15px;
            width: 100%;
            margin-top: 3px;
        }
        .c_img_upload_btn:hover{
            background:#2AA700;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">
                        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/EditProfileSave') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('profile_img') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Profile Image</label>

                                <div class="col-md-6">
                                    <div style="padding: 10px;padding-left: 20px">
                                        <div id="profile_thumb" onmouseenter="profile_image_over('view')" onmouseleave="profile_image_over('close')" style="height: 180px;width: 100%;background-size: 100%;background-position: center;background-repeat: no-repeat;border-radius: 4px;;background-color: rgba(220, 220, 220, 0.36)">
                                            <div id="profile-img-picker" onclick="get_image('profile_thumb','h_profile_thumb')" style="padding: 15% 35%;">
                                                <i style="background: rgba(255, 255, 255, 0.71);font-size: 60px;color: #2C3B41;padding: 15px;border-radius: 50%;box-shadow: 0px 0px 10px #000" class="fa fa-cloud-upload" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input class="file_input" type="file" data-id="profile_thumb" data-icon="{{ URL::asset('') }}" id="h_profile_thumb" name="profile_img" style="display:none"/>
                                    </div>
                                    @if ($errors->has('profile_img'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('profile_img') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" id="update-btn" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>&nbsp;&nbsp;Update
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
