@extends('layouts.app')
@section('content')
<div class='container'>
    <h3>Students Details</h3>
@if(count($students)>0)
<table class="table">
    <thead>
      <tr>
        <th scope="col">Student ID</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Class</th>
        <th scope='col'>Semester</th>
        <th scope='col'></th>
      </tr>
    </thead>
    @foreach($students as $student)
        <tbody>
            <th scope='row'>{{$student->id}}</th>
            <td><a href="/student/{{$student->id}}">{{$student->name}}</a></td>
            <td>{{$student->address}}</td>
            <td>{{$student->faculty}}</td>
            <td>{{$student->semester}}</td>
        </tbody>
    @endforeach
@else
    <h3>No students record found</h3>
@endif
</div>
@endsection



