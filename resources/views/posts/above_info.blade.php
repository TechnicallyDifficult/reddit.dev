posted
<time class="multivalue" datetime="{{ $post->created_at->toIso8601String() }}">
	<span class="date-created value hidden">
		{{ $post->created_at->format('m/d/Y H:i a') }}
	</span>
	<span class="date-created-relative value">
		{{ $post->getTimeAgo('created_at') }}
	</span>
</time>
* by
<address>
	<a href="{{-- {{ POST_AUTHOR_PAGE }} --}}" id="post-author">
		{{ isset($username) ? $username : $post->getRandomPlaceholder() }}#{{ $post->created_by }}
	</a>
</address>