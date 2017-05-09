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

// if (get_post_type($post) == 'news' || get_post_type($post) == 'works') {
// 	$inputMetas         = get_post_meta($post->ID, '_custom_meta_mb', true);
//     $tmpTitle = get_the_title();
//     if (is_tax()) $tmpTitle = esc_attr( get_queried_object()->name ).'';
//     if (get_post_type($post) == 'news') {
//         $myHtmlTitle	=  $tmpTitle .'｜'. esc_attr(get_page_by_path('/news/')->post_title) .'｜'.get_bloginfo('name');
//     }else if(get_post_type($post) == 'works'){
//         $myHtmlTitle	=  $tmpTitle .'｜'. esc_attr(get_page_by_path('/works/')->post_title) .'｜'.get_bloginfo('name');
//     }

//     if (is_single() && isset($inputMetas['myHtmlTitle']) && $inputMetas['myHtmlTitle'] != '') {
//         $myHtmlTitle = $tmpTitle;
//     } 

//     //ogタイトル   
// 	if (isset($inputMetas['myOgTitle']) && $inputMetas['myOgTitle'] != '') {
// 		$myOgTitle     =  $inputMetas['myOgTitle'];
// 	} else {
// 		$myOgTitle     =  $myHtmlTitle;
// 	}

	//ディスクリプション
	if (get_field('discription')) {
		$myMetaDescription = get_field('discription');
	}
	

// 	//キーワード
// 	if (isset($inputMetas['myMetaKeywords']) && $inputMetas['myMetaKeywords'] != '' ) {
// 		$myMetaKeywords = $inputMetas['myMetaKeywords'];
// 	}else{
// 		$myMetaKeywords = $tmpTitle.",".$myMetaKeywords;

// 	}

	//ogp画像
	// if(has_post_thumbnail($post->ID)){
	// 	$myOgImageUrl =  wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-head' );
	// 	$myOgImageUrl = $myOgImageUrl['0'];
	// }

// } else if ( is_page() ) {
// 	$inputMetas         = get_post_meta($post->ID, '_custom_meta_mb', true);
// 	if (isset($inputMetas['myHtmlTitle']) && $inputMetas['myHtmlTitle'] != '') {
// 		$myHtmlTitle	=  $inputMetas['myHtmlTitle'];
// 	} elseif ($post->post_parent == 0) {
// 		$myHtmlTitle	=  get_the_title().'｜'.get_bloginfo('name');        
//     } else {
// 		$myHtmlTitle	=  get_the_title().'｜'. esc_attr( ps_get_root_page($post)->post_title)  .'｜'.get_bloginfo('name');
// 	}
// 	if (isset($inputMetas['myOgTitle']) && $inputMetas['myOgTitle'] != '') {
// 		$myOgTitle     =  $inputMetas['myOgTitle'];
// 	} else {
// 		$myOgTitle     =  $myHtmlTitle;
// 	}
// 	if (isset(get_field('discription')) && get_field('discription') != '' ) {
// 		$myMetaDescription = get_field('discription');
// 	} elseif ( mb_strlen(the_excerpt_length(150, FALSE)) ) {
// 		$myMetaDescription = the_excerpt_length(150, FALSE);
// 	}
// 	if (isset($inputMetas['myOgDescription']) && $inputMetas['myOgDescription'] != '' ) {
// 		$myOgDescription   = $inputMetas['myOgDescription'];
// 	} else {
// 		$myOgDescription   = $myMetaDescription;
// 	}
// 	$myOgImageUrl      = isset($inputMetas['myOgImageUrl']) && $inputMetas['myOgImageUrl'] != '' ? $inputMetas['myOgImageUrl'] : $myOgImageUrl;
// } 
    





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
