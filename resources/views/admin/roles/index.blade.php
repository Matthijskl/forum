@extends('admin.base')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('admin.roles.add.card_title') }}</h4>
                    <form method="post" action="{{ route('cp.roles.add') }}" class="forms-sample" id="change_password_request">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>{{ trans('admin.roles.add_label') }}</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
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
                    <h4 class="card-title">{{ trans('admin.roles.add.card_title') }}</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td>
                                    <form method="post" action="{{ route('cp.roles.delete', ['role' => $role->id]) }}">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection