@extends('admin.main')

@section('content')
        <div class="title">
            <h1>Pages</h1>
            <a class="btn btn-primary" href="{{action('Admin\PagesController@create')}}">New Page</a>
        </div>
        <hr/>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>On Nav</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td><a href="{{action('Admin\PagesController@show',[$page->slug])}}">{{$page->name}}</a></td>
                    <td>
                        {{$page->slug}}
                    </td>
                    <td>
                        @if($page->on_nav) Yes @else No @endif
                    </td>
                    <td>{{$page->desc}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

@endsection