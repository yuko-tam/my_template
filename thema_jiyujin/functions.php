<?php

//不要なヘッダーを吐かないように設定
remove_action( 'wp_head' , 'index_rel_link');
remove_action( 'wp_head' , 'wp_generator');
remove_action( 'wp_head' , 'wp_shortlink_wp_head');
remove_action( 'wp_head' , 'start_post_rel_link');
remove_action( 'wp_head' , 'wlwmanifest_link');
remove_action( 'wp_head' , 'rsd_link');
remove_action( 'wp_head' , 'adjacent_posts_rel_link_wp_head');
remove_action( 'wp_head' , 'feed_links', 2 );
remove_action( 'wp_head' , 'feed_links_extra', 3);
remove_action('wp_head', 'rel_canonical');
foreach ( array( 'rss2_head', 'commentsrss2_head', 'rss_head', 'rdf_header', 'atom_head', 'comments_atom_head', 'opml_head', 'app_head' ) as $action ) {
    remove_action( $action, 'the_generator' );
}
//v4.2以降に入ってきた、jsとcssを除去
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


//エディタのスタイル
add_editor_style("editor-style.css");


// 勝手なPタグを削除
remove_filter ('the_content', 'wpautop');

// <script>および, <style>タグ内を除去
function strip_js_css_inner($text){
    $text = preg_replace('!<script.*?>.*?</script.*?>!is', '', $text);
    return preg_replace('!<style.*?>.*?</style.*?>!is', '', $text);
}




// プラグイン・テーマエディタの無効化
define('DISALLOW_FILE_EDIT',true);



//spanタグ消さない
add_filter('tiny_mce_before_init', 'tinymce_init');
function tinymce_init( $init ) {
    $init['verify_html'] = false;
    return $init;
}



// アイキャッチ画像利用
add_theme_support( 'post-thumbnails' );
// thumbnail sizes
add_image_size( 'news-list-thumbnail-sp', 180, 180, 1);

add_image_size( 'list-thumbnail', 640, 640, 1);
add_image_size( 'list-thumbnail-sp', 525, 525, 1);//本当は、540x540がいい

add_image_size( 'post-head', 650, 300);
add_image_size( 'works-thumbnail', 1002, 1002);




// 自前のページング
function my_pagination($pages = '', $range = 2){
    global $paged, $query_string;
    $showitems = ($range * 2)+1;
ob_start();
    if (empty($paged)) $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        if ($paged > 1 /*&& $showitems < $pages*/){
                echo '<li class="prev"><a href="'.get_pagenum_link($paged - 1).'">前へ</a></li>';
            }


        if($paged > $pages - $range) $start = $pages - $showitems + 1;
        else $start = $paged - $range;
        if ($start < 1) $start = 1;
        $showCount = 0;
        if ( !wp_is_mobile() ){
            for ($i=$start; $i <= $pages; $i++) {
    //          if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                if (1 != $pages && $showCount < $showitems && $i <= $pages) {
                    if ($paged == $i) {
                        echo '<li class="active list"><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
                    } else {
                        echo '<li class="list"><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
                    }
                    $showCount++;
                }
            }
        }
        if ($paged < $pages /*&& $showitems < $pages*/){
            echo '<li class="next"><a href="'.get_pagenum_link($paged + 1).'">次へ</a></li>';
        }

    }


    $echo_content = ob_get_clean();
    //query_posts($query_string);
    echo $echo_content;


}

// マルチバイトのスラッグの場合、投稿種別+投稿IDのスラッグに変更
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        if ( $post_type == 'post') $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
        else $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    } elseif ( $post_type == 'post' && ! preg_match( '/^\d{8}_\d+/', $slug) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );





// 固定ページのURLの後ろにはスラッシュを付ける
function ex_trailingslashit($string, $url_type) {
    // .htmlの場合はスラッシュを付けない
    if ( strpos($string, '.html') !== false )
        $string = untrailingslashit($string);
    else if ($url_type != 'single')
        $string = trailingslashit($string);
    return $string;
}
add_filter('user_trailingslashit', 'ex_trailingslashit', 10, 2);

