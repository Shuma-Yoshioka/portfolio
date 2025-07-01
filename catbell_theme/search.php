<!-- 絞り込みに応じた件数-->
<?php
$found_posts = $wp_query->found_posts;//データベースの中に保存されている。
?>
<div class="ridx-count"><p><?php echo $found_posts; ?>件</p></div>
<ul class="bl_tabArea">
<?php
//絞り込みの値を取得
$s = $_GET['s'];//キーワード検索
$post_type = $_GET['post_type'];//list(archive)を参照
$term_select = $_GET['term_select'];//タクソノミーを参照する
//絞り込みの値をクエリ用に代入
if(!empty($term_select)) {
$term_selected_area = array('taxonomy'=>'area', 'terms'=>$term_select, 'field'=>'slug', 'operator'=>'IN');
}
if(!empty($term_select)){
$term_selected_parts = array('taxonomy'=>'parts', 'terms'=>$term_select, 'field'=>'slug', 'operator'=>'IN');
}//上と同じ仕組み
// 5.15:48
//タクソノミー絞り込みの場合はクエリを指定
if(!empty($term_selected_area) || !empty($term_selected_parts) ) {
query_posts(array(
'paged' => $paged,
'post_type' => $post_type,
's' => $s,
'tax_query' => array(//カテゴリーのクエリ
'relation' => 'AND',//or検索もできる。その場合はif？
$term_selected_area,
 $term_selected_narts
)));}
?>

<?php if(have_posts() ): while (have_posts() ) : the_post(); ?>
    <li>
      <a class="bl_tabArea_link" href="<?php the_permalink(); ?>">
        <div class="bl_tabArea_top">
          <h3><?php echo get_the_title(); ?></h3>
        </div>
        <div class="bl_tabArea_mid">
          <p><?php echo get_field('cause'); ?></p>
        </div>
        <div class="bl_tabArea_bottom">
          <p><?php echo get_field('address'); ?></p>
          <time date-time="<?php echo get_the_date('Y-n-j'); ?>">投稿日: <?php echo get_the_date('Y年月日'); ?></time>
        </div>
      </a>
    </li>
<?php endwhile; else: ?>
投稿が見つかりませんでした。再検索してください。
<?php endif; ?>
</ul>






<form class="ridx-input_section" role="search" action="<?php echo esc_url(home_url('/')); ?>"><!-- action先を入れる。 -->
  <!-- ここのようにsearch.phpを用意し、作る。他と同じようにsearch-blogとかsearch.shopとか作れそう -->
<input type="hidden" name="post_type" value="list">
<input type="hidden" name="s"><!-- sと付けることで、search.phpに遷移する。name="s"がない場合はechoで遷移させる -->
<div class="ridx-input_wrapper">
<div class="ridx-input_parts ridx-input_area">
<label for="area">地域</label>
<select name="area" id="area" class="ridx-sbox ridx-sarea ridx-area_gray">
<option value="0" selected style="color: #D1D1D1;">地域を絞り込む</option>
<?php $terms = get_terms('area' ); ?>
<?php if($terms): ?>
<?php foreach($terms as $term): ?>
<option value="<?php echo $term->slug; ?>" style="color: #555555;"><?php echo $term->name; ?></option>
<?php echo esc_html($term->name ); ?>
<?php endforeach; ?>
<?php endif; ?>
</select>
</div>
<div class="ridx-input_parts ridx-input_category">
<label for="parts">カテゴリー</label>
<select name="parts" id="parts" class="ridx-sbox ridx-scat ridx-cat_gray">
<option value="0" selected style="color: #D1D1D1; ">カテゴリーを絞り込む</option>
<?php $terms = get_terms('parts' ); ?>
<?php if($terms ): ?>
  <?php foreach($terms as $term): ?>
    <option value="<?php echo $term->slug; ?>" style="color: #555555;"><?php echo $term->name; ?></option>
    <?php echo esc_html($term->name); ?>
  <?php endforeach; ?>
<?php endif; ?>

</select>
</div>
<div class="ridx-input_line"></div>
<button type="submit" class="ridx-input_btn"><p>絞り込む</p></button>
</div>
</form>


<!-- https://toushisedori.com/archives/3279 -->
<!-- ログイン機能の参考サイト -->

<!-- 問い合わせ -->

<?php
function wpcf7_insert_post(){
  $submission = WPCF7_Submission::get_instance();
  if ($submission && $_POST['_wpcf7c'] ==='step2') {//確認後に送信させる
    $formdata = $submission->get_posted_data();
    $uploaded_files = $submission->uploaded_files();
    $timeStamp = $submission->get_meta('timestamp');
    $time = date('Ymd_Gi',$timestamp);
    extract($formdata);
    $custom_tax = array(
      'area' => array(1,2,3),
    );
    $new_post = array(
      'post_type' => 'list',
      'post_title' => $formdata['reason'],
      'post_status' => 'draft', //下書き
      'tax_input' => array('area' => array($formdata['userarea']))
    );
    $insertPost = wp_insert_post($new_post);
    if(!is_wp_error($insertPost)){
      wp_set_object_terms($insertPost, array($formdata['userarea']), 'area');
    }
    if(!is_wp_error($insertPost)) {
      ate_post_meta($insertPost, 'name', $formdata['your-name']);
      update_post_meta($insertPost, 'address', $formdata['address']);
      update_post_meta($insertPost, 'tel', $formdata['tel']);
      update_post_meta($insertPost, 'email', $formdata['your-email']);
      update_post_meta($insertPost, 'time', $formdata['time']);
      update_post_meta($insertPost, 'damage', $formdata['damage']);
      update_post_meta(SinsertPost, 'reason', $formdata['reason']);
      update_post_meta($insertPost, 'level', $formdata['level']);
      update_post_meta($insertPost, 'cause', $formdata['cause']);
      update_post_meta($insertPost, 'img 1', $formdata['img_1']);
      update_post_meta($insertPost, 'img 2', $formdata['img_2']);
      update_post_meta($insertPost, 'img 3', $formdata['img_3']);
      update_post_meta($insertPost, 'img_4', $formdata['ing_4']);
      update_post_meta($insertPost, 'img_5', $formdata['img_5']);
      update_post_meta($insertPost, 'img 6', $formdata['img_6']);
      update_post_meta($insertPost, 'img_7', $formdata['ing_7']);
      update_post_meta($insertPost, 'img 8', $formdata['img_8']);
      update_post_meta($insertPost, 'img_9', $formdata['img_9']);
      update_post_meta(SinsertPost, 'type', $formdata['type']);
      update_post_meta($insertPost, 'owner', $formdata["owner"]);
      update_post_meta($insertPost, 'condition', $formdata['condition']);
      update_post_meta($insertPost, 'insurance', $formdata['insurance']);
      update_post_meta($insertPost, 'company', $formdata['company']);
    /* 画像の設定 */
      for($i= 1; $i <= 9; $i++){
        if (isset($uploaded_files["img_$i"])) {
          $thumb_path='/wp-content/uploads/wpcf7_uploads/'.basename($uploaded_files["img_$i"] [0]);
          $thumb_id =addAttachmentFromForm($thumb_path, $uploaded_files["img_$i"] [0], $insertPost, $time);
          update_field("img_$i", $thumb_id, $insertPost);
        }
      }
    }
  }}

?>