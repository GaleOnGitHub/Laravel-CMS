@extends('admin.main')

@section('content')
    <div class="title">
        <h1>Styles</h1>
        <a class="btn btn-primary" href="{{action('Admin\StylesController@create')}}">New Style</a>
    </div>
    <hr/>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Active</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($styles as $style)
            <tr>
                <td><a href="{{action('Admin\StylesController@show',[$style->id])}}">{{$style->name}}</a></td>
                <td>
                    @if($style->active)
                        <strong>Yes</strong>
                    @else
                        No
                    @endif
                </td>
                <td>
                    {{$style->desc}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection