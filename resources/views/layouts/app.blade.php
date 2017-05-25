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
				<h1><a style="color: #98d12e; text-decoration: none; font-weight: bolder;" href="{{route('posts_path')}}">Reddit </a>Clone New Title</h1>
			</div>
		</div>
		<hr>

		@yield('content')

	</div>
</body>
</html>