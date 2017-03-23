@extends('layouts.app')
@section('title','profile')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <h1>{{$user->fullname()}}</h1>
           <h2>{{$user->email}}</h2>
        </div>

        <div class="col-md-4">
          <img src="{{asset($user->img() ) }} " style="max-width: 100%">
        </div>

    </div>
</div>


@endsection