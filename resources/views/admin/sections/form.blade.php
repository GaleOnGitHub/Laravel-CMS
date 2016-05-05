@include('admin.partials.form-errors')

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('alias', 'Alias:') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('header', 'Header:') !!}
    {!! Form::text('header', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('order', 'Display Order:') !!}
    {!! Form::text('order', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('desc', 'Description:') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>
<div class="form-group">
    {!! Form::label('all_pages', 'Display on all pages:') !!}
    {!! Form::select('all_pages', array(
    '1' => 'Yes',
    '0' => 'No'
    ), null, ['id' => 'all_pages', 'class' => 'form-control article-display']) !!}
</div>
<div class="form-group">
    {!! Form::label('page_list', 'Pages:') !!}
    {!! Form::select('page_list[]',$pages, null, ['id' => 'multi-list','class' => 'form-control article-display', 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control'])!!}
</div>

@section('footer')
    <script>
        $('#multi-list').select2({
            placeholder: 'Choose a page'
        });
    </script>
@endsection
