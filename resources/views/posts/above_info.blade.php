@php
    function getRandomPlaceholder()
    {
        $placeholders = ['Guy', 'Girl', 'Fungus', 'Algae', 'Bacterium', 'Protozoa', 'Person', 'Dragon', 'Woof', 'Mew', 'Fuzz', 'Potato', 'Filename', 'Person', 'Random', '[deleted]', 'Meme', 'Insect', 'Placeholder', 'Table', 'Object', 'Floof', 'Username', 'NULL', 'Error', 'NPC', 'String', 'Function', 'Boop', 'Error: Placeholder not silly enough'];

        return 'someRandom' . $placeholders[array_rand($placeholders)];
    }
@endphp

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
        {{ isset($username) ? $username : getRandomPlaceholder() }}#{{ $post->user_id }}
    </a>
</address>