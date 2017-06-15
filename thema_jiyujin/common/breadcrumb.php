<div class="breadNav">
<ul>
    <li><a href="<?php echo home_url();?>">HOME</a></li>
<?php 
// 404ページ
if(is_404()):
?>
    <li>お探しの情報が見つかりません</li>
<?php
// 固定ページ
elseif ( is_page() ):
       if($post ->post_parent != 0 ): /* 親ページの有無 */ 
           $ancestors = array_reverse( $post->ancestors ); /* 祖先ページの ID を取得 */
           foreach($ancestors as $ancestor): /* 祖先ページの数だけ繰り返し処理 */
?>
    <li><a href="<?php echo get_permalink($ancestor); ?>"><?php echo get_the_title($ancestor); ?></a></li>
<?php     
           endforeach;
       endif;
?>
    <li><?php echo $post->post_title; ?></li>
<?php elseif( get_query_var('post_type') == 'couse' || get_post_type()  == 'couse'): ?>
    <li><a href="<?php echo home_url();?>/couse/">コース一覧</a></li>
    <?php if (is_tax()): ?>
        <li><?php echo esc_html(get_queried_object()->name);?></li>
    <?php elseif (is_single()): ?>
        <li><?php echo esc_html( get_the_title() );?></li>
    <?php endif;?>
<?php elseif( get_query_var('post_type') == 'news' || get_post_type()  == 'news'): ?>
    <li><a href="<?php echo home_url();?>/news/">NEWS</a></li>
    <?php if (is_tax()): ?>
        <li><?php echo esc_html(get_queried_object()->name);?></li>
    <?php elseif (is_single()): ?>
        <li><?php echo esc_html( get_the_title() );?></li>
    <?php endif;?>
<?php endif;?>
</ul>
</div>