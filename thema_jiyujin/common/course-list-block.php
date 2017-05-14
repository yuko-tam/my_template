<?php	if (have_posts()) :?><?php while (have_posts()): the_post();?>

<?php
//カテゴリ名取得
$category = get_the_terms( $post->ID, 'tour_cat');
?>

	<section class="tourList">
            <p class="category line<?php echo $category[0]->slug;?>"><span><?php echo $category[0]->name; ?></span></p>

    <?php if ( has_post_thumbnail($post->ID) ): ?>
		<figure><a href="<?php echo the_permalink(); ?>" title="" class="hvr-float-shadow"><img src="<?php the_post_thumbnail_url($post->ID, 'medium')?>" alt="<?php echo esc_attr( get_the_title() );?>" /></a></figure>
    <?php endif;?>
    <div class="inner">
        <h2><?php echo esc_html( get_the_title() );?></h2>
        <p class="text"><?php the_excerpt_length(30,the_content()); ?></p>
        <?php if(get_field('料金')): ?>
        <dl>
            <dt>料金</dt>
            <dd><?php echo get_field('料金'); ?></dd>
        </dl>
        <?php endif; ?>
        <p><a href="<?php echo the_permalink(); ?>" class="button">詳しく見る</a></p>
    </div>

    </section>

<?php endwhile;?>
<?php endif;?>
