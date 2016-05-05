@include('admin.partials.form-errors')

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('active', 'Set as active style:') !!}
    {!! Form::select('active', array(
    '1' => 'Yes',
    '0' => 'No'
    ), null, ['id' => 'active', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('desc', 'Description:') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>
<div class="form-group">
    {!! Form::label('css', 'Style CSS:') !!}
    {!! Form::textarea('css', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control'])!!}
</div>

