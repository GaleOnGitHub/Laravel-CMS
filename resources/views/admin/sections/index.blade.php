@extends('admin.main')

@section('content')
    <div class="title">
        <h1>Sections</h1>
        <a class="btn btn-primary" href="{{action('Admin\SectionsController@create')}}">New Section</a>
    </div>
    <hr/>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Order</th>
                <th>Pages</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sections as $section)
            <tr>
                <td><a href="{{action('Admin\SectionsController@show',[$section->alias])}}">{{$section->name}}</a></td>
                <td>{{$section->order}}</td>
                <td><ul class="list-inline">
                        @if($section->all_pages)
                            <li>All</li>
                        @else
                            @foreach($section->pages()->get() as $page)
                                <li>{{$page->name}}</li>
                            @endforeach
                        @endif
                    </ul>
                <td>{{$section->desc}}</td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--@foreach($sections as $section)--}}
        {{--<h3><a href="{{action('Admin\SectionsController@show',[$section->alias])}}">{{$section->name}}</a></h3>--}}
        {{--<p>{{$section->desc}}</p>--}}
    {{--@endforeach--}}
@endsection