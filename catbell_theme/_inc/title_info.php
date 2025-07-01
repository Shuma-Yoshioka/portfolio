<title>
  <?php 
    bloginfo('name');
    echo " | ";
    global $page,$paged;
    if(is_front_page()):
      echo "安心・安全な猫専門ペットショップ";
    elseif(is_post_type_archive('shop')):
      echo "店舗記事一覧";
    elseif(is_post_type_archive('neko')): 
      echo "猫ちゃん一覧";
    elseif(is_post_type_archive('blog')):
      echo "ブログ一覧";
    elseif(is_singular('blog')||is_singular('neko')||is_singular('shop')):
      echo the_title();
    elseif(is_page('cat_type')):
      echo "猫種一覧";
    elseif(is_tax('cat_type')):
      echo single_term_title()."一覧";
    elseif(is_tax('hand_shop_type')):
      echo single_term_title()."の猫ちゃん一覧";
    elseif(is_tax('input_shop_type')):
      echo single_term_title()."のブログ一覧";
    elseif(is_page('contact')):
      echo the_title();
    else:
      echo '404 not found';
   endif;?>
</title>
