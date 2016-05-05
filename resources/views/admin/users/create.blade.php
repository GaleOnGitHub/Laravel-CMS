@extends('admin.main')

@section('content')
    <h1>Create New User</h1>
    <hr/>
    {!! Form::model($user = new App\User, ['url' => 'admin/users']); !!}
        @include('admin.users.form', ['submitButtonText' => 'Add User'])
    {!! Form::close() !!}
@endsection
