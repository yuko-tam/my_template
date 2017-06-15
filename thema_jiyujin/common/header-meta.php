<?php
// // 設定ページから基本メタ情報を取得
$pageObj           = get_page_by_path('meta', null, '_setting');
$settingID = $pageObj->ID;

$myHtmlTitle       = esc_attr(get_bloginfo('name'));
$myMetaDescription = get_field('discription', $settingID);
$img = get_field('ogp画像', $settingID);
$imgurl = wp_get_attachment_image_src($img, 'full'); 
$myOgImageUrl      = $imgurl[0];

// if (! preg_match("/^http/", $myOgImageUrl) ) {
//     $myOgImageUrl = home_url() . $myOgImageUrl;
// }
if(!is_home()){
    $tmpTitle = get_the_title();
    $myHtmlTitle	=  $tmpTitle .'｜'.get_bloginfo('name');



	// ogp画像
	if(has_post_thumbnail($post->ID)){
		$myOgImageUrl =  wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-head' );
		$myOgImageUrl = $myOgImageUrl['0'];
	}else if(get_post_type() == 'post'){
		$myOgImageUrl = site_url().catch_that_image();
	}

	if (get_field('discription', $post->ID) ) {
		$myMetaDescription   = get_field('discription', $post->ID);
	} else {
		$myMetaDescription   = $myMetaDescription.$tmpTitle.'に関するページです。';
	}
 } 
    





//メタ確認用 確認終了後コメントアウトします
// echo "<table style='width:780px;margin:20px auto; border:1px solid #ccc;'>";
// echo "<tr><th style='padding:10px;background:#eee;border:1px solid #ccc;width:150px;'>html Title</th><td style='border:1px solid #ccc;padding:10px;'>".$myHtmlTitle ."</td></tr>";
// echo "<tr><th style='padding:10px;background:#eee;border:1px solid #ccc;'>meta Keywords</th><td style='border:1px solid #ccc;padding:10px;'>".$myMetaKeywords ."</td></tr>";
// echo "<tr><th style='padding:10px;background:#eee;border:1px solid #ccc;'>meta Description</th><td style='border:1px solid #ccc;padding:10px;'>".$myMetaDescription ."</td></tr>";
// echo "<tr><th style='padding:10px;background:#eee;border:1px solid #ccc;'>OGP Title</th><td style='border:1px solid #ccc;padding:10px;'>".$myOgTitle ."</td></tr>";
// echo "<tr><th style='padding:10px;background:#eee;border:1px solid #ccc;'>OGP Description</th><td style='border:1px solid #ccc;padding:10px;'>".$myMetaDescription ."</td></tr>";
// echo "<tr><th style='padding:10px;background:#eee;border:1px solid #ccc;'>OGP Image URL</th><td style='border:1px solid #ccc;padding:10px;'>".$myOgImageUrl ."</td></tr>";
// echo "<table>";

?>
