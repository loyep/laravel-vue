@php
    $showRecommended = false;
@endphp

@if ($showRecommended)
    @php
        $recommended = [];
    @endphp
    @foreach($recommended as $item)
        <?php if ($item['type'] == 'content'): ?>
            <?php
            if ($item['content']['type'] == 'cat') {
                $args = array(
                    'posts_per_page' => 8,
                    'cat' => $item['content']['cats'],
                );
                $tax = get_term($item['content']['cats'], 'category');
            }
            if ($item['content']['type'] == 'special') {
                $args = array(
                    'posts_per_page' => 8,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'special',
                            'terms' => $item['content']['specials'],
                        ),
                    ),
                );
                $tax = get_term($item['content']['specials'], 'special');
            }
            ?>
            <?php
            get_template_part_with_vars(
                "template-parts/recommended/cat-topic-section-" . $item['content']['style'],
                array(
                    'args' => $args,
                    'tax' => $tax,
                    'item' => $item
                )
            )
            ?>
        <?php else: ?>
            <?php get_template_part_with_vars(
                'template-parts/recommended/authors-section',
                array(
                'item' => $item
            )
            ); ?>
        <?php endif; ?>
    @endforeach
@endif


<?php if ($recommended): ?>
    <?php $items = get_field('index_rcmds', 'option'); ?>
    <?php foreach ($items as $item): ?>
        <?php if ($item['type'] == 'content'): ?>
            <?php
    if ($item['content']['type'] == 'cat') {
        $args = array(
            'posts_per_page' => 8,
            'cat' => $item['content']['cats'],
        );
        $tax = get_term($item['content']['cats'], 'category');
    }
    if ($item['content']['type'] == 'special') {
        $args = array(
            'posts_per_page' => 8,
            'tax_query' => array(
                array(
                    'taxonomy' => 'special',
                    'terms' => $item['content']['specials'],
                ),
            ),
        );
        $tax = get_term($item['content']['specials'], 'special');
    }
    ?>
            <?php
    get_template_part_with_vars(
        "template-parts/recommended/cat-topic-section-" . $item['content']['style'],
        array(
            'args' => $args,
            'tax' => $tax,
            'item' => $item
        )
    )
    ?>
        <?php else: ?>
            <?php get_template_part_with_vars(
        'template-parts/recommended/authors-section',
        array(
        'item' => $item
    )
    ); ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
