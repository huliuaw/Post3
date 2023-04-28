@extends('main')

@section('title', ' | Edit Comments')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit Comment</h1>
            <form action="{{ route('comments.update',$comment->id ) }}" method="post">
                @csrf
                @method('put')
                <div class="row">

                    <div class="col-md-6">
                        댓글작성자 : <input type="text" name="name" class="form-control" value="{{ $comment->name }}" readonly>
                    </div>

                    <div class="col-md-12 form-spacing-top">  
                    댓글내용 : <textarea name="comment" rows="5" class="form-control">{{ $comment->comment }}</textarea>
                    </div>
                    <div class="col-md-12">
                       <input type="submit" value="댓글작성" class="btn btn-info btn-block form-spacing-top">
                    </div>
                </div>
            </form>
		</div>
	</div>

@endsection