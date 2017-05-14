<?php include( get_template_directory() . '/common/header-meta.php');?><?php
 $directoryThisName = get_page($page_id)->post_name;
 $directoryName = ps_get_root_page($post)->post_name;
 if(is_tax() || get_post_type() != "page"){
 	$directoryName = get_page($page_id)->post_type;
 }
// echo get_post_type();
// echo $directoryThisName."<br>";
// var_dump(get_page($page_id));
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title><?php echo esc_html($myHtmlTitle);?></title>
<?php if ( wp_is_mobile() ) : ?>
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<?php endif; ?>
<meta name="description" content="<?php echo esc_attr($myMetaDescription);?>">

<meta property="og:url" content="<?php echo esc_attr(get_the_canonical_url());?>">
<meta property="og:image" content="<?php echo esc_attr($myOgImageUrl);?>">
<meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name'));?>">
<meta property="og:title" content="<?php echo esc_attr($myHtmlTitle);?>">
<meta property="og:description" content="<?php echo esc_attr($myMetaDescription);?>">
<meta property="og:type" content="<?php if(is_home()):?>website<?php else:?>article<?php endif;?>">

<meta name="twitter:card" content="summary_large_image">

<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
<link rel="stylesheet" href="/css/base.css" type="text/css">
<script type="text/javascript" src="/js/jquery-1.12.0.min.js"></script>
<?php if(is_home()):?>
<script type="text/javascript" src="/js/slick.min.js"></script>
<?php endif; ?>
<script type="text/javascript" src="/js/common.js"></script>

<!--[if lt IE 9]>
<script src="/js/html5shiv.js"></script>
<![endif]-->



<?php if ( wp_is_mobile() ) : ?>
<?php else: ?>
<?php endif; ?>

<?php if(is_home()):?>
<?php endif; ?>
<?php
//↓ga-tag↓
$gaTagParts = get_page_by_path('head-tag', null, '_setting');
if (is_object($gaTagParts) && property_exists($gaTagParts, 'post_content') && $gaTagParts->post_content != '' ): 
?>
<?php
	echo $gaTagParts->post_content;
?>
<?php
endif;
//↑ga-tag↑
?>

<?php wp_head();?>
</head>
<?php if(is_home()):?>
<body class="index">
<?php else:?>
<body class="<?php echo $directoryThisName; ?>">
<?php endif;?>
<?php
//↓body-tag↓
$bodyTag = get_page_by_path('body-tag', null, '_setting');
if (is_object($bodyTag) && property_exists($bodyTag, 'post_content') && $bodyTag->post_content != '' ): 
?>
<?php
    echo $bodyTag->post_content;
?>
<?php
endif;
//↑body-tag↑
?>


<?php
//↓body-tag↓
$header = get_page_by_path('header', null, '_setting');
if (is_object($header) && property_exists($header, 'post_content') && $header->post_content != '' ): 
?>
<?php
    echo $header->post_content;
?>
<?php
endif;
//↑body-tag↑
?>


<!-- ============================header============================ -->
<header class="header">
    <div class="headerInner1">
        <?php if(is_home()):?>
        <h1 class="headlineText">沖縄の離島、石垣島にあるシュノーケリング・初心者体験ダイビング専門店。</h1>
        <?php else: ?>
        <p class="headlineText">沖縄の離島、石垣島にあるシュノーケリング・初心者体験ダイビング専門店。</p>
        <?php endif; ?>
        <div class="inner">
            <p class="tel"><a href="tel:0980-87-0728">0980-87-0728</a></p>
            <p class="time">受付時間 7時〜22時</p>
            <p class="contact"><a href="/contact/">お問い合わせ</a></p>
        </div>
    </div>

    <p class="spMenu"><a class="menu-trigger" href="#"><span></span><span></span><span></span></a></p>

    <div class="headerCont">
        <div class="headerInner">
            <h1 class="logo"><a href="/"><img src="/img/common/logo.png" alt="石垣島のマリンショップ 時遊人"></a></h1>
            <nav class="navi">
                <ul>
                    <li class="navTop"><a href="/">ホーム</a></li>
                    <li class="navTour"><a href="/tour/">ツアー一覧</a></li>
                    <li class="navAbout"><a href="/about/">時遊人について</a></li>
                    <li class="navBlog"><a href="/blog/">ブログ</a></li>
                    <li class="navFaq"><a href="/faq/">よくあるご質問</a></li>
                    <li class="navReserve"><a href="/reserve/">ご予約</a></li>
                </ul>
            </nav>
        </div>
    </div>

</div></header>
<!-- /============================header============================ -->


<?php if(!is_home() && !wp_is_mobile()):?>
<?php //include get_template_directory().'/common/breadcrumb.php';?>
<?php endif; ?>
