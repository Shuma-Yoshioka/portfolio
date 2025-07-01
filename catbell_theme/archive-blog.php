<?php get_header(); ?>

<!-- main -->
    <main class="main cntInner inner">
    <!-- パンくずリスト -->
    <?php get_template_part('_inc/breadcrumbs'); ?>
    <!-- /パンくずリスト -->
    <!-- top -->
        <section>
        <?php if(have_posts()): ?>
            <a href="<?php the_permalink(); ?>">
                <div class="top__img">
                    <img src="<?php echo get_field('blog_img');?>" alt="<?php echo the_title();?>">
                </div>
                <div class="top__content">
                    <h2 class="top__ttl"><?php echo the_title(); ?></h2>
                    <div class="top__txt"><?php echo the_content(); ?></div>
                    <div class="top__tagItems">
                        <?php the_tags('<div class="tag top__tag">','</div>  <div class="tag top__tag">','</div>'); ?>
                    </div>
                    <span class="date top__date"><?php echo the_time('Y.m.d'); ?></span>
                </div>
            </a>
        <?php endif; ?>
        </section>
    <!-- /top -->
    <!-- content -->
        <section class="content">
            <div class="archive">
                    <?php get_template_part('_inc/pager'); ?>  
                <div class="archive__wrap">
                <?php if(have_posts()):?>
                    <?php while(have_posts()):the_post();?>
                        <?php if(!is_first()):?>
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
                        <?php endif;?>
                    <?php endwhile; endif;?>
                </div>
                <?php get_template_part('_inc/pager'); ?>  
            </div>
            <?php get_template_part('_inc/sidebar'); ?>
        </section>

    <!-- /content -->
    </main>
<!-- /main -->
    <?php get_footer();?>