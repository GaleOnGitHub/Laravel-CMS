@include('admin.partials.form-errors')

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'URL Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('desc', 'Description:') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>
<div class="form-group">
    {!! Form::label('on_nav', 'Display on navigation bar:') !!}
    {!! Form::select('on_nav', array(
        '1' => 'Yes',
        '0' => 'No'
    ), null, ['id' => 'on_nav', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control'])!!}
</div>

