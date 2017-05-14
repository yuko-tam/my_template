
<div class="mainTitle">
    <h1 class="headline1"><span class="jp">お知らせ</span><span class="en">NEWS</span></h1>
</div>

<div class="breadNav">
    <ul>
        <li><a href="/">HOME</a></li>
        <li>お知らせ</li>
    </ul>
</div>


<!-- =======================contents============================ -->
<main class="contents" id="contents">

    <div class="contentsCont">

        <dl class="newsList">
<?php
$pg_template_path = get_template_directory().'/news/';
if( get_post_type() == "page" ):
if ( wp_is_mobile() ){
    $news = array(
        'post_type' => 'news',
        'showposts' => 2
    );
}else{
    $news = array(
        'post_type' => 'news',
        'showposts' => 4
    );
}
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

    </dl>

    </div>


</main>
<!-- /============================contents============================ -->

