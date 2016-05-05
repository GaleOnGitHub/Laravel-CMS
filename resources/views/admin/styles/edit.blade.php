@extends('admin.main')

@section('content')
    <h1>Edit Style</h1>
    <hr/>
    {!! Form::model($style, ['method' => 'PATCH', 'url' => 'admin/styles/'. $style->id]) !!}
        @include('admin.styles.form', ['submitButtonText' => 'Update Style'])
    {!! Form::close() !!}
@endsection