<?php
$footer_style = config('prism.site.footer.style');
?>
@includeWhen($footer_style === 1, 'components.footer.style1')

@includeWhen($footer_style !== 1, 'components.footer.style2')

@if (Route::current()->named('home'))
    <div class="scroll-to-top floating-button d-sm-none d-none d-sm-block"><a href="#"><i class="fal fa-angle-up"></i></a></div>
@endif
