@extends('admin.main')

@section('content')
    <h1>Create New Article</h1>
    <hr/>
    {!! Form::model($article = new App\Models\Page,['url' => 'admin/articles']); !!}
        @include('admin.articles.form', ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!}
@endsection