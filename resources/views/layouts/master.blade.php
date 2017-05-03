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
					<info class="message alert alert-{{ $message['type'] }}">
						{!! $message['message'] !!}
					</info>
				@endforeach
				{{-- @if ($request->session()->has('message'))
					<info class="message alert alert-info">
						{!! session('message') !!}
					</info>
				@endif
				@if ($request->session()->has('successMessage'))
					<info class="message alert alert-success">
						{!! session('successMessage') !!}
					</info>
				@endif
				@if ($request->session()->has('warningMessage'))
					<info class="message alert alert-warning">
						{!! $request->session('warningMessage') !!}
					</info>
				@endif
				@if ($request->session()->has('dangerMessage'))
					<info class="message alert alert-danger">
						{!! $request->session('dangerMessage') !!}
					</info>
				@endif --}}
			@endif
			@yield('content')
		</main>

		@hasSection('sidebar')
			<aside id="sidebar">
				@yield('sidebar')
			</aside>
		@endif
	</page>

	@include('partials.scripts.common')
	@yield('script')
</body>
</html>