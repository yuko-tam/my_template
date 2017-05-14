
<div class="mainTitle">
    <p class="headline1"><span class="jp">お知らせ</span><span class="en">NEWS</span></p>
</div>

<div class="breadNav">
    <ul>
        <li><a href="/">HOME</a></li>
        <li><a href="/news/">お知らせ</a></li>
        <li><?php echo esc_html( get_the_title() );?></li>
    </ul>
</div>


<!-- =======================contents============================ -->
<main class="contents" id="contents">

    <div class="contentsCont">
<div class="wysiwygArea">

    <h1><?php echo esc_html( get_the_title() );?></h1>
    <p class="date"><?php the_time("Y/m/d")?></p>

    <?php echo get_field('詳細');?>

</div>

    </div>


</main>
<!-- /============================contents============================ -->

