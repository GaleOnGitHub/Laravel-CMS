@include('admin.partials.form-errors')

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('desc', 'Description:') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>
<div class="form-group">
    {!! Form::label('archived', 'Archive article:') !!}
    {!! Form::select('archived', array(
    '1' => 'Yes',
    '0' => 'No'
    ), null, ['id' => 'archived', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('section_list', 'Section:') !!}
    {!! Form::select('section_list[]',$sections, null, ['id' =>'multi-list', 'class' => 'form-control article-display', 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::label('html', 'HTML:') !!}
    {!! Form::textarea('html', null, ['class' => 'form-control html-editor']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control'])!!}
</div>

@section('footer')
    <script>
        tinymce.init({
            selector: '.html-editor',
            height: 250,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: [
                '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });

    </script>
    <script>
        $('#multi-list').select2({
            placeholder: 'Choose a section'
        });
    </script>
@endsection