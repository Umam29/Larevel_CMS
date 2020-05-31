@extends('template_blog.content')
@section('conten')

    @foreach ($data as $res)
    <div id="post-header" class="page-header">
			<div class="page-header-bg" style="background-image: url({{ asset($res->image) }});" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="category.html">{{ $res->category->name }}</a>
						</div>
						<h1>{{ $res->title }}</h1>
						<ul class="post-meta">
							<li><a href="author.html">{{ $res->users->name }}</a></li>
							<li>{{ $res->created_at->diffForHumans() }}</li>
							<!-- <li><i class="fa fa-comments"></i> 3</li>
							<li><i class="fa fa-eye"></i> 807</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>

        <div class="col-md-8 hot-post-left">
        <br>

        <div class="section-row">
            {!! $res->content !!}
        </div>
    @endforeach
    </div>

@endsection