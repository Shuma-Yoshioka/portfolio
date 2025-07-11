<?php get_header(); ?>

  <section class="catList">
    <div class="catList__inner inner">
      <!-- breadcrumb -->
        <?php get_template_part('_inc/breadcrumbs'); ?>
      <!-- /breadcrumb -->
    <!-- pagenation -->
    <?php get_template_part('_inc/pager'); ?>  


      <div class="catList__head">
        <h2 class="catList__title"><?php single_term_title(); ?>のねこちゃん一覧</h2>
      </div>

        <ul class="cat__lists">
          <?php 
            $type=get_query_var('hand_shop_type');
            $paged=get_query_var('paged')?get_query_var('paged'):1;
            $args=array(
              'post_type'=>'neko',//posttypeslug
              'order'=>'DESC',
              'paged'=>$paged,
              'tax_query'=>array(
                  array(
                    'taxonomy'=>'hand_shop_type',
                    'field'=>'slug',
                    'terms'=>$type)

              )
            );
            $my_query=new WP_Query($args);
            $pages=$my_query->max_num_pages;
            $wp_query->max_num_pages=$pages;
            if($my_query->have_posts()):
            while($my_query->have_posts()):$my_query->the_post();
          ?>
            <li class="cat__list">
              <a href="<?php the_permalink(); ?>" class="cast__list__img hover">
                <?php foreach(SCF::get('猫ちゃんのサムネイル画像')as $field_name=>$field_value):?>
                  <?php
                    $carousel_thumbnail=wp_get_attachment_image_src($field_value['cat_img'],'large');
                    $carousel_thumbnail=esc_url($carousel_thumbnail[0]);
                    if(!$carousel_thumbnail){
                      $carousel_thumbnail='https://placehold.jp/584x390.png';
                    }
                    ?>
                  <img src="<?php echo $carousel_thumbnail;?>"
                  alt="<?php echo the_title();?>">
                <?php break; endforeach;?>
              </a>
              <div class="cat__list__body">
                <div class="cat__list__head">
                  <div href="#" class="cat__list__label hover">
                    <?php 
                      $post_cshop=get_field('cat_shop');
                      echo get_the_title($post_cshop);
                    ?>
                   </div>
                  <div href="<?php the_permalink(); ?>" class="cat__list__title"><?php echo the_title();?></div>
                </div>
                <dl class="cat__list__content">
                  <dt>生年月日</dt>
                  <dd><?php echo get_field('cat_birthday');?></dd>
                  <dt>性別</dt>
                  <dd><?php echo get_field('cat_gender');?></dd>
                  <dt>生体価格</dt>
                  <dd><span class="cat__price"><?php echo get_field('cat_price');?></span>（税抜）</dd>
                </dl>
                <div class="cat__list__footer">
                  <div class="cat__list__footer--store-more">
                    <a href="<?php echo get_permalink($post_cshop);?>" class="more__link more--store hover">お取扱い店舗を見る</a>
                  </div>
                  <div class="cat__list__footer--cat__more">
                    <a href="<?php the_permalink(); ?>" class="more__link more--cat hover">この猫を詳しく見る</a>
                  </div>
                </div>
              </div>
            </li>
          <?php endwhile;?>
          <?php else:?>
            <p style="font-size:16px">該当する猫ちゃんが見つかりませんでした。</p>
          <?php endif;?>
        </ul>

      <!-- pagenation -->
      <?php get_template_part('_inc/pager'); ?>  

      <?php get_template_part('_inc/shop_info'); ?>

    </div>
  </section>
  <!-- /.anotherPet -->

<?php get_footer(); ?>
