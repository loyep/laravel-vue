
<footer class="nice-footer footer-black py-5">
    <div class="{{ $header_layout }} footer-container">
        <div class="d-flex w-100 flex-column">
            <ul class="d-flex justify-content-center footer-social"></ul>
            <div class="d-flex justify-content-center footer-copyright">
                <p class="text-center text-muted font-12">Copyright © {{ date('Y') }}
                    <a href="{{ url('/') }}">{{ $site_info->name }}</a>.
                    @if(!empty($footer_info->miitbeian))
                        <a href="http://www.miitbeian.gov.cn/" target="_blank">{{ $footer_info->miitbeian }}</a>
                    @endif
                    Designed by <a href="https://github.com/loyep/grace" target="_blank">Grace</a>.
                </p>
            </div>
        </div>
    </div>
</footer>
