<?php
// function my_style() {
// wp_enqueue_style(
//'style',
//get_template_directory_uri() . '/assets/css/style.css'
//);
//}
// add_action( 'wp_enqueue_scripts', 'my_style' );
// アイキャッチ画像を有効にする
add_theme_support('post-thumbnails');

function cafe_post_custom($query){
    if(is_admin()|| !$query->is_main_query()){
        return;
    }
    if($query->is_post_type_archive('post')){
       $query->set('posts_per_page','3');
    }
    else{
       $query->set('posts_per_page','3');
    }
}
add_filter('pre_get_posts','cafe_post_custom');

function post_has_archive($args,$post_type){
    if($post_type=='post'){
        $args['rewrite']=true;
        $args['has_archive']='news';//slugname
    }
    return $args;
}
add_filter('register_post_type_args','post_has_archive',10,2);