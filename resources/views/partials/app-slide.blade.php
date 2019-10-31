@php
    $index_menu_style = "immersed";
    if (isset($slides)) {
        $count = $slides->count();
        while ($count < 5) {
            $slide = new App\Models\Slide();
            $slides->push($slide);
            $count++;
        }
    }


    $magazineClass = '';
    if ($index_menu_style === 'immersed' || $index_menu_style === 'dark' || $index_menu_style === 'image') {
        $magazineClass .= ' list-fixed';
    }

    if ($index_menu_style === 'plain') {
        $magazineClass .= ' bg-light ';
    }

    if ($index_menu_style === 'dark') {
        $magazineClass .= ' bg-dark';
    }
@endphp

@if (isset($slides) && $slides->isNotEmpty())
    <section class="list-magazine {{ $magazineClass}}">
        @if ($index_menu_style === 'immersed')
            <div class="bg-effect bg-dark bg-image-color"
                 style="background: linear-gradient(rgb(178, 145, 90) 0%, rgb(28, 90, 119) 100%, rgb(100, 46, 46) 100%);"></div>
            <div class="bg-effect bg-cover bg-magazine" style="background-image: url('{{ $slideBg }}');"></div>
        @elseif($index_menu_style === 'image')
            <div class="bg-effect bg-cover" style="background-image:url('{{ thumbnail('/images/bg.jpg') }}')"></div>
        @endif
        <div class="container">
            <div class="row-sm">
                <div class="col-12 col-md-6 d-flex">
                    <div class="list-item list-item-overlay custom-hover flex-fill">
                        @php
                            $firstSlide = $slides->first();
                        @endphp
                        <div class="media d-flex flex-fill">
                            <a href="{{ $firstSlide->link }}" class="media-content"
                               style="background-image: url('{{ $firstSlide->image ?? $slideBg }}')">
                                <span class="overlay"></span>
                            </a>
                        </div>
                        <div class="list-content">
                            <div class="list-body">
                                <a href="{{ $firstSlide->link }}" class="list-title text-lg h-2x"
                                   target="_blank">
                                    {{ $firstSlide->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2 mt-md-0">
                    <div class="list-scroll-2x">
                        <div class="row-sm row-scroll my-n1 my-md-n2">
                            @foreach($slides->slice(1,4)->all() as $slide)
                                <div class="col-6 py-1 py-md-2">
                                    <div class="list-item list-item-overlay custom-hover">
                                        <div class="media">
                                            <a href="{{ $slide->link }}" class="media-content"
                                               style="background-image: url('{{ $slide->image ?? $slideBg }}')">
                                                <span class="overlay"></span>
                                            </a>
                                        </div>
                                        <div class="list-content">
                                            <div class="list-body">
                                                <div class="mt-auto">
                                                    <a href="{{ $slide->link }}"
                                                       class="list-title text-md h-2x ">
                                                        {{ $slide->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
