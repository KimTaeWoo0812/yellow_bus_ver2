<?php if(!defined("__XE__"))exit;
if(!$__Context->layout_info->slide_height){;
$__Context->layout_info->slide_height = "450";
} ?>
<?php if(!$__Context->layout_info->slide_speed){;
$__Context->layout_info->slide_speed = "7000";
} ?>
<?php if(!$__Context->layout_info->slide_title_color){;
$__Context->layout_info->slide_title_color = "#222";
} ?>
<?php if(!$__Context->layout_info->slide_text_color){;
$__Context->layout_info->slide_text_color = "#999";
} ?>
<?php if(!$__Context->layout_info->more_bg){;
$__Context->layout_info->more_bg = "#222";
} ?>
<?php if(!$__Context->layout_info->more_color){;
$__Context->layout_info->more_color = "#fff";
} ?>
<!--#Meta:layouts/DW_ClayoutA/css/owl.carousel.css--><?php $__tmp=array('layouts/DW_ClayoutA/css/owl.carousel.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/DW_ClayoutA/css/m.da-owl.css--><?php $__tmp=array('layouts/DW_ClayoutA/css/m.da-owl.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/DW_ClayoutA/js/owl.carousel.min.js--><?php $__tmp=array('layouts/DW_ClayoutA/js/owl.carousel.min.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<style>
.wrap_slide{width:100%;padding:0;overflow:hidden;}
.xe .owl-carousel .owl-item .main_slide_div h2{font-size:38px/*타이틀 폰트 사이즈 수정*/;color:<?php echo $__Context->layout_info->slide_title_color ?>;margin-bottom:50px;}
.xe .owl-carousel .owl-item .main_slide_div p{line-height:1.5em;font-size:20px/*텍스트 폰트 사이즈 수정*/;color:<?php echo $__Context->layout_info->slide_text_color ?>}
.xe .owl-carousel .owl-item .main_slide_div img{width:auto;}
.xe .owl-carousel .owl-item img.main_slide_img{width:100%;}
.da-owl .owl-controls{bottom:0;height:0;width:100%;text-align:center;position:initial;}
.da-owl .owl-nav{display:inline-block;}
.owl-theme .owl-controls .owl-dots{display:inline-block;*display:inline;position:relative;top:-24px;}
.owl-theme .owl-controls .owl-dot{float:left;margin:0 2px;}
.owl-theme .owl-controls .owl-dots span{width:12px;height:12px;display:inline-block;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;background:#666666;-webkit-transition:all .2s;transition:all .2s;-moz-transition:all .2s;}
.owl-theme .owl-controls .owl-dots .active span {background:#00a7ea;width:24px;height:12px;}
.item .slide_more{background:<?php echo $__Context->layout_info->more_bg ?>;color:<?php echo $__Context->layout_info->more_color ?>}
</style>
<div class="da-owl owl-carousel">
	<?php if($__Context->layout_info->m_slide_img1){ ?><div class="item">
	  <img class="main_slide_img" src="<?php echo $__Context->layout_info->m_slide_img1 ?>" alt="<?php echo $__Context->layout_info->m_slide_title1 ?>" />
	  
	  <?php if($__Context->layout_info->m_slide_url1){ ?><a href="<?php echo $__Context->layout_info->m_slide_url1 ?>" class="slide_more">MORE</a><?php } ?>
	</div><?php } ?>
	<?php if($__Context->layout_info->m_slide_img2){ ?><div class="item">
	  <img class="main_slide_img" src="<?php echo $__Context->layout_info->m_slide_img2 ?>" alt="<?php echo $__Context->layout_info->m_slide_title2 ?>" />
	 
	  <?php if($__Context->layout_info->m_slide_url2){ ?><a href="<?php echo $__Context->layout_info->m_slide_url2 ?>" class="slide_more">MORE</a><?php } ?>
	</div><?php } ?>
	<?php if($__Context->layout_info->m_slide_img3){ ?><div class="item">
	  <img class="main_slide_img" src="<?php echo $__Context->layout_info->m_slide_img3 ?>" alt="<?php echo $__Context->layout_info->m_slide_title3 ?>" />
	  <?php if($__Context->layout_info->m_slide_url3){ ?><a href="<?php echo $__Context->layout_info->m_slide_url3 ?>" class="slide_more">MORE</a><?php } ?>
	</div><?php } ?>
	<?php if($__Context->layout_info->m_slide_img4){ ?><div class="item">
	  <img class="main_slide_img" src="<?php echo $__Context->layout_info->m_slide_img4 ?>" alt="<?php echo $__Context->layout_info->m_slide_title4 ?>" />
	 
	  <?php if($__Context->layout_info->m_slide_url4){ ?><a href="<?php echo $__Context->layout_info->m_slide_url4 ?>" class="slide_more">MORE</a><?php } ?>
	</div><?php } ?>
	<?php if($__Context->layout_info->m_slide_img5){ ?><div class="item">
	  <img class="main_slide_img" src="<?php echo $__Context->layout_info->m_slide_img5 ?>" alt="<?php echo $__Context->layout_info->m_slide_title5 ?>" />
	 
	  <?php if($__Context->layout_info->m_slide_url5){ ?><a href="<?php echo $__Context->layout_info->m_slide_url5 ?>" class="slide_more">MORE</a><?php } ?>
	</div><?php } ?>
</div>
	
		
		<script type="text/javascript">
			jQuery(function($){
			
			  $('.da-owl').owlCarousel({
				nav:true,
                items: 1,
                loop: true,
				autoplay:true,
				autoplayTimeout:<?php echo $__Context->layout_info->slide_speed ?>,
				autoplayHoverPause:true,
                margin:0
              });
		});
		</script>	
	