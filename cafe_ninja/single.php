<?php get_header(); ?>

  <section class="keyVisual keyVisualUnder">
    <h2 class="keyCatch">News</h2>
  </section>

  
  <div class="inner">
    <main class="main">
      <h2 class="newsTitle"><?php the_title(); ?></h2> 
      <div class="newsDate"><?php echo get_the_date().get_the_time(); ?></div>
      <div class="newsCap">
        <?php if(has_post_thumbnail()):?>
          <?php the_post_thumbnail('full');?>
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri().'/assets/img/no_image.jpg';?>" alt="">
        <?php endif; ?>
      </div>
      <div class="newsText">
        <?php the_content(); ?>
        </div>
    </main>

    <?php get_sidebar(); ?>

  </div>

<?php get_footer(); ?>