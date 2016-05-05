@extends('admin.main')

@section('content')
    <h1>Create New Style</h1>
    <hr/>
    {!! Form::open(['url' => 'admin/styles']) !!}
        @include('admin.styles.form', ['submitButtonText' => 'Add Style'])
    {!! Form::close() !!}
@endsection