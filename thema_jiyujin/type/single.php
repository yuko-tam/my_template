
<?php   if (have_posts()) :?><?php while (have_posts()): the_post();?>
<?php
        $page_uri = str_replace("/","_",get_page_uri($post));
        $pg_template_path = get_template_directory().'/page/'. $page_uri . '.php';
        if (is_file($pg_template_path)) {
            include($pg_template_path);
        } else{ ?>






<div class="mainTitle">
    <h1 class="headline1"><span class="jp">ブログ</span><span class="en">BLOG</span></h1>
</div>

<div class="breadNav">
    <ul>
        <li><a href="/">HOME</a></li>
        <li><a href="/blog/">ブログ</a></li>
        <li><?php echo esc_html( get_the_title() );?></li>
    </ul>
</div>

<!-- =======================contents============================ -->
<main class="contents" id="contents">

    <div class="contentsCont">

<?php
            $pg_template_path = get_template_directory().'/page/_common.php';
            if (is_file($pg_template_path)) include($pg_template_path);
            else                            the_content ();
            include(get_template_directory().'/common/comments.php');
        }
?>

    </div>

</main>
<!-- /============================contents============================ -->


<?php endwhile;?>
<?php else:
    include(get_template_directory().'/type/404.php');
?>
<?php endif;?>


