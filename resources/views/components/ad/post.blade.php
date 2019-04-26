@php
    $setting = \App\Models\Setting::where('key', 'post_ad')->first();
    if ($setting) {
        $ad = json_decode($setting->value);
    }
@endphp
@if (!empty($setting) && $ad->type !== 'close')
    <section class="list-sales d-none d-lg-block">
        @if ($ad->type === 'code')
            {!! $ad->code !!}
        @else
            <a href="{{ $ad->link }}" target="_blank">
                <img style="max-height: 100px; width: 100%;" src="{{ $ad->image }}">
            </a>
        @endif
    </section>
    <section class="list-sales d-lg-none">
        @if ($ad->type === 'code')
            {!! $ad->code !!}
        @else
            <a href="{{ $ad->link }}" target="_blank">
                <img style="max-height: 100px; width: 100%;" src="{{ $ad->image }}">
            </a>
        @endif
    </section>
@endif
