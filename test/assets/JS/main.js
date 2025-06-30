$(window).on("scroll",function(){
		//fadein
	$('[data-fadeIn]').each(function(index,el){
		if($(window).scrollTop()>($(el).offset().top - $(window).height() / 1.15)){
			$(el).addClass('is_over');
		}
	})
})
$(function(){
  	$('.other_trigger').on('click',function(){
      $(this).toggleClass('is_active');
      $('.other').toggleClass('is_active');
      $('.other_cover').toggleClass('is_active');
    });
})