@extends('admin.main')

@section('content')
    <div class="title">
        <h1>Users</h1>
        <a class="btn btn-primary" href="{{action('Admin\UsersController@create')}}">New User</a>
    </div>
    <hr/>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Permissions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td><a href="{{action('Admin\UsersController@show',[$user->id])}}">{{$user->first_name}} {{$user->last_name}}</a></td>
                <td>
                    {{$user->email}}
                </td>
                <td><ul class="list-inline">
                        @foreach($user->permissions()->get() as $permission)
                            <li>{{$permission->name}}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection