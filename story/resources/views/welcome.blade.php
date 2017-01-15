@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <p>For testing you need to create two users </p>
                    <ul>
                         <li>user 1</li>
                        <li>username 'manager' </li>
                        <li>email  'your real email for testing propouse'  manager@gmail.com</li>
                        <li> password  'must be at least 6 characters'     123456</li>
                         <li>user 2</li>
                        <li>username 'moderator' </li>
                        <li>email  'your real email for testing propouse' current is moderator@gmail.com</li>
                        <li>password  'must be at least 6 characters'    123456</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
