<div id="comments" class="comments mt-5">
    <div class="h5 mb-4">
        {{ __('Comments') }}
        <small class="font-theme text-sm">({{ $article->comments_count ?? 0 }})</small>
    </div>
    @if ($article->allow_comment)
        <div id="respond" class="comment-respond">
            <form method="post" action="#" id="commentform"
                  class="comment-form">
                <div class="d-flex w-100">
                    <div class="flex-fill comment-from-author">
                        <div class="comment-form-info">
                            <div class="row-sm my-n2 pb-3">
                                <div class="col-12 col-lg-4 py-2">
                                    <div class="form-group comment-form-author m-0">
                                        <input class="form-control text-sm" id="author"
                                               placeholder="{{ __('Nickname') }}" name="author" type="text"
                                               value="{{ $comment_author ?? '' }}" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 py-2">
                                    <div class="form-group comment-form-email m-0">
                                        <input id="email" class="form-control text-sm" name="email"
                                               placeholder="{{ __('E-Mail') }}" type="email"
                                               value="{{ $comment_author_email ?? '' }}" required="required">
                                    </div>
                                </div>
                                <div class="col py-2">
                                    <div class="form-group comment-form-url m-0">
                                        <input class="form-control text-sm" placeholder="{{ __('Website') }}" id="url"
                                               name="url" type="url" value="{{ $comment_author_email ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form-text">
                            <div class="form-group comment-textarea">
                                <textarea id="comment" name="comment" class="form-control form-control-sm"
                                          rows="3"></textarea>
                            </div>
                            <div class="form-submit text-right">
                                <a rel="nofollow" id="cancel-comment-reply-link" style="display: none"
                                   class="btn btn-light text-sm mr-2" href="javascript:;">{{ __( 'Back') }}</a>
                                <input name="submit" type="submit" id="submit" class="btn btn-primary text-sm"
                                       value="提交评论">
                                <?php //comment_id_fields(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <ul class="comment-list">
            <?php
            //wp_list_comments('type=comment&callback=cosy19_comment&end-callback=cosy19_end_comment&max_depth=2');
            ?>
        </ul><!-- .comment-list -->
        <?php if (false) { ?>
        <div class="text-center pt-3 pt-md-4">
            <button
                    id="comments-next-button"
                    <?php if (is_page()): ?>
                    data-type="page"
                    <?php endif; ?>
                    <?php if (is_single()): ?>
                    data-type="post"
                    <?php endif; ?>
                    data-query="<?php the_ID(); ?>"
                    data-action="ajax_load_comments"
                    data-paged="<?php echo get_next_page_number(); ?>"
                    data-commentcount="<?php echo get_comment_pages_count(); ?>"
                    data-commentspage="<?php echo get_option('default_comments_page'); ?>"
                    data-append="comment-list"
                    class="btn btn-light text-sm"><?php esc_html_e('Load more...', 'cosy19'); ?></button>
        </div>
        <?php } ?>
    @else
        <p class="no-comments">{{ __('Comments are closed.') }}</p>
    @endif
</div>
