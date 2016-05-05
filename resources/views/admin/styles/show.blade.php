@extends('admin.main')

@section('content')
    <h1>{{$style->name}}</h1>
    <p>Active:@if($style->active) Yes @else No @endif</p>
    <p>Description: {{$style->desc}}</p>
    <p>Created By: {{$style->creator->getFullName()}}</p>
    <p>Last Updated By: {{ $style->updater->getFullName() }} </p>
    <p>Created On: {{$style->created_at}}</p>
    <p>Last Updated On: {{$style->updated_at}}</p>

    <form action="{{action('Admin\StylesController@edit', ['alias'=>$style->id])}}">
        <input type="submit" class="btn btn-primary" value="Edit">
    </form>
    <br/>
    {!! Form::model($style, [
        'method' => 'DELETE',
        'url' => 'admin/styles/'. $style->id,
        'onsubmit' => "return confirm_delete('$style->name');"
    ]) !!}
        {!! Form::submit('Delete',['class' => 'btn btn-danger'])!!}
    {!! Form::close() !!}
@endsection

@section('footer')
    @include('admin.partials.delete-confirmation')
@endsection