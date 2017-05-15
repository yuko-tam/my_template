


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




  <section class="staffArea" id="staff"><div class="contentsCont">
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


    <section class="shopArea"><div class="contentsCont">
        <h2 class="headline2 shopIcon"><span class="jp">ショップ案内</span><span class="en">SHOP</span></h2>
        <table class="tableStyle02">
            <tr>
                <th>ショップ名</th>
                <td>時遊人</td>
            </tr>
            <tr>
                <th>代表</th>
                <td>内田　尚宏</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>〒907-0004沖縄県石垣市登野城597</td>
            </tr>
            <tr>
                <th>連絡先</th>
                <td>0980-87-0328</td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>info@jiyujin-ishigaki.com</td>
            </tr>
            <tr>
                <th>ホームページ</th>
                <td><a href="http://jiyujin-ishigaki.com/">http://jiyujin-ishigaki.com/</a></td>
            </tr>
            <tr>
                <th>営業時間</th>
                <td>7:00～22:00</td>
            </tr>
        </table>
    </div></section>


  <section class="aboutArea"><div class="contentsCont">
    <h2 class="headline2 accessIcon"><span class="jp">アクセスマップ</span><span class="en">ACCESS MAP</span></h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6373.433426468053!2d124.16657971631717!3d24.336358534754115!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x45788895b98118ae!2z55-z5Z6j5bO244K344Ol44OO44O844Kx44Oq44Oz44Kw5pmC6YGK5Lq6!5e0!3m2!1sja!2sjp!4v1494731318940" width="1026" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div></section>



</main>
<!-- /============================contents============================ -->


