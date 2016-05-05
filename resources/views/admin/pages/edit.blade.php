@extends('admin.main')

@section('content')
    <h1>Edit Page</h1>
    <hr/>
    {!! Form::model($page, ['method' => 'PATCH', 'url' => 'admin/pages/'. $page->slug]) !!}
        @include('admin.pages.form', ['submitButtonText' => 'Update Page'])
    {!! Form::close() !!}
@endsection