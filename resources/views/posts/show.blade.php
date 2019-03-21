<?php
$bodyClass = ['black-top', 'grid-hover grid-radius grid-border'];
?>
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32"/>
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="192x192"/>
    <link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.png') }}"/>
    <title>@yield('page_title', Prism::title())</title>
    <link href="{{ mix('css/app.css', 'static/app') }}" rel="stylesheet">
    <script>
      var globals = {
        'ajax_url': '{{ Request::url() }}',
        'url_theme': '',
        'image_popup': 'null',
        'new_comment_position': 'asc',
        'single': '1',
        'post_style': '0',
        'home': '0',
        'page': '0',
        'silide': '0',
      };
    </script>
</head>

<body class="{{ implode(' ', $bodyClass) }}">
@include('partials.header')

<section class="nice-warp my-4 my-md-5">
    <div class="container">
        @include('components.breadcrumbs')
        <div class="inner-row row">
            <main class="nice-main col-12 col-md-8">
                <div class="nice-post">
                    <div class="post-title mb-3 mb-md-5">
                        <h1 class="title font-30 font-md-24 font-xs-22 font-weight-bold mb-4 mb-md-4">{{ $post->title }}</h1>
                        <div class="data nodots dataStyle02 d-flex align-items-center flex-row">
                            <div class="flex-fill d-flex align-items-center">
                  <span class="u-avatar mr-2 mr-md-2">
                    <a href="{{ $author->permLink }}" target="_blank">
                      <img alt=''
                           src='{{ $author->avatar }}'
                           class='avatar avatar-50 photo' height='50' width='50'/> </a>
                  </span>
                                <span class="u-name">
                    <p class="d-flex flex-wrap flex-column">
                      <b class="font-16 font-xs-14"><a href="{{ $author->permLink }}"
                                                       target="_blank">{{ $author->display_name }}</a>
                        <small class="blink-dot" data-toggle="tooltip" data-placement="top" title="站长"></small>
                      </b>
                      <small class="text-muted">
                        <time class="date mr-1">{{ $post->published_date }}</time><i class="d-none d-md-inline-block">发布在</i><a
                                  class="text-secondary" href="{{ $category->permLink }}"
                                  rel="category tag"
                                  target="_blank">{{ $category->name }}</a>
                      </small>
                    </p>
                  </span>
                            </div>
                            <div class="text-nowrap align-items-center font-theme">
                  <span class="u-view font-16 font-xs-14 d-none d-md-inline-block">
                      <i class="icon icon-eye"></i><small>{{ $post->views }}</small>
                  </span>
                                <span class="u-comment text-secondary font-16 font-xs-14 ml-2 ml-md-3 ml-lg-4 d-none d-md-inline-block">
                      <a href="#comments"><i class="fal fa-comment-alt-lines"></i><small>1</small></a>
                  </span>
                                <span class="u-like font-16 font-xs-14 ml-2 ml-md-3 ml-lg-4 d-none d-md-inline-block">
                    <a class="btn-action btn-like post-like font-16 font-xs-14 {{ $is_like ? 'current' : '' }}" href="javascript:;" data-action="ding"
                       data-id="1">
                      <i class="fal fa-heart"></i>
                      <small class="count">{{ $post->likes }}</small>
                    </a>
                  </span>
                            </div>
                        </div>
                    </div>
                    <article class="post-content suxing-popup-gallery">
                        {!! $post->content->body !!}
                    </article>
                    <div class="post-tags mt-3 mt-md-4">
                    </div>

                    <div class="hr-short"></div>
                    <div class="post-declare  mt-3 mt-md-4-2">
                        <p>本文系作者 @<a href="{{ $author->perm_link }}" title="由{{ $author->display_name }}发布"
                                     rel="author">{{ $author->display_name }}</a>
                            原创发布在
                            {{ config('prism.name') }}。未经许可，禁止转载。</p>
                    </div>

                    <div class="post-footer d-flex flex-column flex-md-row align-items-center my-5">
                        <div class="post-action mb-4 mb-md-0">
                            <a class="btn-action btn-like post-like font-theme {{ $is_like ? 'current' : '' }} d-none d-md-inline-block"
                               href="javascript:;"
                               data-action="ding" data-id="1"><i class="icon icon-heart font-22"></i>
                                <span class="count font-14 font-xs-12 mt-2 mt-md-0">{{ $post->likes }}</span>
                            </a>
                        </div>
                        <div class="flex-fill">
                        </div>
                        <div class="text-nowrap">
                            <ul class="social bdsharebuttonbox">
                                <li data-toggle="tooltip" data-placement="top" title="分享至微博">
                                    <a class="weibo" rel="nofollow" target="_blank"
                                       href="//service.weibo.com/share/share.php?url=http%3A%2F%2Fwp.loyep.com%2F2019%2F03%2F20%2Fhello-world%2F&type=button&language=zh_cn&title=%E3%80%90%E4%B8%96%E7%95%8C%EF%BC%8C%E6%82%A8%E5%A5%BD%EF%BC%81%E3%80%91%E6%AC%A2%E8%BF%8E%E4%BD%BF%E7%94%A8WordPress%E3%80%82%E8%BF%99%E6%98%AF%E6%82%A8%E7%9A%84%E7%AC%AC%E4%B8%80%E7%AF%87%E6%96%87%E7%AB%A0%E3%80%82%E7%BC%96%E8%BE%91%E6%88%96%E5%88%A0%E9%99%A4%E5%AE%83%EF%BC%8C%E7%84%B6%E5%90%8E%E5%BC%80%E5%A7%8B%E5%86%99%E4%BD%9C%E5%90%A7%EF%BC%81&pic=http%3A%2F%2Fwp.loyep.com%2Fwp-content%2Fthemes%2Fcosy2.05%2Fstatic%2Fimages%2Fdefault.png&searchPic=true">
                                        <i class="fab fa-weibo"></i>
                                    </a>
                                </li>
                                <li data-toggle="tooltip" data-placement="top" title="分享至微信">
                                    <a class="weixin single-weixin"
                                       data-img="http://wp.loyep.com/wp-content/themes/cosy2.05/core/functions/share/qrcode.php?data=http%3A%2F%2Fwp.loyep.com%2F2019%2F03%2F20%2Fhello-world%2F"
                                       rel="nofollow" href="javascript:;">
                                        <i class="fab fa-weixin"></i>
                                    </a>
                                </li>
                                <li data-toggle="tooltip" data-placement="top" title="分享至QQ">
                                    <a class="qq" rel="nofollow" target="_blank"
                                       href="https://connect.qq.com/widget/shareqq/index.html?url=http%3A%2F%2Fwp.loyep.com%2F2019%2F03%2F20%2Fhello-world%2F&title=%E4%B8%96%E7%95%8C%EF%BC%8C%E6%82%A8%E5%A5%BD%EF%BC%81&pics=http%3A%2F%2Fwp.loyep.com%2Fwp-content%2Fthemes%2Fcosy2.05%2Fstatic%2Fimages%2Fdefault.png&summary=%E6%AC%A2%E8%BF%8E%E4%BD%BF%E7%94%A8WordPress%E3%80%82%E8%BF%99%E6%98%AF%E6%82%A8%E7%9A%84%E7%AC%AC%E4%B8%80%E7%AF%87%E6%96%87%E7%AB%A0%E3%80%82%E7%BC%96%E8%BE%91%E6%88%96%E5%88%A0%E9%99%A4%E5%AE%83%EF%BC%8C%E7%84%B6%E5%90%8E%E5%BC%80%E5%A7%8B%E5%86%99%E4%BD%9C%E5%90%A7%EF%BC%81">
                                        <i class="fab fa-qq"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="media post-author p-4 p-lg-4-2 my-4">
                    <div class="author-avatar mr-2 mr-md-3">
                        <a href="{{ $author->perm_link }}">
                            <img alt=''
                                 src='{{ $author->avatar }}'
                                 class='avatar avatar-65 photo' height='65' width='65'/> </a>
                    </div>
                    <div class="media-body author-info">
                        <h4 class="name">
                            <a href="{{ $author->permLink }}">
                                {{ $author->display_name }} </a>
                        </h4>
                        <div class="desc text-secondary font-14">
                        </div>
                        <div class="links mt-3 mt-md-2">
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="post-navigation-with-image my-2">
                    <div class="row row-10">
                    </div>
                </div>
                <div id="comments" class="nice-comments mt-3 mt-md-4-2 mt-lg-5">
                    <h4 class="font-16 mb-4 mt-lg-4-2"><span class="font-18 text-muted mr-2">
                            <i class="fal fa-comment-alt-lines"></i> </span> 文章评论
                        <small class="font-theme">(1)</small>
                    </h4>
                    <div id="respond" class="comment-respond mb-4 mb-lg-5">
                        <form method="post" action="http://wp.loyep.com/wp-comments-post.php" id="commentform"
                              class="comment-form">
                            <div class="d-flex w-100">
                                <div class="d-flex flex-shrink-0 mr-3 comment-avatar-author">
                                    <img alt='' src='http://cdn.v2ex.com/gravatar/?s=50&#038;d=mm&#038;r=g'
                                         srcset='http://cdn.v2ex.com/gravatar/?s=100&#038;d=mm&#038;r=g 2x'
                                         class='avatar avatar-50 photo avatar-default' height='50' width='50'/></div>
                                <div class="flex-fill comment-from-author">
                                    <div class="comment-form-info">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="comment-form-author col-12 col-sm-6 col-md-6">
                                                    <input class="form-control" id="author" placeholder="昵称"
                                                           name="author" type="text" value=""
                                                           required="required">
                                                </div>

                                                <div class="comment-form-email col-12 col-sm-6 col-md-6 mt-3 mt-md-0">
                                                    <input id="email" class="form-control" name="email" placeholder="邮箱"
                                                           type="email" value=""
                                                           required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12 col-md-12 comment-form-url">
                                                    <input class="form-control" placeholder="网址" id="url" name="url"
                                                           type="url" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group comment-form-text mb-4">
                                        <div class="form-control comment-textarea">
                                            <textarea id="comment" name="comment" placeholder="" cols="45" rows="8"
                                                      maxlength="65525" aria-required="true"
                                                      required="required"></textarea>
                                            <div class="comment-action-bar">
                                                <div class="dropdown nice-dropmenu dropdown-smilies">
                                                    <button class="btn btn-link text-secondary" id="dropsmilies"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <i class="icon icon-emotsmile"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-inner"
                                                         aria-labelledby="dropsmilies">
                                                        <a href="javascript:;" class="insert_emoji"
                                                           data-emoji=";-)">😉</a>
                                                        <a href="javascript:;" class="insert_emoji"
                                                           data-emoji=":|">😐</a>
                                                        <a href="javascript:;" class="insert_emoji"
                                                           data-emoji=":x">😡</a>
                                                        <a href="javascript:;" class="insert_emoji"
                                                           data-emoji=":twisted:">😈</a>
                                                        <a href="javascript:;" class="insert_emoji"
                                                           data-emoji=":smile:">🙂</a>
                                                        <a href="javascript:;" class="insert_emoji"
                                                           data-emoji=":shock:">😯</a>
                                                        <a href="javascript:;" class="insert_emoji" data-emoji=":sad:">🙁</a>
                                                        <a href="javascript:;" class="insert_emoji" data-emoji=":roll:">🙄</a>
                                                        <a href="javascript:;" class="insert_emoji" data-emoji=":razz:">😛</a>
                                                        <a href="javascript:;" class="insert_emoji" data-emoji=":oops:">😳</a>
                                                        <a href="javascript:;" class="insert_emoji"
                                                           data-emoji=":o">😮</a>
                                                        <a href="javascript:;" class="insert_emoji" data-emoji=":lol:">😆</a>
                                                        <a href="javascript:;" class="insert_emoji" data-emoji=":idea:">💡</a>
                                                        <a href="javascript:;" class="insert_emoji" data-emoji=":grin:">😀</a>
                                                        <a href="javascript:;" class="insert_emoji" data-emoji=":evil:">👿</a>
                                                        <a href="javascript:;" class="insert_emoji" data-emoji=":cry:">😥</a>
                                                        <a href="javascript:;" class="insert_emoji" data-emoji=":cool:">😎</a>
                                                        <a href="javascript:;" class="insert_emoji"
                                                           data-emoji=":arrow:">➡</a>
                                                        <a href="javascript:;" class="insert_emoji" data-emoji=":???:">😕</a>
                                                        <a href="javascript:;" class="insert_emoji"
                                                           data-emoji=":?:">❓</a>
                                                        <a href="javascript:;" class="insert_emoji"
                                                           data-emoji=":!:">❗</a>
                                                    </div>
                                                </div>
                                                <button class="btn btn-link text-secondary add_image"><i
                                                            class="icon icon-picture"></i></button>
                                                <button class="btn btn-link text-secondary add_code"><i
                                                            class="fal fa-code"
                                                            aria-hidden="true"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-submit d-flex align-items-stretch align-items-md-center flex-column  flex-md-row">
                                        <div class="form-captcha-group">
                                            <div class="input-group form-captcha form-captcha-code mb-3 mb-md-0">
                                                <input type="text" class="form-control" id="captcha" placeholder="验证码"
                                                       name="captcha"
                                                       aria-required="true">
                                                <div class="input-group-append">
                            <span class="input-group-text captcha-image bg-white p-0"><img
                                        src="http://wp.loyep.com/?captha=show" alt="验证码"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-fill"></div>
                                        <div class="form-actions text-right">
                                            <a rel="nofollow" id="cancel-comment-reply-link" style="display: none"
                                               class="btn btn-outline-secondary mb-3 mb-md-0 mr-md-3"
                                               href="javascript:;">再想想</a>

                                            <input name="submit" type="submit" id="submit" class="btn btn-primary"
                                                   value="发表评论">
                                            <input type='hidden' name='comment_post_ID' value='1' id='comment_post_ID'/>
                                            <input type='hidden' name='comment_parent' id='comment_parent' value='0'/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div> <!-- #respond -->
                    <ul class="comment-list">
                        <li id="comment-1" class="comment even thread-even depth-1">
                            <article id="div-comment-1" class="d-flex flex-fill comment-body">
                                <div class="d-flex flex-shrink-0 mr-3 comment-avatar-author vcard">
                                    <img alt=''
                                         src='http://cdn.v2ex.com/gravatar/d7a973c7dab26985da5f961be7b74480?s=50&#038;d=mm&#038;r=g'
                                         srcset='http://cdn.v2ex.com/gravatar/d7a973c7dab26985da5f961be7b74480?s=100&#038;d=mm&#038;r=g 2x'
                                         class='avatar avatar-50 photo' height='50' width='50'/></div>
                                <!-- .comment-author -->
                                <div class="flex-fill flex-column comment-text">
                                    <div class="d-flex align-items-center comment-info mb-2">
                                        <h6 class="comment-author">
                                            <a href='https://wordpress.org/' rel='external nofollow' class='url'>一位WordPress评论者</a>
                                        </h6>
                                        <div class="flex-fill"></div>
                                        <div class="pl-3">
                                            <time class="comment-date text-muted font-12">{{ $post->published_date }}</time>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>嗨，这是一条评论。<br/>
                                            要开始审核、编辑及删除评论，请访问仪表盘的“评论”页面。<br/>
                                            评论者头像来自<a href="https://gravatar.com">Gravatar</a>。</p>
                                    </div><!-- .comment-content -->
                                    <div class="comment-meta d-flex font-12 align-items-center flex-row light-10 mt-3">
                                        <div class="action mr-3">
                                            <a href="javascript:;" data-id="1" data-caction="up"
                                               data-action="comment_up_down"
                                               class="mr-3 text-secondary like comment-action "><i
                                                        class="icon icon-like" aria-hidden="true">
                                                    0</i></a>

                                            <a href="javascript:;" data-id="1" data-caction="down"
                                               data-action="comment_up_down"
                                               class="text-secondary fuck comment-action "><i class="icon icon-dislike"
                                                                                              aria-hidden="true">
                                                    0</i></a>
                                        </div>
                                        <div class="flex-fill"></div>
                                        <div class="reply">
                                            <a onclick="return addComment.moveForm( 'comment-1','1', 'respond','1' ) "
                                               href="?replytocom=1#respond" class="text-secondary comment-reply-link"
                                               rel="nofollow"><i
                                                        class="fal fa-repeat"></i> 回复</a>
                                        </div>
                                    </div>

                                </div><!-- .comment-text -->
                            </article><!-- .comment-body -->
                        </li>
                    </ul>


                </div>
            </main>

            <aside class="nice-sidebar col-12 col-md-4 d-none d-md-block">
                <div id="search-2" class="widget widget_search">
                    <form role="search" method="get" id="searchform" class="searchform" action="http://wp.loyep.com/">
                        <div>
                            <label class="screen-reader-text" for="s">搜索：</label>
                            <input type="text" value="" name="s" id="s"/>
                            <input type="submit" id="searchsubmit" value="搜索"/>
                        </div>
                    </form>
                </div>
                <div id="recent-posts-2" class="widget widget_recent_entries">
                    <h3 class="widget-title">近期文章</h3>
                    <ul>
                        <li>
                            <a href="http://wp.loyep.com/2019/03/20/hello-world/">世界，您好！</a>
                        </li>
                    </ul>
                </div>
                <div id="recent-comments-2" class="widget widget_recent_comments">
                    <h3 class="widget-title">近期评论</h3>
                    <ul id="recentcomments">
                        <li class="recentcomments"><span class="comment-author-link"><a href='https://wordpress.org/'
                                                                                        rel='external nofollow'
                                                                                        class='url'>一位WordPress评论者</a></span>发表在《<a
                                    href="http://wp.loyep.com/2019/03/20/hello-world/#comment-1">世界，您好！</a>》
                        </li>
                    </ul>
                </div>
                <div id="archives-2" class="widget widget_archive">
                    <h3 class="widget-title">文章归档</h3>
                    <ul>
                        <li><a href='http://wp.loyep.com/2019/03/'>2019年三月</a></li>
                    </ul>
                </div>
                <div id="categories-2" class="widget widget_categories">
                    <h3 class="widget-title">分类目录</h3>
                    <ul>
                        <li class="cat-item cat-item-1"><a href="http://wp.loyep.com/category/uncategorized/">未分类</a>
                        </li>
                    </ul>
                </div>
                <div id="meta-2" class="widget widget_meta">
                    <h3 class="widget-title">功能</h3>
                    <ul>
                        <li><a href="http://wp.loyep.com/wp-login.php">登录</a></li>
                        <li><a href="http://wp.loyep.com/feed/">文章<abbr title="Really Simple Syndication">RSS</abbr></a>
                        </li>
                        <li><a href="http://wp.loyep.com/comments/feed/">评论<abbr
                                        title="Really Simple Syndication">RSS</abbr></a>
                        </li>
                        <li><a href="https://cn.wordpress.org/" title="基于WordPress，一个优美、先进的个人信息发布平台。">WordPress.org</a>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
