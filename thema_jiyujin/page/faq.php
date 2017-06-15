<div class="mainTitle">
    <h1 class="headline1"><span class="jp">よくあるご質問</span><span class="en">FAQ</span></h1>
</div>

<div class="breadNav">
    <ul>
        <li><a href="/">HOME</a></li>
        <li>よくあるご質問</li>
    </ul>
</div>


<!-- =======================contents============================ -->
<main class="contents" id="contents"><div class="contentsCont">
        <p class="faqText">タイトルクリックしたら詳細が開きます</p>

        <div class="faqList">

<?php
  
$args = array(
    'post_status' => array( 'publish', 'private' ),
    'post_type' => 'faq',
    'showposts' => 0
);
query_posts( $args );

?>

<?php if ( have_posts() ) :
 while ( have_posts() ) : the_post();
?>
<h2><?php the_title(); ?></h2>
<div class="inner">
<p><?php the_content(); ?></p>
</div>
<?php endwhile; endif; ?>

    </div>

</div></main>
<!-- /============================contents============================ -->

