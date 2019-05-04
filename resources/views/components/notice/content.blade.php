@php
    $button_class = $button_type == 'dark' ? 'btn btn-secondary btn-sm' : 'btn btn-primary btn-sm';

@endphp
 $button_class = $content['button_type'] == 'dark' ? 'btn btn-secondary btn-sm' : 'btn btn-primary btn-sm';
// $button_html = '<div class="notice-action mx-n1 mx-md-0 pl-md-4 pt-2 pt-md-0">'
    //    . '<span class="d-inline-block p-1 px-md-0"><a class="' . $button_class . '" href="' . $content['button_link'] . '" target="_blank">' . $content['button_title'] . '</a></span>'
    //    . '</div>';