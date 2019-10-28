@extends('layouts.app')
@section('content')
<div class='container'>
<h1>Edit Posts</h1>
{{ Form::open(['action' => ['StudentController@update',$student->id],'method'=>'POST']) }}
<div class="form-group">
    {{Form::label('name','Full Name')}}
    {{Form::text('name',$student->name,['class'=>'form-control','placeholder'=>'Enter student\'s full name here'])}}
</div>
    <div class="form-group">
            {{Form::label('address','Address')}}
            {{Form::text('address',$student->address,['class'=>'form-control','placeholder'=>'Enter student\'s address'])}}
        </div>
    <div class="form-group">
        {{Form::label('faculty','Faculty')}}
        {{Form::text('faculty',$student->faculty,['class'=>'form-control','placeholder'=>'Enter the facult of student'])}}
    </div>
    <div class='form-group'>
        {{Form::label('semester','Semester')}}
        {{Form::text('semester',$student->semester,['class'=>'form-control','placeholder'=>'Enter the student\'s semester'])}}
    <div class='form-group'>
                {{Form::label('details','Details')}}
                {{Form::textarea('details',$student->details,['id'=>'article-ckeditor', 'class'=>'form-control','placeholder'=>'Enter Students Details Here'])}}
            
    </div>
</div>
{{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

{{ Form::close() }}
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
@endsection