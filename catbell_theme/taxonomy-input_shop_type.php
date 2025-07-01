<?php get_header(); ?>

<!-- main -->
    <main class="main cntInner inner">
    <!-- パンくずリスト -->
      <?php get_template_part('_inc/breadcrumbs'); ?>
    <!-- /パンくずリスト -->
    <!-- content -->
        <section class="content">
          <div class="archive">
            <div class="archive__wrap">
              <?php 
                $type=get_query_var('input_shop_type');
                $paged=get_query_var('paged')?get_query_var('paged'):1;
                $args=array(
                  'post_type'=>'blog',//posttypeslug
                  'order'=>'DESC',
                  'paged'=>$paged,
                  'tax_query'=>array(
                    array(
                      'taxonomy'=>'input_shop_type',
                      'field'=>'slug',
                      'terms'=>$type
                    )
                  )
                );
                $my_query=new WP_Query($args);
                if($my_query->have_posts()):
                  while($my_query->have_posts()):$my_query->the_post();
                ?>
                    <div class="archive__card">
                      <a href="<?php the_permalink(); ?>" class="archive__cardLink">
                          <div class="archive__cardWrap">
                            <div class="archive__img">
                              <img src="<?php echo get_field('blog_img');?>" alt="<?php echo the_title();?>">
                            </div>
                            <div class="archive__content">
                              <span class="date"><?php echo the_time('Y.m.d'); ?></span>
                              <div class="archive__ttl"><?php echo the_title(); ?></div>
                              <div class="archive__txt"><?php echo the_content(); ?></div>
                            </div>
                          </div>
                      </a>
                      <div class="archive__tagItems">
                        <?php the_tags('<div class="tag top__tag">','</div><div class="tag top__tag">','</div>'); ?>
                      </div>
                    </div>
                <?php endwhile;endif;?>
                <?php get_template_part('_inc/shop_info'); ?>
                <?php get_template_part('_inc/sidebar'); ?>
                <!-- <div class="about__store">
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
                      <a href="<?php  echo home_url().'/shop'.'/'.get_the_title($post_object);?>" class="store__list__title hover">
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
                      <a href="<?php  echo home_url().'/shop'.'/'.get_the_title($post_object);?>" class="util__link">お取扱い店舗を見る</a>
                    </div>
                  </div>
                </div>--><!--/about__store -->
              </div>
            </div>
        <?php get_template_part('_inc/sidebar'); ?>

        </section>
    <!-- /content -->
    </main>
<!-- /main -->
    <?php get_footer();?>