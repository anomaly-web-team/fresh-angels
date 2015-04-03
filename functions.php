<?php

automatic_feed_links();
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));


/* 固定ページでMOREを使う
---------------------------------------------------- */
add_post_type_support( 'page', 'excerpt' ); 

/* 抜粋文字数
---------------------------------------------------- */
function new_excerpt_mblength($length) { 
    if( is_home()) {
     return 100; 
    }
    else{
        return 100;
    }
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');

/* 抜粋
---------------------------------------------------- */
function new_excerpt_more($more) {
     return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/* ヘッダーメタ削除
---------------------------------------------------- */

remove_action('wp_head', 'feed_links_extra',3,0);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'rel_canonical');

/* カスタムヘッダー
---------------------------------------------------- */
$custom_header_support = array(
	'width' => 1800,
	'height' => 1200,
	'default-image' => get_template_directory_uri() . '/images/main.jpg',
	'uploads' => true,
	'header-text' => false,
	'flex-height' => false,
	'flex-width' => false,
	);
	
add_theme_support( 'custom-header', $custom_header_support );

/*
デフォルトのカスタムヘッダー
register_default_headers(array( 
	'sliderimg1' => array(
    'url' => '%s/images/header.jpg', 
    'thumbnail_url' => '%s/images/header-s.jpg', 
    'description' => 'イメージ1'
  ),
  'sliderimg2' => array(
    'url' => '%s/images/header2.jpg', 
    'thumbnail_url' => '%s/images/header2-s.jpg', 
    'description' => 'イメージ2'
  ),
   'sliderimg3' => array(
    'url' => '%s/images/header3.jpg', 
    'thumbnail_url' => '%s/images/header3-s.jpg', 
    'description' => 'イメージ3'
  )
));
*/

/* アイキャッチ画像のURLを取得
---------------------------------------------------- */
function get_eyecatch_url($imgsize) {
	$thumb = get_the_post_thumbnail($post->ID,$imgsize); //サムネイルのURL
	$pattern= "/(?<=src=['|\"])[^'|\"]*?(?=['|\"])/i";
	preg_match($pattern, $thumb, $thePath);
	return $thePath[0];
}

/* アイキャッチ画像のサイズ削除
---------------------------------------------------- */
add_theme_support( 'post-thumbnails' );

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    $html = preg_replace('/class=".*\w+"\s/', '', $html);
    return $html;
};

/* カスタムメニュー
---------------------------------------------------- */
register_nav_menus( array( 'main-nav' => __( 'Main Navigation' ), ) );
register_nav_menus( array( 'home-nav' => __( 'Home Navigation' ), ) );
register_nav_menus( array( 'footer-nav' => __( 'Footer Navigation' ), ) );
register_nav_menus( array( 'sub-nav' => __( 'Sub Navigation' ), ) );


//カスタム投稿タイプでaddquicktagを使う
add_filter( 'addquicktag_post_types', 'my_addquicktag_post_types' );

function my_addquicktag_post_types( $post_types ) {
	array_push($post_types, 'schedule');
    return $post_types;
}


/* query post
---------------------------------------------------- */
function customize_mainquery_home( $wp_query ) {
	if ( is_admin() || ! $wp_query->is_main_query() )
	return;
    
	if(is_home()) {
    	$wp_query->set( 'post_type',array('post')); 
		$wp_query->set( 'posts_per_page', '4' );
		return;
    }
    elseif(is_category()){
    	$wp_query->set( 'post_type',array('post') ); 
        $wp_query->set( 'posts_per_page', '16' );
    	return;
    }
	else{
    	return;
    }  
	
}
add_action( 'pre_get_posts', 'customize_mainquery_home' );


/* 相対パス
---------------------------------------------------- */
function replaceImagePath($arg) {
$content = str_replace('"images/', '"' . get_bloginfo('template_directory') . '/images/', $arg);
return $content;
}
add_action('the_content', 'replaceImagePath');


/* width、height 削除
 ---------------------------------------------------- */
 
function remove_hwstring_from_image_tag( $html, $id, $alt, $title, $align, $size ) {
    list( $img_src, $width, $height ) = image_downsize($id, $size);
    $hwstring = image_hwstring( $width, $height );
    $html = str_replace( $hwstring, '', $html );
    return $html;
}
add_filter( 'get_image_tag', 'remove_hwstring_from_image_tag', 10, 6 );


/* ギャラリーショートコード
---------------------------------------------------- */
function my_gallery_shortcode($attr) {
    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $attr['orderby'] ) )
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post ? $post->ID : 0,
        'itemtag'    => 'li',
        'icontag'    => 'span',
        'captiontag' => 'span',
        'columns'    => 3,
        'size'       => 'medium',
        'include'    => '',
        'exclude'    => ''
    ), $attr, 'gallery'));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $icontag = tag_escape($icontag);
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) )
        $itemtag = 'dl';
    if ( ! isset( $valid_tags[ $captiontag ] ) )
        $captiontag = 'dd';
    if ( ! isset( $valid_tags[ $icontag ] ) )
        $icontag = 'dt';

    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        
    $size_class = sanitize_html_class( $size );
    $gallery_div = "<ul id='gallery' class='cf'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        if ( ! empty( $attr['link'] ) && 'file' === $attr['link'] )
            $image_output = wp_get_attachment_link( $id, $size, false, false );
        elseif ( ! empty( $attr['link'] ) && 'none' === $attr['link'] )
            $image_output = wp_get_attachment_image( $id, $size, false );
        else
            $image_output = wp_get_attachment_link( $id, $size, true, false );

        $image_meta  = wp_get_attachment_metadata( $id );

        $orientation = '';
        if ( isset( $image_meta['height'], $image_meta['width'] ) )
            $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

        $output .= "<{$itemtag} class='column column--{$columns}'>";
        $output .= "
            <{$icontag} class='gallery-icon {$orientation}'>
                $image_output
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='wp-caption-text gallery-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '';
    }

    $output .= "
        </ul>\n";

    return $output;
}

/* デフォルトの gallery ショートコードを削除 */
remove_shortcode('gallery', 'gallery_shortcode');

/* 新しい gallery ショートコードを追加 */
add_shortcode('gallery', 'my_gallery_shortcode');
