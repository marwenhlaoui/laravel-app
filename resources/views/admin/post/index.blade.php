@extends('layouts.admin')
@section('title','posts')
@section('content')
<div class="col-md-12 well">
    <a href="{{route('admin.post.create')}}" class="btn btn-success">new post</a>

</div>
<div class="col-md-12">
	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>#</th>
	      <th>title</th>
	      <th>description</th>
	      <th>date</th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
				@foreach($posts as $post)
				    <tr>
				      <td>{{$post->id}}</td>
				      <td>{{$post->title}}</td>
				      <td>{{str_limit($post->description,100,' ...')}}</td>
				      <td>{{$post->created_at}}</td>
				      <td>
				      	<a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-success btn-xs">Show</a>
				      	<a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-info btn-xs">Edit</a> 
				      	<form action="{{route('admin.post.destroy',$post->id)}}" method="post" class="pull-right">
				      	{{ method_field('DELETE') }}
	                    {{ csrf_field() }}
				      		<input type="submit" value="delete" class="btn btn-xs btn-danger" >
				      	</form>
				      </td>
				    </tr>
				@endforeach
			   
	  </tbody>
	</table> 
</div>
@stop