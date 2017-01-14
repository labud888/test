@extends('layouts.email')

@section('content')
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h1>Job Application</h1></div>
  <div class="panel-body">
    <p><strong>Message:</strong>  Job applications awaiting

    <a type="button" class="btn btn-success" href="{{url('job-response', ['id'=>$id,'status' => 1])}}">Approve</a> or
    <a type="button" class="btn btn-danger" href="{{url('job-response', ['id'=>$id,'status' => 3])}}">Reject</a></p>

    <p><strong>Job Title:</strong> {{$title}}</p>
    <p><strong>Job Email:</strong> {{$email}}</p>
    <p><strong>Job Description:</strong> {{$description}}</p>
  </div>
</div>
@endsection
