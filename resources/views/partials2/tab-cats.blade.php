<?php
$tabs = [
    [

    ]
]
?>
<section class="nice-warp nice-warp-single my-4 my-md-5">
    <div class="container">
        <?php
        //        $tabs = cs_get_option('home_tab_cats');
        //        $ajax_load = cs_get_option('home_ajax_load');
        //        if( is_array($tabs) && $ajax_load ){
        ?>
        <div class="filter-menu text-md-center mb-3 mb-lg-4-2">
            <ul class="d-flex flex-nowrap flex-md-wrap justify-content-md-center">
                <li class="flex-shrink-0">
                    <button class="btn btn-link btn-sm active" data-cid="-2.1">最新</button>
                </li>
                <?php
                //                foreach ($tabs as $key => $value) {
                //                    if ($value['home_tab_cat'] >= 1) {
                //
                //                        echo sprintf('<li class="flex-shrink-0"><button class="btn btn-link btn-sm" data-cid="%s">%s</button></li>', $value['home_tab_cat'], $value['home_tab_name']);
                //                    } else {
                //
                //                        echo sprintf('<li class="flex-shrink-0"><button class="btn btn-link btn-sm" data-cid="%s">%s</button></li>', $value['home_tab_cat'] . '.' . $key, $value['home_tab_name']);
                //                    }
                //                }
                ?>
            </ul>
        </div>
    </div>
</section>
