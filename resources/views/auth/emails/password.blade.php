<h1>Hello</h1>

<p>
	Please reset your password, <br>
	<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>
</p>