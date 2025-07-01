<?php get_header(); ?>

<section class="keyVisual">
  <h2 class="keyCatch">ようこそNINJA CAFEへ</h2>
</section>

<section class="sec secAbout">
  <h2 class="secTitle"><span>MENU</span><br>商品紹介</h2>
  <div class="inner">
    <div class="lineupArea">
      <div class="lineup">
        <div class="lineupCap"><img src="<?php echo get_template_directory_uri().'/assets/img/item01.jpg';?>" alt=""></div>
        <div class="lineupInfo">
          <div class="lineupInfoInner">
            <div class="lineupTitle">クロワッサン</div>
            <div class="lineupText">150円</div>
          </div>
        </div>
      </div>
      <div class="lineup">
        <div class="lineupCap"><img src="<?php echo get_template_directory_uri().'/assets/img/item02.jpg';?>" alt=""></div>
        <div class="lineupInfo">
          <div class="lineupInfoInner">
            <div class="lineupTitle">フランスパン</div>
            <div class="lineupText">150円</div>
          </div>
        </div>
      </div>
      <div class="lineup">
        <div class="lineupCap"><img src="<?php echo get_template_directory_uri().'/assets/img/item03.jpg';?>" alt=""></div>
        <div class="lineupInfo">
          <div class="lineupInfoInner">
            <div class="lineupTitle">カレーパン</div>
            <div class="lineupText">150円</div>
          </div>
        </div>
      </div>
    </div>
    <div class="btnWrap"><a href="<?php echo home_url().'/menu'; ?>" class="btn">商品一覧</a></div>
  </div>
</section>

<section class="sec secNews">
  <h2 class="secTitle"><span>INFORMATION</span><br>お知らせ</h2>
  <div class="inner">
    <div class="newsList">
      <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
          <a href="<?php the_permalink(); ?>" class="newsLink">
            <div class="newsLinkCap">
              <?php if(has_post_thumbnail()):?>
                <?php the_post_thumbnail('medium');?>
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
    <div class="btnWrap"><a href="news" class="btn">お知らせ一覧</a></div>
  </div>
</section>



<section class="sec secMap">
  <h2 class="secTitle"><span>ACCESS</span><br>アクセス</h2>
  <div class="inner">
    <div class="mapArea">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12961.947584801825!2d139.6921007!3d35.6896342!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf1665c37f38661e8!2z5p2x5Lqs6YO95bqB!5e0!3m2!1sja!2sjp!4v1533620309022" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
</section>

<?php get_footer(); ?>