<section class="nice-footer-post-dock  d-flex d-lg-flex">
    <div class="container">
        <div class="dock-post-title flex-fill align-items-center d-none d-lg-flex">
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="dock-data text-nowrap d-flex font-theme align-items-stretch align-items-lg-center">
                        <span class="item item-view d-flex flex-column flex-lg-row">
                <b class="mb-2 mb-md-0 light-10"><i class="icon icon-eye"></i></b>
                <small class="mt-auto mt-lg-0">{{ $post->views }}</small>
            </span>
            <span class="d-flex justify-content-center item item-comment">
                <a href="#comments" class="d-flex flex-column flex-lg-row">
                    <i class="fal fa-comment-alt-lines"></i>
                    <small class="mt-auto mt-lg-0">11</small>
                </a></span>
            <span class="d-flex justify-content-center item item-like">
                <a class="d-flex flex-column flex-lg-row btn-action btn-like post-like {{ $is_like ? 'current' : '' }}" href="javascript:;"
                   data-action="ding" data-id="3546">
                    <i class="fal fa-heart"></i>
                    <small class="count mt-auto mt-lg-0">{{ $post->likes }}</small>
                </a>
            </span>
            <span class="d-flex justify-content-center item">
                    <a class="d-flex flex-column flex-lg-row btn-action btn-bigger-cover" data-module="miPopup"
                       data-selector="#bigger-cover" href="javascript:;">
                        <i class="fal fa-share-alt"></i>
                        <small class="d-lg-none mt-auto mt-lg-0">Share</small>
                    </a>
                </span>
            <span class=" d-flex justify-content-center item scroll-to-top">
                <a href="#" class="d-flex flex-column flex-lg-row">
                    <i class="fal fa-arrow-circle-up"></i>
                    <small class="d-lg-none mt-auto mt-lg-0">Top</small>
                </a>
            </span>
        </div>
    </div>
