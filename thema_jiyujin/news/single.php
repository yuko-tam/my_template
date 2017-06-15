
<?php   if (have_posts()) :?><?php while (have_posts()): the_post();?>
    <h1 class="headline1"><?php echo esc_html( get_the_title() );?></h1>
    <?php echo get_field('詳細');?>
<?php endwhile;?>
<?php endif;?>


