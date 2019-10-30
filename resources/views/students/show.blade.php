@extends('layouts.app')
@section('content')

 <div class='container'>
   <h1>Detail Information of {{$student->name}}</h1> 
   <hr>
   <div >
   <img src="/storage/student_photos/{{$student->student_photo}}" alt="image-not-found" height='200px' width='200px' style='padding-bottom:5px'>
   </div>
   <hr>
<h4><b>Name: </b> {{$student->name}} &emsp;&emsp;&emsp;&emsp; <b>ID: </b>{{$student->id}}</h4>
<br>
<h4><b>Address: </b> {{$student->address}} &emsp;&emsp;&emsp;&emsp; <b>Faculty: </b>{{$student->faculty}}</h4>
<br>
<h4><b>Semester: </b>{{$student->semester}}</h4>
<br>
<h4><b>Details</b></h4>
<p>{{$student->details}}</p>
</div>
<div class="container">
	
<a href="/student/{{$student->id}}/edit" class="btn btn-primary  ">Edit </a>
{!!Form::open(['action'=>['StudentController@destroy',$student->id],'method'=>'POST','class'=>'pull-right'])!!}	
    {{Form::hidden('_method','DELETE')}}
    {{Form::Submit('Delete',['class'=>'btn btn-danger'])}}
{!!Form::close()!!} 
</div>
@endsection
