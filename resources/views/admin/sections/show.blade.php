@extends('admin.main')

@section('content')
    <h1>{{$section->name}}</h1>
    <p>Alias: {{$section->alias}}</p>
    <p>Header: @if($section->header){{$section->header}}@else none @endif</p>
    <p>Display Order: {{$section->order}}</p>
    <ul class="list-inline">
        <li>Pages:</li>
        @foreach($section->pages()->get() as $page)
            <li>{{$page->name}}</li>
        @endforeach
    </ul>
    <p>Description: {{$section->desc}}</p>
    <p>Created By: {{$section->creator->getFullName()}}</p>
    <p>Last Updated By: {{ $section->updater->getFullName() }} </p>
    <p>Created On: {{$section->created_at}}</p>
    <p>Last Updated On: {{$section->updated_at}}</p>

    <form action="{{action('Admin\SectionsController@edit', ['alias'=>$section->alias])}}">
        <input type="submit" class="btn btn-primary" value="Edit">
    </form>
    <br/>
    {!! Form::model($section, [
        'method' => 'DELETE',
        'url' => 'admin/sections/'. $section->alias,
        'onsubmit' => "return confirm_delete('$section->name');"
    ]) !!}
        {!! Form::submit('Delete',['class' => 'btn btn-danger'])!!}
    {!! Form::close() !!}
@endsection

@section('footer')
    @include('admin.partials.delete-confirmation')
@endsection