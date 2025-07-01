<div class="anotherPet__wrap">
<div class="anotherPet__inner">
    <h3 class="catList__title">ほかにもこんな猫種が注目されています！</h3>
    <ul class="anotherPet__list">
      <?php
      $countUp=0;
      $taxonomy_name='cat_type';
      $taxonomys=get_terms($taxonomy_name);
      if(!is_wp_error($taxonomys)&&count($taxonomys)):
        shuffle($taxonomys);
        foreach($taxonomys as $taxonomy):
          $term_id=esc_html($taxonomy->term_id);
          $term_idsp="cat_type_".$term_id;
          $photo=get_field('cat_type_img',$term_idsp);
          if ($countUp<4):
            $terms=get_the_terms($post->ID,'cat_type');
            foreach($terms as $term){
              $term_link=get_term_link($term);
              if(esc_html($taxonomy->name)===$term->name){
                $countUp--;
              }
              else{
      ?>
        <li class="anotherPet__item hover">
          <a href="<?php echo get_permalink(get_page_by_path('cat_type')->ID);?><?php echo esc_html($taxonomy->slug);?>">
            <div class="anotherPet__catImg">
              <img src="<?php echo $photo;?>" alt="<?php echo esc_html($taxonomy->name);?>">
            </div>
            <p class="anotherPet__catName"><?php echo esc_html($taxonomy->name);?></p>
          </a>
        </li>
      <?php }}endif;$countUp++;endforeach;endif;?>

    </ul>
    </div>
</div>
<!-- /.anotherPet__wrap -->
