@php
    $pushes = \App\Models\Article::take(6)->get();
@endphp
<section class="list-pushes list-scroll-4x">
    <div class="row-sm my-md-n2 pb-3 pt-2 pt-md-0 pb-md-4">
        @foreach($pushes as $push)
            <div class="col-4 col-md-2 py-md-2 ">
                <div class="list-item list-overlay custom-hover">
                    <div class="media media-3x2">
                        <a class="media-content custom-hover-img" style="background-image: url({{ $push->image }})">
                            <span class="overlay"></span>
                        </a>
                    </div>
                    <a href="{{ $push->getLink() }}" class="list-content p-2" target="_blank">
                        <div class="list-body ">
                            <div class="list-title h-1x text-sm">
                                {{ $push-> title }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
