<?php get_header(); ?>

<?php


if( is_home() ) $template = 'home';
else if ( get_post_type() == '_setting') $template = '404';
else if( get_post_type() == 'news' ) $template = 'news';
else if( get_post_type() == 'tour') $template = 'tour';
else if ( is_category() )       $template = 'category';
else if( get_post_type() == 'page' ) $template = 'page';
else if( get_post_type() == 'post' ) $template = 'single';
else if ( is_single() )         $template = 'single';
else $template = '404';

$template_path = get_template_directory().'/type/'.$template.'.php';
if(is_file($template_path)) include($template_path);

?>


<?php //echo $template; ?>
<?php get_footer(); ?>
