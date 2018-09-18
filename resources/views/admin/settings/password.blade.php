@extends('admin.base')

@section('content')
    @if(Session::has('notification'))
        <script>
            showSwal('{{Session::get('notification.type') }}', '{{ Session::get('notification.message') }}');
        </script>
    @endif
    <div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ trans('admin.settings.password.card_title') }}</h4>
                <form method="post" action="{{ route('cp.settings.password.save') }}" class="forms-sample" id="change_password_request">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>{{ trans('admin.settings.password_label') }}</label>
                        <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" id="password">
                    </div>

                    <div class="form-group">
                        <label>{{ trans('admin.settings.confirm_password_label') }}</label>
                        <input type="password" name="password_confirmation" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" id="password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-success mr-2" id="button-password-change">{{ trans('admin.buttons.save') }}</button>
                </form>
                <script>
                    $('#password, #password_confirmation').on('keyup', function() {
                        if($('#password').val() === $('#password_confirmation').val())
                        {
                            $('#button-password-change').prop('disabled', false);
                        } else {
                            $('#button-password-change').prop('disabled', true);
                        }
                    });
                </script>
            </div>
        </div>
    </div>


        <div class="row flex-grow">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('admin.settings.username.card_title') }}</h4>
                        <form method="post" action="{{ route('cp.settings.username.save') }}" class="forms-sample" id="change_password_request">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>{{ trans('admin.settings.username.username_label') }}</label>
                                <input type="text" name="username" class="form-control @if($errors->has('username')) is-invalid @endif" placeholder="{{ Auth::user()->name }}">
                            </div>
                            <button type="submit" class="btn btn-success mr-2" id="button-password-change">{{ trans('admin.buttons.save') }}</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('admin.settings.email.card_title') }}</h4>
                        <form method="post" action="{{ route('cp.settings.email.save') }}" class="forms-sample" id="change_password_request">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>{{ trans('admin.settings.email.email_label') }}</label>
                                <input type="text" name="email" class="form-control" placeholder="{{ Auth::user()->email }}">
                            </div>
                            <button type="submit" class="btn btn-success mr-2" id="button-password-change">{{ trans('admin.buttons.save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection