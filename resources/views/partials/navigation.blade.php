@php
    $ajax = true
@endphp

@php
    //if ($template_params['style'] == 'plain') $row_class = 'row mt-4 mt-md-5 mb-2 mb-md-0';
    //if ($template_params['style'] == 'medium') $row_class = 'row-lg  mt-4 mt-md-5  mb-2 mb-md-0';
    //if ($template_params['style'] == 'small') $row_class = 'row-sm mt-4 mt-md-5  mb-2 mb-md-0';
    $rowClass = 'row-sm mt-4 mt-md-5  mb-2 mb-md-0';

//    if ($template_params['style'] == 'plain') $class = 'col-12';
//    if ($template_params['style'] == 'medium') $class = 'col-12 col-md-4';
//    if ($template_params['style'] == 'small') $class = 'col-12 col-md-6';
    $class = 'col-12 col-md-6'
@endphp
<nav class="posts-ajax-load pagination-ajax justify-content-md-center {{ $rowClass }}">
    <load-more class="{{ $class }}" text="{{ __('加载更多') }}" end-text="{{ __('没有更多内容') }}"></load-more>
</nav>
