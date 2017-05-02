<li>
	<article class="post row">
		<div class="col-lg-1"></div>
		<aside class="votes col-lg-1">
			<header>
				<h1 class="sr-only">Votes</h1>
			</header>
			<div class="row">
				<button type="button" class="vote-button upvote"></button>
			</div>
			<div class="row multivalue">
				<span class="votes-separate value hidden">
					<span class="upvotes">{{ 0/* $upvotes */ }}</span>
					/
					<span class="downvotes">{{ 0/* $downvotes */ }}</span>
				</span>
				<span class="votes-total value">
					{{ 0/* $upvotes - $downvotes */ }}
				</span>
			</div>
			<div class="row">
				<button type="button" class="vote-button downvote"></button>
			</div>
		</aside>
		<submain class="col-lg-10">
			<header class="row">
				<div class="btn" style="display: inline-block"></div>
				<div>
					<h1>
						<a href="{{ action('PostsController@show', ['id' => $post->id]) }}/">
							{{ $post->title }}
						</a>
					</h1>
					{{-- @if (I decide to implement this) --}}
						{{-- <p class="subtitle">{{ $post->subtitle }}</p> --}}
					{{-- @endif --}}
				</div>
			</header>
			<footer class="row">
				<div class="btn" style="display: inline-block">
				</div>
				<div>
					@include('posts.above_info')
				</div>
				<div>
					<span>
						C {{ 0/* NUMBER_OF_COMMENTS*/ }}
					</span>
					<span>
						S
					</span>
				</div>
			</footer>
		</submain>
		<submain class="hidden post-body">
			{{ $post->content }}
		</submain>
	</article>
</li>