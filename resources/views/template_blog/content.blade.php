@include('template_blog.head')
    <!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
        <!-- row -->
			<div id="hot-post" class="row hot-post">
				
                    @yield('conten')
                
                    @include('template_blog.widget')
        </div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
@include('template_blog.footer')