
<?php if(have_posts()):while (have_posts()): the_post();?>


<div class="mainTitle">
    <p class="headline1"><span class="jp">ツアー詳細</span><span class="en">TOUR</span></p>
</div>
<div class="breadNav">
    <ul>
        <li><a href="/">HOME</a></li>
        <li><a href="/tour/">ツアー一覧</a></li>
        <li><?php echo esc_html( get_the_title() );?></li>
    </ul>
</div>

<!-- =======================ontents============================ -->
<main class="contents" id="contents"><div class="contentsCont">

<?php
//カテゴリ名取得
$category = get_the_terms( $post->ID, 'tour_cat');
?>

        <div class="tourTitle">
            <p class="category line<?php echo $category[0]->slug;?>"><span><?php echo $category[0]->name; ?></span></p>
            <h1><?php echo esc_html( get_the_title() );?></h1>
        </div>
        <figure class="tourMainVisual"><img src="<?php the_post_thumbnail_url($post->ID, 'medium')?>" alt=""></figure>
        
        <p><?php the_content(); ?></p>

    <table class="tableStyle01 tourTable">
        <?php if(get_field('料金')): ?>
        <tr>
            <th>料金</th>
            <td><?php echo get_field('料金'); ?></td>
        </tr>
        <?php endif; ?>

        <?php if(get_field('持ち物')): ?>
        <tr>
            <th>持ち物</th>
            <td><?php echo get_field('持ち物'); ?></td>
        </tr>
        <?php endif; ?>

        <?php if(get_field('対象')): ?>
        <tr>
            <th>対象</th>
            <td><?php echo get_field('対象'); ?></td>
        </tr>
        <?php endif; ?>

        <?php if(get_field('所要時間')): ?>
        <tr>
            <th>所要時間</th>
            <td><?php echo get_field('所要時間'); ?></td>
        </tr>
        <?php endif; ?>

        <?php if(get_field('集合場所')): ?>
        <tr>
            <th>集合場所</th>
            <td><?php echo get_field('集合場所'); ?></td>
        </tr>
        <?php endif; ?>

        <?php if(get_field('集合時間')): ?>
        <tr>
            <th>集合時間</th>
            <td><?php echo get_field('集合時間'); ?></td>
        </tr>
        <?php endif; ?>

        <?php if(get_field('注意事項')): ?>
        <tr>
            <th>注意事項</th>
            <td><?php echo get_field('注意事項'); ?></td>
        </tr>
        <?php endif; ?>


        <?php if(get_field('その他')): ?>
        <tr>
            <th>その他</th>
            <td><?php echo get_field('その他'); ?></td>
        </tr>
        <?php endif; ?>

    </table>
    <p class="buttonCenter"><a href="/reserve/" class="button">ご予約する</a></p>


    <?php if(get_field('画像') == "あり"): ?>
    <ul class="thumArea">
        <?php if(get_field('画像1') != null): ?><li><img src="<?php $image = get_field('画像1'); echo $image['sizes']['thumbnail']; ?>" /></li><?php endif; ?>
        <?php if(get_field('画像2') != null): ?><li><img src="<?php $image = get_field('画像2'); echo $image['sizes']['thumbnail']; ?>" /></li><?php endif; ?>
        <?php if(get_field('画像3') != null): ?><li><img src="<?php $image = get_field('画像3'); echo $image['sizes']['thumbnail']; ?>" /></li><?php endif; ?>
        <?php if(get_field('画像4') != null): ?><li><img src="<?php $image = get_field('画像4'); echo $image['sizes']['thumbnail']; ?>" /></li><?php endif; ?>
        <?php if(get_field('画像5') != null): ?><li><img src="<?php $image = get_field('画像5'); echo $image['sizes']['thumbnail']; ?>" /></li><?php endif; ?>
        <?php if(get_field('画像6') != null): ?><li><img src="<?php $image = get_field('画像6'); echo $image['sizes']['thumbnail']; ?>" /></li><?php endif; ?>
        <?php if(get_field('画像7') != null): ?><li><img src="<?php $image = get_field('画像7'); echo $image['sizes']['thumbnail']; ?>" /></li><?php endif; ?>
        <?php if(get_field('画像8') != null): ?><li><img src="<?php $image = get_field('画像8'); echo $image['sizes']['thumbnail']; ?>" /></li><?php endif; ?>
    </ul>
    <?php endif; ?>




    <?php if(get_field('スケジュール') == "あり"): ?>
    <h2 class="headline2 scheduleIcon"><span class="jp">ツアーのスケジュール</span><span class="en">SCHEDULE</span></h2>
    <h3 class="headline3"><?php echo get_field('スケジュールタイトル'); ?></h3>
    <ul class="schedulePlan">
        <?php if(get_field('時間1') && get_field('スケジュール1')): ?>
        <li>
            <p class="time"><?php echo get_field('時間1'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール1'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間2') && get_field('スケジュール2')): ?>
        <li>
            <p class="time"><?php echo get_field('時間2'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール2'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間3') && get_field('スケジュール3')): ?>
        <li>
            <p class="time"><?php echo get_field('時間3'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール3'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間4') && get_field('スケジュール4')): ?>
        <li>
            <p class="time"><?php echo get_field('時間4'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール4'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間5') && get_field('スケジュール5')): ?>
        <li>
            <p class="time"><?php echo get_field('時間5'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール5'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間6') && get_field('スケジュール6')): ?>
        <li>
            <p class="time"><?php echo get_field('時間6'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール6'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間7') && get_field('スケジュール7')): ?>
        <li>
            <p class="time"><?php echo get_field('時間7'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール7'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間8') && get_field('スケジュール8')): ?>
        <li>
            <p class="time"><?php echo get_field('時間8'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール8'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間9') && get_field('スケジュール9')): ?>
        <li>
            <p class="time"><?php echo get_field('時間9'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール9'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間10') && get_field('スケジュール10')): ?>
        <li>
            <p class="time"><?php echo get_field('時間10'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール10'); ?></p>
            </div>
        </li>
        <?php endif; ?>
    </ul>

    <?php if(get_field('スケジュール2つめ') == "あり"): ?>
    <h3 class="headline3"><?php echo get_field('スケジュールタイトル2'); ?></h3>
    <ul class="schedulePlan">
        <?php if(get_field('時間2-1') && get_field('スケジュール2-1')): ?>
        <li>
            <p class="time"><?php echo get_field('時間2-1'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール2-1'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間2-2') && get_field('スケジュール2-2')): ?>
        <li>
            <p class="time"><?php echo get_field('時間2-2'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール2-2'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間2-3') && get_field('スケジュール2-3')): ?>
        <li>
            <p class="time"><?php echo get_field('時間2-3'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール2-3'); ?></p>
            </div>
        </li>
        <?php endif; ?>
        <?php if(get_field('時間2-4') && get_field('スケジュール2-4')): ?>
        <li>
            <p class="time"><?php echo get_field('時間2-4'); ?></p>
            <div class="inner">
                <p><?php echo get_field('スケジュール2-4'); ?></p>
            </div>
        </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>

    <p class="mb20">※スケジュールは目安です。当日の天候・海況により若干変動します。</p>
    <p class="buttonCenter"><a href="/reserve/" class="button">ご予約する</a></p>
    <?php endif; ?>

<?php echo get_page_by_path('cancel', null, '_setting')->post_content; ?>



</div></main>
<!-- /============================contents============================ -->

<?php endwhile;endif;?>