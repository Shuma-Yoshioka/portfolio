<div class="about__store">
  <?php 
    $term_id=get_queried_object_id();
    $term_idsp="hand_shop_type_".$term_id;//taxonomyname+termid->31.12:45
    $post_object=get_field('link_shop',$term_idsp);
    $image=get_post_meta($post_object,'shop_img',true);//22
    $size='full';

  ?>
  <a href="<?php  echo get_permalink($post_object);?>" class="about__store__img hover">
    <?php echo wp_get_attachment_image($image,$size);?>
  </a>
  <div class="about__store__body">
    <div class="about__store__head">
      <a href="<?php  echo get_permalink($post_object);?>" class="store__list__title hover">
        <?php echo get_the_title($post_object);?>
      </a>
    </div>
    <dl class="about__store__content">
      <dt>住所</dt>
      <dd><?php echo get_post_meta($post_object,'shop_address',true);?></dd>
      <dt>TEL</dt>
      <dd><?php echo get_post_meta($post_object,'shop_tel',true);?></dd>
      <dt>営業時間</dt>
      <dd><?php echo get_post_meta($post_object,'shop-hours',true);?></dd>
    </dl>
    <div class="about__store__footer">
      <a href="<?php  echo get_permalink($post_object);?>" class="util__link">お取扱い店舗を見る</a>
    </div>
  </div>
</div><!--about__store-->