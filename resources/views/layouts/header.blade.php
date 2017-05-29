<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reddit Clone</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><a style="color: #98d12e; text-decoration: none; font-weight: bolder;" href="{{route('posts_path')}}">Reddit </a>Clone New Title
				<small class="pull-right">
					@yield('option')
					<!-- <a href="{{route('create_post_path')}}" class="btn btn-success">New Post</a> -->
				</small>
				</h1>
			</div>
		</div>
		<hr>
		
		@include('layouts._errors')

		@include('layouts._messages')

		@yield('content')

	</div>
</body>
</html>