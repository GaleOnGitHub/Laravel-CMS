@extends('admin.main')

@section('content')
    <h1>Edit Article</h1>
    <hr/>
    {!! Form::model($article, ['method' => 'PATCH', 'url' => '/articles/'.$article->id]) !!}
    @include('admin.articles.form', ['submitButtonText' => 'Update Article'])
    {!! Form::close() !!}
@endsection