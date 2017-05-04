<!DOCTYPE html>
<html>
<head>
	@include('partials.common_head')
</head>
<body>
	<div class="container-fluid">
		<main class="col-sm-8 col-md-9">
			@if (isset($request) and $request->session()->has('messages'))
				@foreach (session('messages') as $message)
					<figure role="alert" class="main-message alert alert-{{ $message['type'] }}">
						{!! $message['message'] !!}
					</figure>
				@endforeach
			@endif
			@yield('content')
		</main>

		@hasSection('sidebar')
			<aside id="main-sidebar">
				@yield('sidebar')
			</aside>
		@endif
	</div>

	@include('partials.scripts.common')
	@yield('script')
</body>
</html>