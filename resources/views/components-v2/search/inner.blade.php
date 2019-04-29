
<section class="nice-search-inner nice-search-inner-up">
    <div class="container">
        <div class="top_searchform_wrapper">
            <form method="get" action="{{ route('search') }}">
                <div class="input-group">
                    <input type="text" name="q" id="s" class="form-control font-16 font-xs-14" placeholder="输入搜索关键词"
                           required="">
                    <div class="input-group-append">
                        <button class="btn btn-primary font-16 font-xs-14" type="submit">搜索</button>
                    </div>
                </div>
            </form>
            <div class="search_inner_close">
                <div class="btn-search-close"><i class="icon icon-close"></i></div>
            </div>
        </div>
    </div>
</section>
<section
        class="nice-search-inner nice-search-inner-down d-none d-md-flex align-items-center justify-content-center align-content-center">
    <div class="container">
        <div class="featured-search-title mb-md-4">
            <h4 class="font-16"><span class="font-18  text-muted mr-2"><i class="fal fa-star"></i></span>推荐阅读</h4>
        </div>
        <div class="featured-search d-flex flex-column pb-md-5">
            <div class="row row-10 row-xs-15 flex-nowrap flex-lg-wrap">
                @forelse(Prism::stickyPosts() as $stkPost)
                    <div class="item col-12 col-sm-12 col-md-12 col-lg-3">
                        <article>
                            <a class="custom-hover d-block" href="{{ $stkPost->permLink }}" target="_blank">
                                <div class="custom-hover-img image"
                                     style="background-image: url('{{ $stkPost->image }}');"></div>
                                <div class="content p-3 p-md-4">
                                    <div class="title"><h2
                                                class="font-18 <?php //echo get_title_font_weight()?> text-l2 color-white">{{ $stkPost->title }}</h2>
                                    </div>
                                    <div class="data nodots d-flex align-items-center flex-row font-12 text-light mt-3">
                                        <div class="flex-fill">
                                            <span class="u-cat">{{ $stkPost->category->name }}</span>
                                        </div>
                                        <div class="text-nowrap">
                                            <span class="u-time">{{ $stkPost->published_date }}<?php //echo timeago(get_gmt_from_date(get_the_time('Y-m-d', get_the_ID())));?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                @empty
                    <div class="data-null">
                        <p><i class="icon-null"></i></p>
                        <p>抱歉，暂无内容</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
