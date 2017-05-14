
<?php   if (have_posts()) :?><?php  the_post();?>
<?php
        $page_uri = str_replace("/","_",get_page_uri($post));
        $pg_template_path = get_template_directory().'/page/'. $page_uri . '.php';
        if (is_file($pg_template_path)) {
            include($pg_template_path);
        } else{
?>

<div class="mainTitle">
    <h1 class="headline1"><span class="jp"><?php echo esc_html( get_the_title() );?></span></h1>
</div>

<div class="breadNav">
    <ul>
        <li><a href="/">HOME</a></li>
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
        }
        if($page_uri == "reserve"){
            echo get_page_by_path('cancel', null, '_setting')->post_content;
        }



?>

    </div>

</main>
<!-- /============================contents============================ -->



<?php else:
    include(get_template_directory().'/type/404.php');
?>
<?php endif;?>


