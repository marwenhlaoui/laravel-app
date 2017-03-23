@extends('layouts.admin')
@section('title','create post')
@section('content')
<div class="col-md-12 well">
    <a href="{{route('admin.post.index')}}" class="btn btn-success">all posts</a>

</div>
<div class="col-md-12">
	<form class="form-horizontal" action="{{route('admin.post.store')}}" method="post" enctype='multipart/form-data'>
	 {{ csrf_field() }}
	  <fieldset>
	    <legend>Create post</legend>
	    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	      <label for="inputtitle" class="col-lg-2 control-label">Title</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputtitle" placeholder="title" name="title" value="{{old('title')}}">
	            @if ($errors->has('title'))
                    <span class="help-block">
                       <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
	      </div>
	    </div>
	    
	    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	      <label for="textArea" class="col-lg-2 control-label">Description</label>
	      <div class="col-lg-10">
	        <textarea class="form-control" rows="3" id="textArea" name='description' maxlength="200"  >{{old('content')}}</textarea>
	        @if ($errors->has('description'))
                    <span class="help-block">
                       <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
	        
	      </div>
	    </div>

	    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
	      <label for="textContent" class="col-lg-2 control-label">Content</label>
	      <div class="col-lg-10">
	        <textarea class="form-control" rows="6" id="textContent" name='content' >{{old('content')}}</textarea>
	        @if ($errors->has('content'))
                    <span class="help-block">
                       <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
	        
	      </div>
	    </div>


        <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
	      <label for="inputtags" class="col-lg-2 control-label">Tags</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputtags" placeholder="tags" name="tags" value="{{old('tags')}}">
	        @if ($errors->has('tags'))
                    <span class="help-block">
                       <strong>{{$errors->first('tags')}}</strong>
                    </span>
                @endif
	      </div>
	    </div>


	     <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
	      <label for="inputimg" class="col-lg-2 control-label">Image</label>
	      <div class="col-lg-10">
	        <input type="file" class="form-control" id="inputimg" name="img">
	        @if ($errors->has('img'))
                    <span class="help-block">
                       <strong>{{ $errors->first('img') }}</strong>
                    </span>
                @endif
	      </div>
	    </div>

	   
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-default">Cancel</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </div>
	  </fieldset>
	</form>
</div>
@stop