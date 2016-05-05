@extends('admin.main')

@section('content')
    <h1>Create New Page</h1>
    <hr/>
    {!! Form::model($page = new App\Models\Page, ['url' => 'admin/pages']); !!}
        @include('admin.pages.form', ['submitButtonText' => 'Add Page'])
    {!! Form::close() !!}
@endsection