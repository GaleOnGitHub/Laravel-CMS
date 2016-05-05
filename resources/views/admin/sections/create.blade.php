@extends('admin.main')

@section('content')
    <h1>Create New Section</h1>
    <hr/>
    {!! Form::open(['url' => 'admin/sections']) !!}
        @include('admin.sections.form', ['submitButtonText' => 'Add Section'])
    {!! Form::close() !!}
@endsection