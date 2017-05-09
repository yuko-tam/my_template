



<?php
$pg_template_path = get_template_directory().'/news/';
if( get_post_type() == "page" ):
$news = array(
    'post_type' => 'news',
    'showposts' => 0
);
query_posts( $news );

?>
<?php include get_template_directory().'/common/news-list-block.php';?>
<?php elseif(is_tax()):
?>
<?php include get_template_directory().'/common/news-list-block.php';?>

<?php elseif(get_post_type() == "news" ):
    $pg_template_path .= 'single.php';
    include $pg_template_path;
?>

<?php endif;?>