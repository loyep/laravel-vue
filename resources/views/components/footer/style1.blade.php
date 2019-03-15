<footer class="nice-footer {{ config('prism.site.footer.black') ? 'footer-black': '' }} py-5">
    <div class="container footer-container">
        <div class="d-flex w-100 flex-column">
            <ul class="d-flex justify-content-center footer-social"></ul>
            <div class="d-flex justify-content-center footer-copyright">
                <p class="text-center text-muted font-12">@include('components.footer.copyright')</p>
            </div>
        </div>
    </div>
</footer>
