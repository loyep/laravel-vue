<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>{{ \App\Facades\Prism::name() ?? 'Prism' }}</title>
        <description>{{ $description ?? 'Prism' }}</description>
        <link>{{ url('/') }}</link>
        <atom:link href="{{ route('feed') }}" rel="self" type="application/rss+xml"/>
        <?php
        $date = !empty($articles) ? $articles[0]->published_at->format('D, d M Y H:i:s O') : date("D, d M Y H:i:s O", time())
        ?>
        <pubDate>{{ $date }}</pubDate>
        <lastBuildDate>{{ $date }}</lastBuildDate>
        <generator>{{ \App\Facades\Prism::name() }}</generator>
        @foreach ($articles as $article)
            <item>
                <title>{{ $article->title }}</title>
                <link>{{ route('post.show',$article->slug) }}</link>
                <description>{{ $article->description }}</description>
                <pubDate>{{ $article->published_at->format('D, d M Y H:i:s T') }}</pubDate>
                <author>{{ $article->user->email }} ({{$article->user->display_name}})</author>
                <guid>{{ route('post.show',$article->slug) }}</guid>
                <category>{{ $article->category->name }}</category>
            </item>
        @endforeach
    </channel>
</rss>
