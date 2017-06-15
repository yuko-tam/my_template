<?php while (have_posts()): the_post();?>

 <li>
<a href="<?php echo get_permalink( $post->ID ); ?>" class="hvr-grow">
<figure><img src="<?php echo catch_that_image(); ?>" alt="" /></figure>
<p class="date"><?php the_time("Y/m/d")?></p>
<h3><?php the_title(); ?></h3>
<p class="text"><?php
if(mb_strlen($post->post_content, 'UTF-8')>50){
    $content= mb_substr(strip_tags($post->post_content), 0, 50, 'UTF-8');
    echo $content.'……';
}else{
    echo strip_tags($post->post_content);
}
?></p>
</a>
 </li>
<?php endwhile; ?>