@extends('layouts.app')
@section('content')
<div class='container'>
<h1>Create Posts</h1>
{{ Form::open(['action' => 'StudentController@store','method'=>'POST','enctype'=>'multipart/form-data']) }}
<div class="form-group">
    {{Form::label('name','Full Name')}}
    {{Form::text('name','',['class'=>'form-control','placeholder'=>'Enter student\'s full name here'])}}
</div>
    <div class="form-group">
            {{Form::label('address','Address')}}
            {{Form::text('address','',['class'=>'form-control','placeholder'=>'Enter student\'s address'])}}
        </div>
    <div class="form-group">
        {{Form::label('faculty','Faculty')}}
        {{Form::text('faculty','',['class'=>'form-control','placeholder'=>'Enter the facult of student'])}}
    </div>
    <div class='form-group'>
        {{Form::label('semester','Semester')}}
        {{Form::text('semester','',['class'=>'form-control','placeholder'=>'Enter the student\'s semester'])}}
    <div class='form-group'>
                {{Form::label('details','Details')}}
                {{Form::textarea('details','',['class'=>'form-control','placeholder'=>'Enter Students Details Here'])}}
            
    </div>
    <div class='form-group'></div>
    {{Form::label('student\'s_photo ','Student\'s Photo')}}
    <br>
        {{Form::file('student_photo')}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

{{ Form::close() }}
</div>
@endsection

