<?php
$header_layout = (isset($header_layout) && $header_layout == 'center') ? 'container' : 'container-fluid';
?>

@includeWhen($footer_style === 1, 'components.footer.style1', [
    'footer_info' => $footer_info,
    'header_layout' => $header_layout,
])

@includeWhen($footer_style !== 1, 'components.footer.style2', [
    'footer_info' => $footer_info,
    'header_layout' => $header_layout,
    'black' => $footer_info === 2 ? '' : 'footer-black'
])

<div class="scroll-to-top floating-button d-sm-none d-none d-sm-block"><a href="#"><i class="fal fa-angle-up"></i></a>
</div>
