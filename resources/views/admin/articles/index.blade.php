@extends('admin.main')

@section('content')
    <div class="title">
        <h1>Articles</h1>
        <a class="btn btn-primary" href="{{action('Admin\ArticlesController@create')}}">New Article</a>
    </div>
    <hr/>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Archived</th>
            <th>Sections</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td><a href="{{action('Admin\ArticlesController@show',[$article->id])}}">{{$article->name}}</a></td>
                <td>
                    @if($article->archived)
                        <strong>Yes</strong>
                    @else
                        No
                    @endif
                </td>
                <td><ul class="list-inline">
                        @foreach($article->sections()->get() as $section)
                                <li>{{$section->name}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$article->desc}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection