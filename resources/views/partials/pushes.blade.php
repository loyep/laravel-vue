<?php
$pushes = get_option('pushes');
?>

@if (!empty($pushes))
    <section class="nice-cms-list my-0 my-md-4 py-3 py-md-0">
        <div class="container">
            <div class="row row-10 row-xs-15 flex-nowrap flex-md-wrap">
                @include('components.index.push-card', compact('pushes'))
            </div>
        </div>
    </section>
@endif
