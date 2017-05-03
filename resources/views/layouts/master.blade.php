<!DOCTYPE html>
<html>
<head>
	@include('partials.common_head')
</head>
<body>
	<page class="container-fluid">
		<main class="col-sm-8 col-md-9">
			@if (isset($request) and $request->session()->has('messages'))
				@foreach (session('messages') as $message)
					<alert class="message alert alert-{{ $message['type'] }}">
						{!! $message['message'] !!}
					</alert>
				@endforeach
			@endif
			@yield('content')
		</main>

		@hasSection('sidebar')
			<aside id="main-sidebar">
				@yield('sidebar')
			</aside>
		@endif
	</page>

	@include('partials.scripts.common')
	@yield('script')
</body>
</html>