<?php get_header(); ?>

<!-- main -->
    <main class="main cntInner inner">
    <!-- パンくずリスト -->
      <?php get_template_part('_inc/breadcrumbs'); ?>
    <!-- /パンくずリスト -->


    <!-- top -->
        <section>
            <div class="top__img">
                <img src="<?php echo get_field('blog_img');?>" alt="<?php echo the_title();?>">
            </div>
        </section>
	<!-- /top -->
	
    <!-- content -->
        <section class="content">
            <div class="blogs">
				<span class="date"><?php echo the_time('Y.m.d'); ?></span>
				<h1 class="blog__ttl"><?php echo the_title(); ?></h1>
				<div class="blog__wrapper">
					<?php echo the_content(); ?>
				</div>
				<div class="blog__tagItems">
          <?php the_tags('<div class="tag top__tag">','</div>  <div class="tag top__tag">','</div>'); ?>
				</div>
				
				<?php
					$post_object=get_field('blog_shop');
					$image=get_post_meta($post_object,'shop_img',true);//22
					$size='full';
				?>

				<div class="storeInfo">
					<div class="storeInfo__img">
						<?php echo wp_get_attachment_image($image,$size);?>
					</div>
					<div class="storeInfo__content">
						<h3 class="storeInfo__ttl"><?php echo get_the_title($post_object);?></h3>
						<table class="storeInfo__tbl">
							<tr class="storeInfo__items">
								<td class="storeInfo__label">住所</td>
								<td class="storeInfo__cnt"><?php echo get_post_meta($post_object,'shop_address',true);?></td>
							</tr>
							<tr class="storeInfo__items">
								<td class="storeInfo__label">TEL</td>
								<td class="storeInfo__cnt"><?php echo get_post_meta($post_object,'shop_tel',true);?></td>
							</tr>
							<tr class="storeInfo__items">
								<td class="storeInfo__label">営業時間</td>
								<td class="storeInfo__cnt"><?php echo get_post_meta($post_object,'shop-hours',true);?></td>
							</tr>
						</table>
					</div>
					<a href="<?php echo get_permalink($post_object);?>" class="storeInfo__link link__btn"><span class="link__content">お取扱い店舗を見る</span></a>
				</div>
        
				<div class="newBlog">
					<h3 class="newBlog__ttl"><?php echo get_the_title($post_object);?>の最新ブログ</h3>
					<div class="newBlog__wrapper">
            <?php 
              $taxonomy='input_shop_type';
              $terms=get_the_terms($post->ID,$taxonomy);//33.27:00
              $term_slug="";//33.3:50
              foreach($terms as $term){
                $term_slug=$term->slug;
              }

              $args=array(
                  'post_type'=>'blog',//posttypeslug
                  'order'=>'ASC',
                  'posts_per_page'=>3,
                  'tax_query'=>array(
                      array(
                        'taxonomy'=>$taxonomy,
                        'field'=>'slug',
                        'terms'=>$term_slug)
                  )
                );
                $my_query=new WP_Query($args);
                if($my_query->have_posts()):
                while($my_query->have_posts()):$my_query->the_post();
            ?>
						<div class="newBlog__card">
							<div class="newBlog__img">
                <img src="<?php echo get_field('blog_img');?>" alt="<?php echo the_title();?>">
							</div>
							<div class="newBlog__ttl"><?php echo the_title(); ?></div>
							<span class="date newBlog__date"><?php echo the_time('Y.m.d'); ?></span>
						</div>
            <?php endwhile;endif;?>
					</div>
					<a href="<?php echo get_term_link($term_slug,$taxonomy);?>" class="newBlog__link link__btn"><span class="link__content newBlog__link--cnt">この店舗のブログを見る</span></a>
				</div>
            </div>
            <?php get_template_part('_inc/sidebar'); ?>
        </section>
    <!-- /content -->
    </main>
<!-- /main -->
<?php get_footer();?>