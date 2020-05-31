@extends('template_blog.content')
@section('conten')
<div class="col-md-8 hot-post-left">
                    <!-- post -->
					@foreach($data as $res)
					<div class="post post-row">
						<a class="post-img" href="blog-post.html"><img src="{{ asset($res->image) }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{ $res->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ route('content.blog', $res->slug) }}">{{ $res->title }}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{ $res->users->name }}</a></li>
								<li>{{ $res->created_at->format('d-m-Y') }}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<center>{{ $data->links() }}</center>
</div>
					<!-- /post -->
@endsection