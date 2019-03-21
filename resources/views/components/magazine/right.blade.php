<div class="item d-flex col-6 col-md-6 mr-2 mr-md-0">
    <div class="d-flex flex-fill flex-column align-self-stretch bg-white">
        <a class="custom-hover d-flex flex-fill flex-column" href="{{ $post->permLink }}" target="_blank"
           title="{{ $post->title }}">
            <div class="custom-hover-img image"
                 style="background-image: url('{{ asset('static/images/bg.jpg') }}');"></div>
            <div class="content p-2 p-sm-3 p-lg-4">
                <div class="title text-l2 mb-1 mb-sm-0 mb-md-0"><h2
                            class="font-18 font-md-16 font-sm-16 font-xs-14 light-14 font-weight-normal color-white">
                        {{ $post->title }}</h2></div>
                <div class="data nodots d-none d-md-flex align-items-center flex-row font-12 text-light mt-2 mt-md-3">
                    <div class="flex-fill d-flex"><span class="u-cat">{{ $post->category->name }}</span></div>
                    <div class="text-nowrap"><span class="u-time d-none d-lg-inline-block"> {{ $post->published_date }}</span><span
                                class="u-like"><i class="fal fa-heart"></i>  {{ $post->views }}</span></div>
                </div>
            </div>
        </a>
    </div>
</div>
