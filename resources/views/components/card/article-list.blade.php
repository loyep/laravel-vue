@foreach($articles as $article)
    @include('components.card.article', compact('article'))
@endForeach
