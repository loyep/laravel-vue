@inject('prism', 'App\Services\PrismService')

<div id="search-popup-wrap">
    <div class="search-popup-cover bg-light px-3 px-lg-5 py-5">
        <div class="bg-effect bg-cover nc-no-lazy" style="background-image: url('{!! 11 // $search['background'] !!}')">
            <span class="overlay"></span>
        </div>
        <form role="search" id="searchform" class="search-popup-form py-lg-5" method="get"
              action="{{ route('search') }}">
            <input class="form-control form-control-lg form-transparent" type="text"
                   placeholder="{{ __('prism.search.placeholder') }}" name="q" id="q" required/>
        </form>
    </div>
    @php
        $searches = $prism->searchTop();
    @endphp
    @if (!empty($searches))
        <div class="search-key-push px-3 px-lg-5 py-3 py-lg-4">
            <div class="h6 mb-3">{{ __('prism.search.top_keywords') }}</div>
            <ul class="nav nav-pills m-n1">
                @foreach($searches as $search)
                    <li class="nav-item p-1">
                        <a href="{{ route('search', ['q' => $search->query]) }}" target="_blank"
                           class="btn btn-light btn-sm" title="{{ $search->query }}">{{ $search->query }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
