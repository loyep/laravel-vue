Copyright © {{ date('Y') }}
<a href="{{ url('/') }}">{{ config('prism.name') }}</a>.
@if(!empty(config('prism.site.footer.miitbeian')))
    <a href="http://www.miitbeian.gov.cn/" target="_blank">{{ config('prism.site.footer.miitbeian') }}</a>
@endif
Designed by <a href="https://github.com/loyep/prism" target="_blank">Prism</a>.
