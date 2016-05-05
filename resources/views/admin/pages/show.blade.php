@extends('admin.main')

@section('content')
    <h1>{{$page->name}}</h1>
    <p>URL: {{$page->slug}}</p>
    <p>On Nav: {{$page->on_nav}}</p>
    <p>Description: {{$page->desc}}</p>
    <p>Created By: {{$page->creator->getFullName()}}</p>
    <p>Last Updated By: {{ $page->updater->getFullName() }} </p>
    <p>Created On: {{$page->created_at}}</p>
    <p>Last Updated On: {{$page->updated_at}}</p>

    <form action="{{action('Admin\PagesController@edit', ['slug'=>$page->slug])}}">
        <input type="submit" class="btn btn-primary" value="Edit">
    </form>
<br/>
    {!! Form::model($page, [
        'method' => 'DELETE',
        'url' => 'admin/pages/'. $page->slug,
        'onsubmit' => "return confirm_delete('$page->name');"
    ]) !!}
        {!! Form::submit('Delete',['class' => 'btn btn-danger'])!!}
    {!! Form::close() !!}
@endsection

@section('footer')
    @include('admin.partials.delete-confirmation')
@endsection