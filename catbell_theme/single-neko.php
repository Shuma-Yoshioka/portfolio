<?php get_header(); ?>

  <section class="single__cat">
    <div class="single__cat__inner inner">
      <!-- breadcrumb -->
      <?php get_template_part('_inc/breadcrumbs'); ?>
      <!-- /breadcrumb -->

      <div class="single__cat__wrap">
        <div class="single__cat__img">
          <div class="single__cat--mainImg your-class">
                <?php
                  $catCountUp=0;
                  foreach(SCF::get('猫ちゃんのサムネイル画像')as $field_name=>$field_value):
                ?>
                  <?php
                    $carousel_thumbnail=wp_get_attachment_image_src($field_value['cat_img'],'large');
                    $carousel_thumbnail=esc_url($carousel_thumbnail[0]);
                    if(!$carousel_thumbnail){
                      $carousel_thumbnail='https://placehold.jp/584x390.png';
                    }
                    if($catCountUp<4){
                    ?>
                    <img src="<?php echo $carousel_thumbnail;?>"alt="<?php echo the_title();?>">
                <?php } $catCountUp++; endforeach;?>
          </div>
          <div class="slider-nav">
                <?php
                  $arrayCountUp=0;
                  foreach(SCF::get('猫ちゃんのサムネイル画像')as $field_name=>$field_value):
                ?>
                  <?php
                    $carousel_thumbnail=wp_get_attachment_image_src($field_value['cat_img'],'large');
                    $carousel_thumbnail=esc_url($carousel_thumbnail[0]);
                    if(!$carousel_thumbnail){
                      $carousel_thumbnail='https://placehold.jp/584x390.png';
                    }
                    if($arrayCountUp<4){
                    ?>
                    <img class="single__cat--subImgb" src="<?php echo $carousel_thumbnail;?>"alt="<?php echo the_title();?>">
                <?php } $arrayCountUp++; endforeach;?>
          </div>
        </div>
        <!-- 25.8:59 -->
        <div class="single__cat__body">
          <h2><a href="#" class="single__cat__title"><?php the_title();?></a></h2>
          <dl class="single__cat__content">
              <dt>生年月日</dt>
              <dd><?php echo get_field('cat_birthday');?></dd>
              <dt>性別</dt>
              <dd><?php echo get_field('cat_gender');?></dd>
              <dt>生体価格</dt>
              <dd><span class="cat__price"><?php echo get_field('cat_price');?></span>（税抜）</dd>
            <dt>血統書</dt>
            <dd><?php echo get_field('cat_Pedigree');?></dd>
          </dl>
          <div class="single__cat__footer hover">
            <?php
              $terms=get_the_terms($post->ID,'cat_type');
              foreach($terms as $term){
                $term_link=get_term_link($term);
            ?>
             <a href="<?php echo $term_link;?>"><?php echo $term->name;?>一覧を見る<i class="fas fa-angle-right"></i></a>

            <?php }?>
          </div>
        </div>
      </div><!-- /single__cat -->

      <div class="about__cat">
        <h3 class="about__cat__title">コメント</h3>
        <div class="about__cat__text">
          <?php echo get_field('cat_text');?>
        </div>
      </div>
      
        <?php
					$post_object=get_field('cat_shop');
					$image=get_post_meta($post_object,'shop_img',true);//22
					$size='full';
				?>



      <div class="about__store">
        <a href="<?php echo get_permalink($post_object);?>" class="about__store__img hover">
          <?php echo wp_get_attachment_image($image,$size);?>
        </a>
        <div class="about__store__body">
          <div class="about__store__head">
            <a href="<?php echo get_permalink($post_object);?>" class="store__list__title hover">
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
            <a href="<?php echo get_permalink($post_object);?>" class="util__link about__store_btn hover">お取扱い店舗を見る</a>
          </div>
        </div>
      </div><!-- /.about__store -->
    <?php get_template_part('_inc/other_neko'); ?>  
    </div>
  </section>

  <!-- jQuery -->
  <!-- slick -->
  <script src="<?php echo get_template_directory_uri().'/assets/js/slick.min.js';?>"></script>
  <script>
    $(".your-class").slick({
        slidesToShow: 1,
        arrows: false,
        fade: true,
        asNavFor: ".slider-nav",
        accessibility: false,
      });
      $(".slider-nav").slick({
        slidesToShow: 4,
        asNavFor: ".your-class",
        centerMode: true,
        focusOnSelect: true,
        accessibility: false,
        responsive: [
          {
            breakpoint: 384,
            settings: {
              swipe: true,
              arrows: false,
              slidesToShow: 3,
              slidesToScroll: 1,
            },
          },
        ],
      });
  </script>

<?php get_footer(); ?>
