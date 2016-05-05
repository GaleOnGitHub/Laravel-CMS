@extends('admin.main')

@section('content')

    <h1>{{$article->name}} @if($article->archived) - Archived @endif</h1>
    <p>Title: {{$article->title}}</p>
    <p>Description: {{$article->desc}}</p>
    <ul class="list-inline">
        <li>Sections:</li>
        @foreach($article->sections()->get() as $section)
            <li>{{$section->name}}</li>
        @endforeach
    </ul>
    <p>Created By: {{$article->creator->getFullName()}}</p>
    <p>Last Updated By: {{ $article->updater->getFullName() }} </p>
    <p>Created On: {{$article->created_at}}</p>
    <p>Last Updated On: {{$article->updated_at}}</p>

    <form action="{{action('Admin\ArticlesController@edit', ['id'=>$article->id])}}">
        <input type="submit" class="btn btn-primary" value="Edit">
    </form>

@endsection

@section('footer')
    @include('admin.partials.delete-confirmation')
@endsection