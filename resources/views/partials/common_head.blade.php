<!-- Bootstrap -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link
	rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">

<link
	rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css"
	integrity="sha384-qu94k12Ks3HgNinwEiXaznoYct9Cz5yKfCWwQXNLYO21AKR/tg/SFm1C1OvUwEyM"
	crossorigin="anonymous">

<!-- common styling -->
<link rel="stylesheet" href="/css/common.css">

<!-- view-specified styling -->
@yield('style')

<title>
	@hasSection('pageTitle')
		@yield('pageTitle') ~ reddit.dev
	@else
		reddit.dev
	@endif
</title>