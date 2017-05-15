<?php $topID = get_page_by_path('top')->ID; ?>

<div class="mainVisual">
    <p class="text"><?php
    echo get_field('メインテキスト',$topID);
?></p>
    <p class="buttonArea"><a href="/reserve"><img src="/img/index/main_reservation.png" alt="ご予約はこちらから"></a></p>
    <p class="scroll"><a href="#contents"><img src="/img/common/icon_main_arrow.png" alt="コンテンツを見る"></a></p>
</div>

<!-- =======================contents============================ -->
<main class="contents" id="contents">



<?php
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
<?php   if (have_posts()) :?>
<section class="news"><div class="contentsCont">
        <h2><span class="jp">お知らせ</span><span class="en">NEWS</span></h2>
        <dl class="newsList">
<?php include get_template_directory().'/common/news-list-block.php';?>
        </dl>

        <p class="buttonCenter"><a href="/news/" class="button">もっと見る</a></p>
    <!-- /.news --></div></section>

<?php endif;?>

<?php wp_reset_query(); ?>

    <section class="tour"><div class="contentsCont">
        <h2><span class="jp">ツアー一覧</span><span class="en">TOUR</span></h2>
        <!--ul>
            <?php
              $args = array(
                "get"=>"all",
                "fields"=>"all",
                "orderby"=>"id",
                "order"=>"DESC"
                );
               $cats = get_terms("tour_cat", $args);
               foreach($cats as $val) :
                $link = $val->slug;
                $nm = $val->name;
                $photo = get_field('一覧画像',"tour_cat_".esc_html($val->term_id));
                $photosp = wp_get_attachment_image_src($photo, 'full');
                $desc = $val->description;
              ?>
                <li>
                    <a href="/tour/tour_cat/<?php echo $link;?>" class="hvr-grow">
                        <span class="line<?php echo $link;?>"><?php echo $nm;?></span>
                        <figure><img src="<?php echo $photosp[0]; ?>" alt=""></figure>
                        <h3><?php echo $nm;?></h3>
                        <p><?php echo $desc;?></p>
                    </a>
                </li>
            <?php endforeach;?>
        </ul-->
<?php
if ( wp_is_mobile() ){
    $tour = array(
        'post_type' => 'tour',
        'showposts' => 3
    );
}else{
    $tour = array(
        'post_type' => 'tour',
        'showposts' => 3
    );
}
query_posts( $tour );
?>
            <ul>
<?php   if (have_posts()) :?><?php while (have_posts()): the_post();?>

<?php
//カテゴリ名取得
$category = get_the_terms( $post->ID, 'tour_cat');
?>


                <li>
                    <a href="<?php echo the_permalink(); ?>" class="hvr-grow">
                        <span class="category line<?php echo $category[0]->slug;?>"><?php echo $category[0]->name; ?></span>
                        <?php if ( has_post_thumbnail($post->ID) ): ?>
                            <figure><img src="<?php the_post_thumbnail_url($post->ID, 'medium')?>" alt="<?php echo esc_attr( get_the_title() );?>" /></figure>
                        <?php endif;?>
                        <h3><?php echo esc_html( get_the_title() );?></h3>
                        <p>料金：<?php echo get_field('料金'); ?></p>
                    </a>
                </li>


<?php endwhile;?>
<?php endif;?>
            </ul>

        <p class="buttonCenter"><a href="/tour/" class="button">ツアー一覧を見る</a></p>
    <!-- /.tour --></div></section>



    <section class="about">

<?php 
if(get_field('時遊人とは',$topID)):
?>
<?php
    echo get_field('時遊人とは',$topID);
?>
<?php  endif; ?>
        <div class="slideBg"></div>

        <!--ul>

<?php
    //画像
    $imgCount = 1;
    $imgLength = 7;
    while($imgCount <= $imgLength):
       if(get_field('画像'.$imgCount,$topID)):
?>
        <li><img src="<?php echo get_field('画像'.$imgCount,$topID) ?>" alt=""></li>
<?php
       endif;
       $imgCount++;
    endwhile;
?>
        </ul-->

    <!-- /.about --></section>


    <section class="staff">
        <h2><span class="jp">スタッフ</span><span class="en">STAFF</span></h2>
<?php
$staff = array(
    'post_type' => 'staff',
    'showposts' => 0
);
query_posts( $staff );
?>
<?php   if (have_posts()) :?>
    <ul class="staffList">
        <?php while (have_posts()): the_post();?>
        <li>
            <?php if ( has_post_thumbnail($post->ID) ): ?>
                <figure class="thumb"><img src="<?php the_post_thumbnail_url($post->ID, 'medium')?>" alt="<?php echo esc_attr( get_the_title() );?>" /></figure>
            <?php endif;?>
            <div class="inner">
                <h3><?php echo esc_html( get_the_title() );?></h3>
                <dl>
                    <?php if(get_field('出身')): ?>
                    <dt>出身</dt>
                    <dd><?php echo get_field('出身'); ?></dd>
                    <?php endif; ?>

                    <?php if(get_field('生年月日')): ?>
                    <dt>生年月日</dt>
                    <dd><?php $date = date_create(''.get_field('生年月日').''); echo date_format($date,'Y/m/d'); ?></dd>
                    <?php endif; ?>

                    <?php if(get_field('好きなこと')): ?>
                    <dt>好きなこと</dt>
                    <dd><?php echo get_field('好きなこと'); ?></dd>
                    <?php endif; ?>

                    <?php if(get_field('嫌いなこと')): ?>
                    <dt>嫌いなこと</dt>
                    <dd><?php echo get_field('嫌いなこと'); ?></dd>
                    <?php endif; ?>

                    <?php if(get_field('コメント')): ?>
                    <dt>コメント</dt>
                    <dd><?php echo get_field('コメント'); ?></dd>
                    <?php endif; ?>
                </dl>
            </div>
        </li>
        <?php endwhile;?>
    </ul>


<?php endif;?>
        <p class="buttonCenter"><a href="/about/#staff" class="button">もっと見る</a></p>
    <!-- /.staff --></section>



    <section class="blog"><div class="contentsCont">
        <h2><span class="jp">ブログ</span><span class="en">BLOG</span></h2>
        <ul class="blogList">

<?php
//投稿一覧
$paged = (int) get_query_var('paged');
$args = array(
 'posts_per_page' => 3,
 'paged' => $paged,
 'orderby' => 'post_date',
 'order' => 'DESC',
 'post_type' => 'post',
 'post_status' => 'publish'
);
query_posts( $args );
?>
<?php include get_template_directory().'/common/blog-list-block.php';?>

        </ul>

        <p class="buttonCenter"><a href="/blog/" class="button">もっと見る</a></p>
    <!-- /.blog --></div></section>





<?php
    //バナー
    $bannerCount = 1;
    $bannerLength = 3;
    $blank = '';
    while($bannerCount <= $bannerLength):
       if(get_field('バナー'.$bannerCount,$topID)):
        if(get_field('バナー'.$bannerCount.'外部ウィンドウ',$topID)){
            $blank = ' href="_blank"';
        }
?>
        <!--a href="<?php echo get_field('バナー'.$bannerCount.'リンク先',$topID); ?>"<?php echo $blank;?>><img src="<?php echo get_field('バナー'.$bannerCount,$topID)?>" alt="<?php echo get_field('バナー'.$bannerCount.'ALT',$topID)?>"></a-->

<?php
       endif;
       $bannerCount++;
    endwhile;
?>



</main>
<!-- /============================contents============================ -->

