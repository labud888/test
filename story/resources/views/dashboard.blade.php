@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="bs-example" data-example-id="panel-without-body-with-table">
    <div class="panel panel-default">
        <div class="panel-heading">
            Job Dashboard
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                @if($jobs)
                @foreach($jobs as $job)
                 <tr>
                    <th scope="row">#</th>
                    <td>{{$job->title}} </td>
                    <td>{{$job->email }}</td>
                    <td>{{$job->description}}</td>
                    </tr>
                 @endforeach
                 @endif
            </tbody>
        </table>
    </div>
</div>
    </div>
</div>
@endsection
