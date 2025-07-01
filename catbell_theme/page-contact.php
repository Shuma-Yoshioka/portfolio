<?php get_header(); ?>

<main class="main cntInner inner">
<div id="contact">
<h2 class="shoplist__title"><?php echo the_title(); ?></h2>
<?php echo the_content(); ?>
</div>
</main>
<style>
#contact {
margin: 200px 0;
}
label{
  font-size: 24px;
}
input,
textarea {
border: 1px solid;
font-size: 16px;
}
form {
  width: 300px;
  margin: auto;
}
.wpcf7-form-control-wrap input{
  width: 550px;
  height: 24px;
}
.wpcf7-form-control-wrap textarea{
  width: 550px;
  height: 144px;
}

@media screen and (max-width: 768px) {
  .wpcf7-form-control-wrap{
    width: 300px;
    height: 24px;
  }
}
</style>

<?php get_footer(); ?>