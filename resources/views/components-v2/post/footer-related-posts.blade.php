<?php
$relPosts = Prism::relatedPosts($post);
?>
@if ($relPosts->count() > 0)
    <section class="nice-footer-related-posts py-4 py-sm-5">
        <div class="container">
            <div class="related-title font-16 mb-0 mb-lg-4">
            <span class="font-18 text-muted mr-2">
                <i class="fal fa-star"></i>
            </span>
                文章推荐
            </div>
            <div class="related-inner">
                <div class="row row-10 row-xs-15">
                    @foreach($relPosts as $relPost)
                        <div class="item col-12 col-sm-6 col-md-3 col-lg-3 mt-3 mt-sm-4-2 mt-md-0">
                            <article>
                                <a class="custom-hover d-block" href="{{ $relPost->perm_link }}"
                                   target="_blank" title="{{ $relPost->title }}">
                                    <div class="custom-hover-img image"
                                         style="background-image: url({{ $relPost->image }});"></div>
                                    <div class="content p-3">
                                        <div class="title">
                                            <h2 class="font-16 font-xs-18 font-weight-normal text-l2 color-white">
                                                {{ $relPost->title }}
                                            </h2>
                                        </div>
                                        <div class="data nodots d-flex align-items-center flex-row font-12 text-light mt-2">
                                            <div class="flex-fill">
                                                <span class="u-time"> {{ $relPost->published_date }}</span>
                                            </div>
                                            <div class="text-nowrap d-none d-lg-flex">
                                                <span class="u-comment"><i class="fal fa-comment-alt-lines"></i> {{ $relPost->comments_count }}</span>
                                                <span class="u-like"><i class="fal fa-heart"></i> {{ $relPost->likes }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
