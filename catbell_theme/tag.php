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
                        $tag =get_queried_object();
                        $args=array(
                            'tag'=>$tag->slug,
                            'post_type'=>'blog',//posttypeslug
                            'order'=>'DESC',
                            'posts_per_page'=> -1
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
                </div>
            </div>
            <?php get_template_part('_inc/sidebar'); ?>
        </section>
    <!-- /content -->
    </main>
<!-- /main -->
    <?php get_footer();?>