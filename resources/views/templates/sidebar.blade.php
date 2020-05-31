<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="index.html">Stisla</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="index.html">St</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="active">
				<a href="{{ route('home') }}" class="nav-link">
					<i class="fas fa-fire"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="menu-header">Starter</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
					<i class="fas fa-columns"></i> <span>Category</span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a class="nav-link" href="{{ route('category.index') }}">
							List Category
						</a>
					</li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
					<i class="fas fa-tags"></i> <span>Tags</span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a class="nav-link" href="{{ route('tags.index') }}">
							List Tags
						</a>
					</li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
					<i class="fas fa-mail-bulk"></i> <span>Posts</span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a class="nav-link" href="{{ route('posts.index') }}">
							List Posts
						</a>
					</li>
					<li>
						<a class="nav-link" href="{{ route('posts.showTrash') }}">
							Trash Posts
						</a>
					</li>
				</ul>
			</li>

			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
					<i class="far fa-user"></i> <span>Users</span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a class="nav-link" href="{{ route('user.index') }}">
							List User
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</aside>
</div>;