// カレントページのIDを配列で取得
function get_current_pages( $cur_post ){
    $stop = 0;
    $current_pages = array();
    while ( $stop == 0) {
        array_push($current_pages, $cur_post->ID);
        if ($cur_post->post_parent == 0)  $stop = 1;
        else                              $cur_post = get_post( $cur_post->post_parent );
    }
    return $current_pages;
}


// 先祖のページオブジェクトを取得
function ps_get_root_page( $cur_post, $cnt = 0 ) {
    if ( $cnt > 100 ) { return false; }
    $cnt++;
    if ( $cur_post->post_parent == 0 ) {
        $root_page = $cur_post;
    } else {
        $root_page = ps_get_root_page( get_post( $cur_post->post_parent ), $cnt );
    }
    return $root_page;
}

function get_the_canonical_url(){
    if (is_home())        return home_url('/');
    elseif (is_single())  return get_the_permalink();
    elseif (is_page())    return get_page_link(get_the_ID());
    elseif (is_category())return get_category_link(get_queried_object()->cat_ID);
    elseif (is_tag())     return get_tag_link(get_queried_object()->term_id);
    elseif (is_author())  return get_author_posts_url(get_the_author_ID());
    elseif (is_search())  return home_url('/').'?s='.get_query_var('s');
    else                  return home_url('/').'404/';
}
 
// 本文抜粋
function the_excerpt_length($length = 10000, $echo = true, $content = false)
{
    global $post;
    $striped_conetnt = '';
    if ($content) {
        $striped_conetnt = trim(html_entity_decode(strip_tags(strip_js_css_inner($post->post_content)), ENT_QUOTES, 'UTF-8'));
        $striped_conetnt = str_replace(array("\r\n", "\r", "\n"), '', $striped_conetnt);
    }
    // 本文は表示しない
    if ($post->post_excerpt) $striped_conetnt = esc_html($post->post_excerpt);
    $content =  mb_substr($striped_conetnt,0,$length) . ( mb_strlen($striped_conetnt) > $length ? '…' : '');
    if ($echo)  echo $content; 
    else        return $content;
}


//一覧にスラッグ追加
function add_page_columns_name($columns) {
    $columns['slug'] = "スラッグ";
    return $columns;
}
function add_page_column($column_name, $post_id) {
    if( $column_name == 'slug' ) {
        $post = get_post($post_id);
        $slug = $post->post_name;
        echo attribute_escape($slug);
    }
}
add_filter( 'manage_pages_columns', 'add_page_columns_name');
add_action( 'manage_pages_custom_column', 'add_page_column', 10, 2);


add_filter( 'wpcf7_validate_email', 'wpcf7_text_validation_filter_extend', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_text_validation_filter_extend', 11, 2 );
function wpcf7_text_validation_filter_extend( $result, $tag ) {
    $type = $tag['type'];
    $name = $tag['name'];
    $_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );
    if ( 'email' == $type || 'email*' == $type ) {
        if (preg_match('/(.*)_confirm$/', $name, $matches)){
            $target_name = $matches[1];
            if ($_POST[$name] != $_POST[$target_name]) {
                if (method_exists($result, 'invalidate')) {
                    $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
                } else {
                    $result['valid'] = false;
                    //$result['reason'][$name] = '確認用のメールアドレスが一致していません';
                    $result['reason'] = array( $name => '確認用のメールアドレスが一致していません' );
                }
            }
        }
    }
    return $result;
}


// アイキャッチ画像のURLを表示
function post_thumbnail_url($postID, $size = null, $echo = true){
    $url = "";
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($postID), $size );
    if( is_array($thumb) && isset($thumb[0]) ) $url = $thumb[0];
    if ($echo) echo $url;
    else return $url;
}

//img srcの記述を拾って画像を取得し表示する
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
 
    if(empty($first_img)){ //Defines a default image
        $first_img = "/images/default.jpg";
    }
return $first_img;
}


//絶対パス→相対パス
function make_href_root_relative($input) {
    return preg_replace('!http(s)?://' . $_SERVER['SERVER_NAME'] . '/!', '/', $input);
}

//パーマリンク絶対パス→相対パス
function root_relative_permalinks($input) {
    return make_href_root_relative($input);
}
add_filter( 'the_permalink', 'root_relative_permalinks' );
