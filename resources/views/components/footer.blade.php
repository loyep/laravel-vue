<?php

$header_layout = (isset($header_layout) && $header_layout == 'center') ? 'container' : 'container-fluid';
?>

<footer class="nice-footer py-5">
    <div class="<?php echo $header_layout; ?> footer-container">
        <div class="d-flex w-100 flex-column">
            <ul class="d-flex justify-content-center footer-social">
            <?php
//                $social_group = cs_get_option('social_group');
//                if( is_array( $social_group ) ){
//                    $i = 1;
//                    foreach ($social_group as $key => $value) {
//
//                        if( $value['social_group_type'] == 'link' ){
//
//                            echo sprintf('
//                                  <li><a data-toggle="tooltip" href="%s" class="d-block text-primary link mx-2" title="%s" target="_blank">
//                                  <i class="%s"></i>
//                                  </a></li>',
//                                $value['social_group_link'],
//                                $value['social_group_title'],
//                                $value['social_group_icon']
//                            );
//
//                        }else if( $value['social_group_type'] == 'image' ){
//                            if( is_numeric( $value['social_group_img'] ) ){
//                                $src = wp_get_attachment_image_src( $value['social_group_img'], 'full' );
//                                $src = $src[0];
//                            }else{
//                                $src = 'null';
//                            }
//                            echo sprintf('
//                              <li data-toggle="tooltip" title="%s">
//                              <a data-selector="#footer_qrcode-%s" data-module="miPopup" href="javascript:void(0);" class="d-block text-primary link btn-social-weixin mx-2">
//                                  <i class="%s"></i>
//                              </a>
//                              <div id="footer_qrcode-%s" class="dialog-suxing">
//                                  <div class="dialog-content dialog-wechat-content">
//                                      <p class="text-secondary">%s</p>
//                                      <img src="%s" alt="%s">
//                                      <div class="btn-close">
//                                          <i class="icon icon-close"></i>
//                                      </div>
//                                  </div>
//                              </div></li>',
//                                $value['social_group_title'],
//                                $i,
//
//                                $value['social_group_icon'],
//                                $i,
//                                $value['social_group_title'],
//                                $src,
//                                $value['social_group_title']
//                            );
//                            $i++;
//                        }else if( $value['social_group_type'] == 'email' ){
//                            echo sprintf('
//                                  <li><a data-toggle="tooltip" href="mailto:%s" class="d-block text-primary link mx-2" title="%s">
//                                  <i class="%s"></i>
//                                  </a></li>',
//                                $value['social_group_email'],
//                                $value['social_group_title'],
//                                $value['social_group_icon']
//                            );
//                        }
//                    }
//                }
                ?>
            </ul>
            <?php
//            $social_hr = cs_get_option('social_group') ? '<div class="hr-short mx-auto"></div>' : ' ';
//            echo $social_hr;
            ?>
            <div class="d-flex justify-content-center footer-copyright">
                <?php
//                $footer_info = cs_get_option('site_footer_info');
//                $miitbeian = cs_get_option('miitbeian');
//                if (!empty($miitbeian)) {
//                $footer_info .= ' <a href="http://www.miitbeian.gov.cn/" target="_blank" class="text-secondary" rel="nofollow">'.$miitbeian.'</a>';
//                }
//                echo '<p class="text-center text-muted font-12">Copyright © '.get_footer_year().' <a href="'.get_bloginfo('url').'" title="'.get_bloginfo('name').'" rel="home">'.get_bloginfo('name').'</a>. '.$footer_info.' Designed by <a href="https://www.nicetheme.cn" title="Nicetheme-坚持有品位且光芒四射的用户体验设计" target="_blank" class="text-secondary">Nicetheme</a>.</p>';
                ?>
            </div>
        </div>
    </div>
</footer>
