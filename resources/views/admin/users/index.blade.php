@extends('admin.base')

@section('content')
    <div class="row col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ trans('admin.users.table.title') }}</h4>
                <p class="card-description">
                    {{ trans('admin.users.table.description') }}
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                User
                            </th>
                            <th>
                                First name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Roles
                            </th>
                            <th>
                                Aangemaakt op
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces-clipart/pic-1.png" alt="image">
                                </td>
                                <td>
                                    <a href="{{ route('cp.users.edit', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    @foreach($user->roles as $roles)
                                        <label class="badge badge-{{ $roles->label_type }}">{{ $roles->name }}</label>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $user->created_at }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection