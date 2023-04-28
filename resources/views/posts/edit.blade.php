@extends('main')

@section('title', ' | Edit Post') 

@section('content')

	<div class="container">
		<div class="row">
			<h1>Edit</h1>
		</div>
	</div>

	<hr>

    <dl class="dl-horizontal">
        <dt>Created At:</dt>
        <dd>{{ date('M j, Y' , strtotime($post->created_at)) }}</dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Last Updated At:</dt>
        <dd>{{ date('M j, Y' , strtotime($post->updated_at)) }}</dd>
    </dl>

    <form action="{{ route('posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        제목 : <input type="text" name="title" value="{{ old('title',$post->title) }}"><br>

        내용 : <textarea name="body" id="body" cols="30" rows="10">{{ old('body',$post->body) }}</textarea><br>

        파일 첨부 : 
        <input type="file" name="featured_image">
 
       <button type="submit">저장</button>
    </form>

@endsection