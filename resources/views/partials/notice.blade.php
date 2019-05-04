@inject('prism', 'App\Services\PrismService')

@php
    $notice = $prism->notice();

//    $button_html = '';
    //if ($notice->button_type !== 'close') {
       // $button_class = $content['button_type'] == 'dark' ? 'btn btn-secondary btn-sm' : 'btn btn-primary btn-sm';
       // $button_html = '<div class="notice-action mx-n1 mx-md-0 pl-md-4 pt-2 pt-md-0">'
        //    . '<span class="d-inline-block p-1 px-md-0"><a class="' . $button_class . '" href="' . $content['button_link'] . '" target="_blank">' . $content['button_title'] . '</a></span>'
        //    . '</div>';
    //}
@endphp

@if(!empty($notice))
    @if($notice->type === 'plain')
        <div class="push-notice mb-3 mb-md-4">
            <div class="index-notice bg-light">
                <div class="notice-content d-flex flex-fill flex-column flex-md-row flex-md-warp align-items-md-center p-3 p-md-4">
                    <div class="notice-text">
                        <p>{{ $notice->content }}</p>
                    </div>
                    <div class="flex-md-fill"></div>
                    <?php //echo $button_html ?>
                </div>
            </div>
        </div>
    @else
        <div class="push-notice mb-3 mb-md-4">
            <div class="index-notice image-notice">
                <div class="media ">
                    <div class="media-content"
                         style="background-image:url('{{ asset('/app/images/bg.jpg') }}')"></div>
                </div>
                <div class="notice-content d-flex flex-fill flex-column flex-md-row flex-md-warp align-items-md-center p-3 p-md-4">
                    <div class="notice-text">
                        <p><?php //echo $content['content'] ?></p>
                    </div>
                    <div class="flex-md-fill"></div>
                    <?php //echo $button_html ?>
                </div>
            </div>
        </div>
    @endif
@endif
