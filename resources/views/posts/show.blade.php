@extends('main')

@section('title', ' | Post')

@section('content')


	<script type="text/javascript">  
		    function toggle_visibility(id) {
		       var e = document.getElementById(id);
		       alert("toggle_visibility");
		    }
	</script>
    {{-- with('post', $post)->with('auth', $auth) --}}

    <div class="col-md-12">
        @if($post->image != null)
            <center><img src="{{ asset('images/'.$post->image) }}" class="featured-image img-responsive"></center>
            @endif
        <h1>{{ $post->title }}</h1>
        <div class="lead">{!! $post->body !!}</div>  
        <h4>{{ date('M j, Y' , strtotime($post->created_at)) }}</h4>

    </div>

    <a onclick="toggle_visibility({{ $post->id }});" class="btn btn-primary btn-xs">토글</a><br>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-xs">Edit</a><br>

    <form action="{{ route('posts.destroy',$post->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="삭제">
    </form>

    {{-- 댓글 폼 --}}
    <div class="row form-spacing-top">
        <div id="comment-form" class="col-md-12">
            <div class="lead">Add Comment</div>
            <form action="{{ route('comments.store',$post->id ) }}" method="post">
                @csrf
                <div class="row">

                    @if( !$auth )

                    <div class="col-md-6">
                        댓글작성자 : <input type="text" name="name" class="form-control">
                    </div>

                    @endif

                    <div class="col-md-12 form-spacing-top">  
                    댓글내용 : <textarea name="comment" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                       <input type="submit" value="댓글작성" class="btn btn-info btn-block form-spacing-top">
                    </div>
                </div>
            </form>
        </div>
    </div>	
    {{-- 댓글 테이블 --}}
    <div id="backend-comments" style="margin-top: 50px;">
        <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

        <table class='table'> 
            <tr>
                <th class="active">No.</th>
                <th class="active">Name</th> 
                <th class="active">Comment</th>
                <th class="active" width="160px"></th>
            </tr> 
            @foreach ($post->comments as $comment)
            {{-- $comment->post()->associate($post) --}}
            <tr>
                <td class="info">{{ $comment->id }}.</td> 
                <td class="info">{{ $comment->name }}</td> 
                <td class="info">{{ $comment->comment }}</td>
                <td class="info">
                    <a onclick="toggle_visibility({{ $comment->id }});" class="btn btn-primary btn-xs">Reply</a>
                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-success btn-xs">Edit</a>
                    <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">GET 방식 삭제</a>
                    <form action="{{ route('comments.destroy',$comment->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="DESTROY 삭제">
                    </form>
                </td>
            </tr>  
            @endforeach
        </table>
    </div>

@endsection