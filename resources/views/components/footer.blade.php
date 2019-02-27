<?php

$header_layout = (isset($header_layout) && $header_layout == 'center') ? 'container' : 'container-fluid';
?>

<footer class="nice-footer py-5">
    <div class="<?php echo $header_layout; ?> footer-container">
        <div class="d-flex w-100 flex-column">
            <ul class="d-flex justify-content-center footer-social">
            </ul>
            <div class="d-flex justify-content-center footer-copyright">
                    <p class="text-center text-muted font-12">Copyright © {{ date('Y') }} <a href="{{ url('/') }}" title="'{{ config('app.name') }}" rel="home">{{ config('app.name') }}</a>. {{ footer_info() }} Designed by <a href="https://github.com/loyep/galaxy" target="_blank" class="text-secondary">Galaxy</a>.</p>
            </div>
        </div>
    </div>
</footer>
