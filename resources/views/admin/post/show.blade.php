@extends('layouts.admin')
@section('title','$post->title')
@section('content')
<h1>{{$post->title}}</h1>
<p>{{$post->description}}</p>
<img src="{{asset($post->img)}}" style="min-width: 100%;max-width: 100%">
@stop