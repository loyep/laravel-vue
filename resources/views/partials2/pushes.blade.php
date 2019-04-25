<?php
//$pushes = get_option('pushes');
?>

{{--@if (!empty($pushes))--}}
<section class="nice-cms-list my-0 my-md-4 py-3 py-md-0">
    <div class="container">
        <div class="row row-10 row-xs-15 flex-nowrap flex-md-wrap">
            @each('components.index.push-card', [1,2,3,4], 'post')
        </div>
    </div>
</section>
{{--@endif--}}
