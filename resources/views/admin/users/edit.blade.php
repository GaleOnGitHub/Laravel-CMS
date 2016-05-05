@extends('admin.main')

@section('content')
    <h1>Edit User</h1>
    <hr/>
    {!! Form::model($user, ['method' => 'PATCH', 'url' => 'admin/users/'. $user->id]) !!}
        @include('admin.users.form', ['submitButtonText' => 'Update User'])
    {!! Form::close() !!}
@endsection