


<div class="mainTitle">
  <h1 class="headline1"><span class="jp">時遊人について</span><span class="en">ABOUT</span></h1>
</div>

<div class="breadNav">
  <ul>
    <li><a href="/">HOME</a></li>
    <li>時遊人について</li>
  </ul>
</div>



<!-- =======================contents=====contents============================ -->
<main class="contents" id="contents">

  <?php the_content();?>




  <section class="staffArea"><div class="contentsCont">
    <h2 class="headline2 staffIcon"><span class="jp">スタッフ</span><span class="en">STAFF</span></h2>
    <ul class="staffList">
<?php
$staff = array(
    'post_type' => 'staff',
    'showposts' => 0
);
query_posts( $staff );
?>
<?php   if (have_posts()) :?>
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

<?php endif;?>
    </ul>

  </div></section>

<?php echo get_field('ショップ案内'); ?>


  <section class="shopArea"><div class="contentsCont">
    <h2 class="headline2 accessIcon"><span class="jp">アクセスマップ</span><span class="en">ACCESS MAP</span></h2>
  </div></section>



</main>
<!-- /============================contents============================ -->


