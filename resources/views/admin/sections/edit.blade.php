@extends('admin.main')

@section('content')
    <h1>Edit Section</h1>
    <hr/>
    {!! Form::model($section, ['method' => 'PATCH', 'url' => 'admin/sections/'. $section->alias]) !!}
        @include('admin.sections.form', ['submitButtonText' => 'Update Page'])
    {!! Form::close() !!}
@endsection