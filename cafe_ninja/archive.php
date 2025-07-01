  <?php get_header(); ?>


  <section class="keyVisual keyVisualUnder">
    <h2 class="keyCatch">News</h2>
  </section>

  
  <div class="inner">
    <main class="main">
      <div class="newsList newsListUnder">
        <?php if(have_posts()): ?>
          <?php while(have_posts()): the_post();?>
            <a href="<?php the_permalink(); ?>" class="newsLink">
              <div class="newsLinkCap">
                <?php if(has_post_thumbnail()):?>
                  <img src="<?php the_post_thumbnail('full');?>" alt="">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri().'/assets/img/no_image.jpg';?>" alt="">
                <?php endif; ?>
                </div>
              <div class="newsLinkInfo">
                <div class="newsLinkInner">
                  <span class="newsLinkTitle"><?php the_title(); ?></span>
                  <span class="newsLinkDate"><?php echo get_the_date().get_the_time(); ?></span>
                </div>
              </div>
            </a>
          <?php endwhile;?>
        <?php else: ?>
            記事はありません。
        <?php endif; ?>
      </div>
      <?php the_posts_pagination(); ?>
    </main>

    <?php get_sidebar(); ?>

  </div>

  <?php get_footer(); ?>