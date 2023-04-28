@extends('main')

@section('title', ' | New Post')

@section('stylesheets')

	<!-- This looks stupid(js in stylesheets) but this is the best way -->
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  	
  	<script>
  		tinymce.init({
  			// selector:'textarea',
  			plugins: 'code'
  		});
  	</script>
	

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                제목 : <input type="text" name="title"><br>

                내용 : <textarea name="body" id="body" cols="30" rows="10"></textarea><br>
                파일 첨부 : 
                <input type="file" name="featured_image">
  
               <button type="submit">저장</button>
            </form>

		</div>
	</div>

@endsection

@section('scripts')

	<script type="text/javascript">
	
	</script>

@endsection