@extends('admin.main')

@section('content')
    <h1>{{$user->first_name}} {{$user->last_name}}</h1>
    <p>Email: {{$user->email}}</p>
    <ul class="list-inline">
        <li>Permissions:</li>
        @foreach($user->permissions()->get() as $permission)
            <li>{{$permission->name}}</li>
        @endforeach
    </ul>
    <p>Created By: {{$user->creator->getFullName()}}</p>
    <p>Last Updated By: {{ $user->updater->getFullName() }} </p>
    <p>Created On: {{$user->created_at}}</p>
    <p>Last Updated On: {{$user->updated_at}}</p>

    <form action="{{action('Admin\UsersController@edit', ['id'=>$user->id])}}">
        <input type="submit" class="btn btn-primary" value="Edit">
    </form>
<br/>
    {!! Form::model($user, [
        'method' => 'DELETE',
        'url' => 'admin/users/'. $user->id,
        'onsubmit' => "return confirm_delete('$user->email');"
    ]) !!}
        {!! Form::submit('Delete',['class' => 'btn btn-danger'])!!}
    {!! Form::close() !!}
@endsection

@section('footer')
    @include('admin.partials.delete-confirmation')
@endsection