        <?php while (have_posts()): the_post();?>
            <dt><span><?php the_time("Y/m/d")?></dt>
            <dd>
            <?php if(get_field('url',$post->ID)): ?>
            <a<?php if(get_field('別タブ',$post->ID)):?> target="_blank"<?php endif;?> href="<?php the_field('url', $post->ID); ?>">
            <?php elseif(get_field('詳細ページ',$post->ID)): ?>
            <a href="<?php the_permalink(); ?>">
            <?php endif;?>
            <?php echo esc_html( get_the_title() );?>
            <?php if(get_field('url',$post->ID) || get_field('詳細ページ',$post->ID)): ?>
            </a>
            <?php endif;?>
            </dd>
        <?php endwhile;?>
