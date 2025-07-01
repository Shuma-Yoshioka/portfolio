<nav>
    <ol class="breadcrumbs">
      <li class="breadcrumbs__item"><a href="<?php echo home_url(); ?>" class="breadcrumbs__link">ホーム</a></li>
      <?php if(is_post_type_archive('blog')):?>
      <!-- ブログ一覧 -->
      <li class="breadcrumbs__item">ブログ一覧</li>
      <?php elseif(is_post_type_archive('neko')):?>
      <!-- 全猫一覧 -->
      <li class="breadcrumbs__item">全猫ちゃん一覧</li>
      <?php elseif(is_post_type_archive('shop')):?>
      <!-- お店を探す -->
      <li class="breadcrumbs__item">お店を探す</li>
      <?php elseif(is_singular('blog')):?>
      <!-- ブログ詳細 -->
      <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('blog'); ?>" class="breadcrumbs__link">ブログ一覧</a></li>
      <li class="breadcrumbs__item"><?php echo the_title(); ?></li>
      <?php elseif(is_singular('neko')):?>
      <!-- 猫ちゃん詳細 -->
       <?php $post_cshop=get_field('cat_shop');?>
      <li class="breadcrumbs__item"><a href="<?php echo get_permalink(get_page_by_path('cat_type')->ID); ?>" class="breadcrumbs__link">猫種一覧</a></li>
      <?php
        $terms=get_the_terms($post->ID,'cat_type');
        foreach( $terms as $term ) {
        $cat_type=$term->name; // 名前
        $term_link=get_term_link($term);//リンク
        }
      ?>
      <li class="breadcrumbs__item"><a href="<?php echo $term_link;?>"><?php echo $cat_type;?>一覧</a></li>
      <li class="breadcrumbs__item"><?php echo the_title(); ?></li>
      <?php elseif(is_singular('shop')):?>
      <!-- 店舗詳細 -->
      <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('shop'); ?>" class="breadcrumbs__link">お店を探す</a></li>
      <li class="breadcrumbs__item"><?php echo the_title(); ?></li>
      <?php elseif(is_page('cat_type')):?>
      <!-- 猫種一覧(固定ページ) -->
      <li class="breadcrumbs__item">猫種一覧</li>
      <?php elseif(is_tax('cat_type')):?>
      <!-- 種別猫一覧(taxonomy.php) -->
      <li class="breadcrumbs__item"><a href="<?php echo get_permalink(get_page_by_path('cat_type')->ID); ?>" class="breadcrumbs__link">猫種一覧</a></li>
      <li class="breadcrumbs__item"><?php echo single_term_title();?>一覧</li>
      <?php elseif(is_tax('hand_shop_type')):?>
      <!-- 店舗の取り扱い猫ちゃん一覧(taxonomy.php) -->
      <?php
        $terms=get_the_terms($post->ID,'hand_shop_type');
        foreach( $terms as $term ) {
        $shop_slug=$term->slug; // スラッグ
        }
      ?>
      <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('shop'); ?>" class="breadcrumbs__link">お店を探す</a></li>
      <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('shop').$shop_slug; ?>" class="breadcrumbs__link"><?php single_term_title();?></a></li>
      <li class="breadcrumbs__item"><?php single_term_title();?>のねこちゃん一覧</li>
      <?php elseif(is_tax('input_shop_type')):?>
      <!-- 店舗のブログ一覧 -->
            <?php
        $terms=get_the_terms($post->ID,'input_shop_type');
        foreach( $terms as $term ) {
        $shop_slug=$term->slug; // スラッグ
        }
      ?>

      <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('shop'); ?>" class="breadcrumbs__link">お店を探す</a></li>
      <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('shop').$shop_slug; ?>" class="breadcrumbs__link"><?php single_term_title();?></a></li>
      <li class="breadcrumbs__item"><?php single_term_title();?>のブログ一覧</li>

      <?php elseif(is_tag()):?>
      <!-- tag一覧 -->
      <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('blog'); ?>" class="breadcrumbs__link">ブログ一覧</a></li>
			<li class="breadcrumbs__item"><?php single_term_title();?>のブログ</li>
      <?php endif;?>
    </ol>
</nav>
