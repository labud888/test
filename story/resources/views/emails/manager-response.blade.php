@extends('layouts.email')

@section('content')
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h1>Job Application</h1></div>
  <div class="panel-body">
      <p><strong>Job Title:</strong> {{$title}}</p>
  </div>
</div>
@endsection
