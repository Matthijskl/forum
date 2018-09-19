@extends('admin.base')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('admin.users.edit.card_title') }}</h4>
                    <form method="post" action="{{ route('cp.users.update', ['id' => $user->id]) }}" class="forms-sample" id="change_password_request">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>{{ trans('admin.users.edit.label_username') }}</label>
                            <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif " value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label>{{ trans('admin.users.edit.label_email') }}</label>
                            <input type="text" name="email" class="form-control @if($errors->has('email')) is-invalid @endif " id="" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label>{{ trans('admin.users.edit.label_roles') }}</label><br>
                                    <div class="form-group">
                                        <select class="form-control" name="role[]" multiple>
                                            @foreach($role as $roles)
                                            <option value="{{ $roles->id }}" {{ $user->roles->contains($roles->id) ? 'selected' : '' }}>
                                               {{ $roles->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2" id="button-password-change">{{ trans('admin.buttons.update') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row flex-grow">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            {{ trans('admin.users.edit.card_catagories_title') }}
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created_at</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection