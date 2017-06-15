
<div class="mainTitle">
    <h1 class="headline1"><span class="jp">ブログ</span><span class="en">BLOG</span></h1>
</div>

<div class="breadNav">
    <ul>
        <li><a href="/">HOME</a></li>
        <li>ブログ</li>
    </ul>
</div>


<!-- =======================contents============================ -->
<main class="contents" id="contents">

    <div class="contentsCont">

        <ul class="blogList blogInner">

<?php
//投稿一覧
if (!$paged) $paged = 1;
//$paged = (int) get_query_var('paged');
$args = array(
    'showposts' => 10,
    'paged' => $paged
);
query_posts( $args );
?>
<?php include get_template_directory().'/common/blog-list-block.php';?>
    </ul>

        <div class="pager">

        <ul>
        <?php
        if (function_exists("my_pagination")) {
            my_pagination($wp_query->max_num_pages,1);
        }
        wp_reset_query();
        ?>
        </ul>
        </div>


    </div>


</main>
<!-- /============================contents============================ -->

