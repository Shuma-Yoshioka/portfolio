
            <div class="side">
                <div class="pickup">
                    <h3 class="pickup__topTtl">ピックアップ</h3>
                    <?php 
                        $args=array(
                            'post_type'=>'blog',//posttypeslug
                            'order'=>'DESC',
                            'posts_per_page'=> 3,
                            'meta_key'=>'blog_pickup',//customfildslugname
                            'meta_value'=>'on',//checkboxkey
                            'meta_compare'=>'LIKE'//right?
                        );
                        $my_query=new WP_Query($args);
                        if($my_query->have_posts()):
                        while($my_query->have_posts()):$my_query->the_post();
                    ?>
                    <a href="#" class="pickup__card">
                        <div class="pickup__img">
                            <img src="<?php echo get_template_directory_uri().'/assets/img/blog/01.jpg'?>" alt="ねこ">
                        </div>
                        <div class="pickup__ttl"><?php echo the_title(); ?></div>
                        <span class="date pickup__date"><?php echo the_time('Y.m.d.h:i:s'); ?></span>
                    </a>
                    <?php endwhile;endif; ?>
                </div>
                <div class="keyword">
                    <h3 class="keyword__topTtl">キーワード</h3>
                    <ul class="keyword__tagItems">
                        <?php
                            $posttags=get_tags();
                            if($posttags):
                            foreach($posttags as $tag):
                        ?>
                        <li class="keyword__tagItem"><a href="<?php echo get_tag_link($tag->term_id); ?>" class="tag keyword__tag"><?php echo $tag->name; ?></a></li>
                        <?php endforeach;endif;?>
                    </ul>
                </div>
            </div>