</section>
@include('partials.footer')

<script>
  // setShareInfo({
  //   title: 'Cosy主题演示站|17天女生独行，如何用4000元横跨南北三省四个城市？',
  //   summary: '女生爱花，包括我，所以早就想去有着“亚洲最大”之称的斗南花市瞧瞧。作为土生土长的东北人，昆明和我们那里的一切差异都蛮大的，天气啊，湿度啊，环境啊，最大的困难就是语言，换乘车辆的时候差点被扔在半路。 去花市的路途还是蛮遥远的，同车的多是当地穿着少数民族服装的老人，说一些完全听不懂的话。 花市分为很多区域，白话来说就是鲜花批发市场，不过确实长见识了，从来没见过满大厅的多肉，满天星，勿忘我……要不是还有好多行程，真想多买几束回去，有机会不防去瞧瞧。 翠湖公园，免费，推荐四星半 离云南大学很近，我真的太喜欢那里了，但不是因为它的湖，也不是因为那成群结队的海鸥（毕竟我来自海边城市，嘻嘻），而是因为它里面 [&hellip;]',
  //   pic: 'https://demo.nicetheme.xyz/cosy-style1/wp-content/themes/Cosy-2.1.0/timthumb.php?src=https://demo.nicetheme.xyz/cosy-style1/wp-content/uploads/sites/11/2017/09/2018092214591613-e1537980861650.jpeg&h=300&w=300&zc=1&a=c&q=100&s=1',
  //   url: 'https://demo.nicetheme.xyz/cosy-style1/3546.html',
  //
  // });
</script>
<script src="{{ mix('js/app.js', 'static/app') }}" type="text/javascript"></script>
</body>
</html>
