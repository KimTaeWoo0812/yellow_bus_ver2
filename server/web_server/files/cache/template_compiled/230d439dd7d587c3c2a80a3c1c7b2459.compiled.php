<?php if(!defined("__XE__"))exit;?>
<!--#Meta:layouts/DW_ClayoutA/js/xe_official.js--><?php $__tmp=array('layouts/DW_ClayoutA/js/xe_official.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/DW_ClayoutA/css/default.css--><?php $__tmp=array('layouts/DW_ClayoutA/css/default.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/DW_ClayoutA/css/webfont.css--><?php $__tmp=array('layouts/DW_ClayoutA/css/webfont.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->layout_info->use_banner_list){ ?>
<!--#Meta:/owl.carousel.css--><?php $__tmp=array('/owl.carousel.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:/owl.carousel.min.js--><?php $__tmp=array('/owl.carousel.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:/jquery.mousewheel.min.js--><?php $__tmp=array('/jquery.mousewheel.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php } ?>
<!--#Meta:common/xeicon/xeicon.min.css--><?php $__tmp=array('common/xeicon/xeicon.min.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<style>
<?php if($__Context->layout_info->menu_height){ ?>
.main_menu div{min-height:<?php echo $__Context->layout_info->menu_height ?>px}
<?php } ?>
<?php if($__Context->layout_info->footer_padding){ ?>
.foot_menu li{padding:9px <?php echo $__Context->layout_info->footer_padding ?>px 10px <?php echo $__Context->layout_info->footer_padding+1 ?>px}
<?php } ?>
<?php if($__Context->layout_info->bg_slide){ ?>
.wrap_slide{background:<?php echo $__Context->layout_info->bg_slide ?>}
<?php } ?>
<?php if($__Context->layout_info->bg_up_breadclumb){ ?>
.up_breadclumb{background:<?php echo $__Context->layout_info->bg_up_breadclumb ?>}
<?php } ?>
<?php if($__Context->layout_info->bg_basic){ ?>
li.first_li:hover div,
.line_no_breadclumb .span_breadclumb,
.up_breadclumb .span_breadclumb,
.sub_title{border-color:<?php echo $__Context->layout_info->bg_basic ?>}
.lnb_shadow {border-top-color:<?php echo $__Context->layout_info->bg_basic ?> !important}
.main_menu li div li a:hover,
.main_menu li div li a.active_a,
.active a.first_a,
.breadclumb .last_breadclumb a,
.locNav li.active a,
.locNav li a:hover,
.login_widget .info_label{color:<?php echo $__Context->layout_info->bg_basic ?> !important}
.lnb_normal .lnb_h2,
.login_widget .bar:before, .login_widget .bar:after,
.owl-theme .owl-controls .owl-dots .active span,
.da-owl .owl-nav .owl-prev:hover,
.da-owl .owl-nav .owl-next:hover{background-color:<?php echo $__Context->layout_info->bg_basic ?> !important}
<?php } ?>
<?php if($__Context->layout_info->border_basic){ ?>
.header{border-color:<?php echo $__Context->layout_info->border_basic ?>}
<?php } ?>
<?php if($__Context->layout_info->color_up_breadclumb){ ?>
.xe .up_breadclumb *,
.xe .up_breadclumb .breadclumb .last_breadclumb a{color:<?php echo $__Context->layout_info->color_up_breadclumb ?> !important;}
.xe .up_breadclumb .span_breadclumb{border-color:<?php echo $__Context->layout_info->color_up_breadclumb ?> !important;}
<?php } ?>
<?php if($__Context->layout_info->border_up_breadclumb){ ?>
.up_breadclumb{border-color:<?php echo $__Context->layout_info->border_up_breadclumb ?> !important;}
<?php } ?>
<?php if($__Context->layout_info->fix_top){ ?>
.abs_banner{top:<?php echo $__Context->layout_info->fix_top ?>px;}
<?php } ?>
<?php if($__Context->layout_info->fix_width){ ?>
.in_fix_right,
.in_fix_left{width:<?php echo $__Context->layout_info->fix_width ?>px;}
<?php } ?>
<?php if($__Context->layout_info->main_widget_bg1){ ?>
.section1{background:<?php echo $__Context->layout_info->main_widget_bg1 ?>;}
<?php } ?>
<?php if($__Context->layout_info->main_title_color1){ ?>
.section1 h1{color:<?php echo $__Context->layout_info->main_title_color1 ?>;}
.section1 h1:after{background:<?php echo $__Context->layout_info->main_title_color1 ?>;}
<?php } ?>
<?php if($__Context->layout_info->main_text_color1){ ?>
.section1 p{color:<?php echo $__Context->layout_info->main_text_color1 ?>;}
<?php } ?>
<?php if($__Context->layout_info->main_widget_bg2){ ?>
.section2{background:<?php echo $__Context->layout_info->main_widget_bg2 ?>;}
.section1 .left_span{border-bottom:60px solid <?php echo $__Context->layout_info->main_widget_bg2 ?>;}
.section1 .right_span{border-bottom:60px solid <?php echo $__Context->layout_info->main_widget_bg2 ?>;}
<?php } ?>
<?php if($__Context->layout_info->main_widget_bg3){ ?>
.section3,
.section3 .owl-carousel .owl-item{background:<?php echo $__Context->layout_info->main_widget_bg3 ?>;}
.section2 .left_span{border-bottom:60px solid <?php echo $__Context->layout_info->main_widget_bg3 ?>;}
.section2 .right_span{border-bottom:60px solid <?php echo $__Context->layout_info->main_widget_bg3 ?>;}
<?php } ?>
<?php if($__Context->layout_info->main_widget_bg4){ ?>
.section4{background:<?php echo $__Context->layout_info->main_widget_bg4 ?>;}
.section3 .left_span{border-bottom:60px solid <?php echo $__Context->layout_info->main_widget_bg4 ?>;}
.section3 .right_span{border-bottom:60px solid <?php echo $__Context->layout_info->main_widget_bg4 ?>;}
<?php } ?>
<?php if($__Context->layout_info->foot_menu_height){ ?>
.foot_div{height:<?php echo $__Context->layout_info->foot_menu_height ?>px;}
<?php } ?>
</style>
<p class="skip" id="skip"><a href="#content"><?php echo $__Context->lang->skip_to_content ?></a></p>
	<?php if($__Context->layout_info->header_style!=='B'){ ?><header class="header" id="header">
		<div class="in_header">
			<div class="top_header">
				<!-- 우상단 로그인 -->
				<div class="wrap_account xe_width">
					<div class="account clearBoth">
						<ul class="clearBoth">
							<?php if($__Context->layout_info->use_language=='Y'){ ?><li class="language first_top">
								<button type="button" class="toggle login_A"><?php echo $__Context->lang_supported[$__Context->lang_type] ?></button>
								<ul class="selectLang none_login">
									<?php if($__Context->lang_supported&&count($__Context->lang_supported))foreach($__Context->lang_supported as $__Context->key=>$__Context->val){;
if($__Context->key!= $__Context->lang_type){ ?><li><button type="button" onclick="doChangeLangType('<?php echo $__Context->key ?>');return false;"><?php echo $__Context->val ?></button></li><?php }} ?>
									<li class="close_selectLang"><a class="toggle" href="#">CLOSE</a></li>
								</ul>
							</li><?php } ?>
							<?php if($__Context->is_logged){ ?>
							<li<?php if($__Context->layout_info->use_language!=='Y'){ ?> class="first_top"<?php } ?>><a href="<?php echo getUrl('act','dispMemberLogout') ?>"><?php echo $__Context->lang->cmd_logout ?></a></li>
							<li><a href="<?php echo getUrl('act','dispMemberInfo') ?>"><?php echo $__Context->lang->cmd_view_member_info ?></a></li>
							<?php if($__Context->logged_info->is_admin=='Y' && !$__Context->site_module_info->site_srl){ ?><li><a href="<?php echo getUrl('','module','admin') ?>"><?php echo $__Context->lang->cmd_management ?></a></li><?php } ?>
							<?php } ?>
							<?php if(!$__Context->is_logged){ ?>
							<?php if(!$__Context->layout_info->use_sns){ ?><li<?php if($__Context->layout_info->use_language!=='Y'){ ?> class="first_top"<?php } ?>><a class="act_login" href="<?php echo getUrl('act','dispMemberLoginForm') ?>"><?php echo $__Context->lang->cmd_login ?></a></li><?php } ?>
							<?php if($__Context->layout_info->use_sns){ ?><li<?php if($__Context->layout_info->use_language!=='Y'){ ?> class="first_top"<?php } ?>><a class="sns_login" href="#">SNS <?php echo $__Context->lang->cmd_login ?></a></li><?php } ?>
							<li><a href="<?php echo getUrl('act','dispMemberSignUpForm') ?>"><?php echo $__Context->lang->cmd_signup ?></a></li>
							<li><a href="<?php echo getUrl('act','dispMemberFindAccount') ?>"><?php echo $__Context->lang->cmd_find_member_account ?></a></li>
							<?php } ?>
							
						</ul>
					</div>
				</div>
			</div>
				<!-- 우상단 로그인 끝 -->
			<div class="wrap_menu clearBoth xe_width">
				<h1 class="large_logo">
					<?php if($__Context->layout_info->logo_image){ ?><a<?php if($__Context->layout_info->logo_url){ ?> href="<?php echo $__Context->layout_info->logo_url ?>"<?php } ?> <?php if(!$__Context->layout_info->logo_url){ ?> href="<?php echo getSiteUrl() ?>"<?php } ?> title="<?php echo $__Context->layout_info->logo_image_alt ?>"><img class="logo" src="<?php echo $__Context->layout_info->logo_image ?>" alt="<?php echo $__Context->layout_info->logo_image_alt ?>" border="0" /></a><?php } ?>
					<?php if(!$__Context->layout_info->logo_image){ ?><a href="<?php echo getSiteUrl() ?>" class="text_logo" title="Door of Web"><img class="logo" src="/layouts/DW_ClayoutA/img/logo.png" border="0" alt="Door of Web"></a><?php } ?>
				</h1>
				<div class="gnb">
					<ul id="menu" class="main_menu clearBoth <?php echo $__Context->layout_info->menu_align ?>">
						<?php $__Context->idx=1 ?>
						<?php if($__Context->main_menu->list&&count($__Context->main_menu->list))foreach($__Context->main_menu->list as $__Context->key1=>$__Context->val1){;
if($__Context->val1['link']){ ?><li name="banner<?php echo $__Context->idx ?>"<?php if($__Context->val1['selected']){ ?> class="active highlight first_li dw_width<?php echo $__Context->layout_info->menu_width ?>"<?php } ?> <?php if(!$__Context->val1['selected']){ ?> class="first_li dw_width<?php echo $__Context->layout_info->menu_width ?>"<?php } ?>>
							<a class="first_a H_height Acolor" href="<?php echo $__Context->val1['href'] ?>"<?php if($__Context->val1['open_window']=='Y'){ ?> target="_blank"<?php } ?>><span class="first_span"><?php echo $__Context->val1['text'] ?></span></a>
							<div class="sub1 sub_div">
								<?php if($__Context->val1['list']){ ?><ul class="first_ul">
									<?php if($__Context->val1['list']&&count($__Context->val1['list']))foreach($__Context->val1['list'] as $__Context->key2=>$__Context->val2){;
if($__Context->val2['link']){ ?><li class="second_li">
										<a href="<?php echo $__Context->val2['href'] ?>"<?php if($__Context->val2['selected']){ ?> class="active_a"<?php };
if($__Context->val2['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val2['text'] ?></a>
									</li><?php }} ?>
								</ul><?php } ?>
							</div>
							<?php $__Context->idx++ ?>
						</li><?php }} ?>		
					</ul>
			
					<?php if($__Context->layout_info->li_banner1 && $__Context->layout_info->li_banner2){ ?><ul class="menu_banner">
						<li class="li_banner li_banner1"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner1 ?>" alt="<?php echo $__Context->layout_info->li_banner1_alt ?>" /></li>
						<?php if($__Context->layout_info->li_banner2){ ?><li class="li_banner li_banner2"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner2 ?>" alt="<?php echo $__Context->layout_info->li_banner2_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner3){ ?><li class="li_banner li_banner3"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner3 ?>" alt="<?php echo $__Context->layout_info->li_banner3_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner4){ ?><li class="li_banner li_banner4"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner4 ?>" alt="<?php echo $__Context->layout_info->li_banner4_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner5){ ?><li class="li_banner li_banner5"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner5 ?>" alt="<?php echo $__Context->layout_info->li_banner5_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner6){ ?><li class="li_banner li_banner6"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner6 ?>" alt="<?php echo $__Context->layout_info->li_banner6_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner7){ ?><li class="li_banner li_banner7"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner7 ?>" alt="<?php echo $__Context->layout_info->li_banner7_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner8){ ?><li class="li_banner li_banner8"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner8 ?>" alt="<?php echo $__Context->layout_info->li_banner8_alt ?>" /></li><?php } ?>
					</ul><?php } ?>
					<?php if($__Context->layout_info->li_banner1 && !$__Context->layout_info->li_banner2){ ?><ul class="menu_banner">
						<li><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner1 ?>" alt="<?php echo $__Context->layout_info->li_banner1_alt ?>" /></li>
					</ul><?php } ?>
						
				</div>
				<!-- 메인메뉴 끝 -->	
			</div>
		</div>
	</header><?php } ?>
<div class="xe xe_width <?php echo $__Context->layout_info->layout_style ?>">
<!-- 헤더 시작 -->
	<?php if($__Context->layout_info->header_style=='B'){ ?><header class="header small_header" id="header">
		<div class="in_header">
			<div class="top_header">
				<!-- 우상단 로그인 -->
				<div class="wrap_account xe_width">
					<div class="account clearBoth">
						<ul class="clearBoth">
							<?php if($__Context->is_logged){ ?>
							<li class="first_top"><a href="<?php echo getUrl('act','dispMemberLogout') ?>"><?php echo $__Context->lang->cmd_logout ?></a></li>
							<li><a href="<?php echo getUrl('act','dispMemberInfo','mid', $__Context->layout_info->fbmember_info) ?>"><?php echo $__Context->lang->cmd_view_member_info ?></a></li>
							<?php if($__Context->logged_info->is_admin=='Y' && !$__Context->site_module_info->site_srl){ ?><li><a href="<?php echo getUrl('','module','admin') ?>"><?php echo $__Context->lang->cmd_management ?></a></li><?php } ?>
							<?php } ?>
							<?php if(!$__Context->is_logged){ ?>
							<?php if(!$__Context->layout_info->use_sns){ ?><li class="first_top"><a class="act_login" href="<?php echo getUrl('act','dispMemberLoginForm','mid', $__Context->layout_info->fbmember_info) ?>"><?php echo $__Context->lang->cmd_login ?></a></li><?php } ?>
							<?php if($__Context->layout_info->use_sns){ ?><li class="first_top"><a class="sns_login" href="#">SNS <?php echo $__Context->lang->cmd_login ?></a></li><?php } ?>
							<li><a href="<?php echo getUrl('act','dispMemberSignUpForm','mid', $__Context->layout_info->fbmember_info) ?>"><?php echo $__Context->lang->cmd_signup ?></a></li>
							<li><a href="<?php echo getUrl('act','dispMemberFindAccount','mid', $__Context->layout_info->fbmember_info) ?>"><?php echo $__Context->lang->cmd_find_member_account ?></a></li>
							<?php } ?>	
						</ul>
					</div>
				</div>
			</div>
				<!-- 우상단 로그인 끝 -->
			<div class="wrap_menu clearBoth xe_width">
				<h1 class="large_logo">
					<?php if($__Context->layout_info->logo_image){ ?><a<?php if($__Context->layout_info->logo_url){ ?> href="<?php echo $__Context->layout_info->logo_url ?>"<?php } ?> <?php if(!$__Context->layout_info->logo_url){ ?> href="<?php echo getSiteUrl() ?>"<?php } ?> title="<?php echo $__Context->layout_info->logo_image_alt ?>"><img class="logo" src="<?php echo $__Context->layout_info->logo_image ?>" alt="<?php echo $__Context->layout_info->logo_image_alt ?>" border="0" /></a><?php } ?>
					<?php if(!$__Context->layout_info->logo_image){ ?><a href="<?php echo getSiteUrl() ?>" class="text_logo" title="Door of Web"><img class="logo" src="/layouts/DW_ClayoutA/img/logo.png" border="0" alt="Door of Web"></a><?php } ?>
				</h1>
				<div class="gnb">
					<ul id="menu" class="main_menu clearBoth">
						<?php $__Context->idx=1 ?>
						<?php if($__Context->main_menu->list&&count($__Context->main_menu->list))foreach($__Context->main_menu->list as $__Context->key1=>$__Context->val1){;
if($__Context->val1['link']){ ?><li name="banner<?php echo $__Context->idx ?>"<?php if($__Context->val1['selected']){ ?> class="active highlight first_li dw_width<?php echo $__Context->layout_info->menu_width ?>"<?php } ?> <?php if(!$__Context->val1['selected']){ ?> class="first_li dw_width<?php echo $__Context->layout_info->menu_width ?>"<?php } ?>>
							<a class="first_a H_height Acolor" href="<?php echo $__Context->val1['href'] ?>"<?php if($__Context->val1['open_window']=='Y'){ ?> target="_blank"<?php } ?>><span class="first_span"><?php echo $__Context->val1['text'] ?></span></a>
							<div class="sub1 sub_div">
								<?php if($__Context->val1['list']){ ?><ul class="first_ul">
									<?php if($__Context->val1['list']&&count($__Context->val1['list']))foreach($__Context->val1['list'] as $__Context->key2=>$__Context->val2){;
if($__Context->val2['link']){ ?><li class="second_li">
										<a href="<?php echo $__Context->val2['href'] ?>"<?php if($__Context->val2['selected']){ ?> class="active_a"<?php };
if($__Context->val2['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val2['text'] ?></a>
									</li><?php }} ?>
								</ul><?php } ?>
							</div>
							<?php $__Context->idx++ ?>
						</li><?php }} ?>		
					</ul>
			
					<?php if($__Context->layout_info->li_banner1 && $__Context->layout_info->li_banner2){ ?><ul class="menu_banner">
						<li class="li_banner li_banner1"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner1 ?>" alt="<?php echo $__Context->layout_info->li_banner1_alt ?>" /></li>
						<?php if($__Context->layout_info->li_banner2){ ?><li class="li_banner li_banner2"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner2 ?>" alt="<?php echo $__Context->layout_info->li_banner2_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner3){ ?><li class="li_banner li_banner3"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner3 ?>" alt="<?php echo $__Context->layout_info->li_banner3_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner4){ ?><li class="li_banner li_banner4"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner4 ?>" alt="<?php echo $__Context->layout_info->li_banner4_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner5){ ?><li class="li_banner li_banner5"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner5 ?>" alt="<?php echo $__Context->layout_info->li_banner5_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner6){ ?><li class="li_banner li_banner6"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner6 ?>" alt="<?php echo $__Context->layout_info->li_banner6_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner7){ ?><li class="li_banner li_banner7"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner7 ?>" alt="<?php echo $__Context->layout_info->li_banner7_alt ?>" /></li><?php } ?>
						<?php if($__Context->layout_info->li_banner8){ ?><li class="li_banner li_banner8"><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner8 ?>" alt="<?php echo $__Context->layout_info->li_banner8_alt ?>" /></li><?php } ?>
					</ul><?php } ?>
					<?php if($__Context->layout_info->li_banner1 && !$__Context->layout_info->li_banner2){ ?><ul class="menu_banner">
						<li><img class="top_banner" src="<?php echo $__Context->layout_info->li_banner1 ?>" alt="<?php echo $__Context->layout_info->li_banner1_alt ?>" /></li>
					</ul><?php } ?>
						
				</div>
				<!-- 메인메뉴 끝 -->	
			</div>
		</div>
	</header><?php } ?>
<!-- 헤더 끝 -->
	<?php if($__Context->layout_info->main_slide){ ?><div class="wrap_slide">
		<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/DW_ClayoutA/slide','da-owl-slider.html') ?>
	</div><?php } ?>
	<?php if($__Context->layout_info->breadclumb=='up'){ ?>	
	<!-- depth 1 -->
	<?php if($__Context->breadclumb_menu->list&&count($__Context->breadclumb_menu->list))foreach($__Context->breadclumb_menu->list as $__Context->key=>$__Context->val){;
if($__Context->val['selected']){;
$__Context->menu_depth1 = $__Context->val;
}} ?>
	<!-- depth 2 -->
	<?php if($__Context->menu_depth1['list']&&count($__Context->menu_depth1['list']))foreach($__Context->menu_depth1['list'] as $__Context->key=>$__Context->val){;
if($__Context->val['selected'] && $__Context->menu_depth1){;
$__Context->menu_depth2 = $__Context->val;
}} ?>
	<!-- depth 3 -->
	<?php if($__Context->menu_depth2['list']&&count($__Context->menu_depth2['list']))foreach($__Context->menu_depth2['list'] as $__Context->key=>$__Context->val){;
if($__Context->val['selected'] && $__Context->menu_depth2){;
$__Context->menu_depth3 = $__Context->val;
}} ?>
	<div class="wrap_breadclumb up_breadclumb">
		<div class="sub_title">
			<h1><?php if($__Context->menu_depth1&&!$__Context->menu_depth2){ ?><a href="<?php echo $__Context->menu_depth1['href'] ?>"><?php echo $__Context->menu_depth1['link'] ?></a><?php } ?>
				<?php if($__Context->menu_depth2){ ?><a href="<?php echo $__Context->menu_depth2['href'] ?>"><?php echo $__Context->menu_depth2['link'] ?></a><?php } ?>
				<span class="span_breadclumb"></span>
			</h1>
		</div>
		<ul class="breadclumb">													
			<li class="first_breadclumb png_bg">
				<a href="<?php echo getSiteUrl() ?>">홈</a>
			</li>
			<?php if($__Context->menu_depth1){ ?><li class="png_bg">
				<i class="xi-angle-right"></i>	<a class="Ccolor" href="<?php echo $__Context->menu_depth1['href'] ?>"><?php echo $__Context->menu_depth1['text'] ?></a>
			</li><?php } ?>
			<?php if($__Context->menu_depth2){ ?><li class="png_bg">
				<i class="xi-angle-right"></i> <a class="Ccolor" href="<?php echo $__Context->menu_depth2['href'] ?>"><?php echo $__Context->menu_depth2['text'] ?></a>
			</li><?php } ?>
		</ul>
	</div>			
	<?php } ?>
	
	<div id="content">
		<?php if($__Context->content){ ?><div class="body clearBoth">
			<?php if($__Context->layout_info->layout_style!=='c'&& $__Context->layout_info->layout_style!=='cc'){ ?><div class="lnb">
				<?php if($__Context->layout_info->lnb_style){ ?><div class="lnb_normal lnb_normal_<?php echo $__Context->layout_info->lnb_style ?>">
					<!-- 서브메뉴 타이틀 -->
					<div class="section wrap_locNav">
						<?php if($__Context->sub_menu->list&&count($__Context->sub_menu->list))foreach($__Context->sub_menu->list as $__Context->key1=>$__Context->val1){;
if($__Context->val1['selected']){ ?><h2 class="lnb_h2"><a href="<?php echo $__Context->val1['href'] ?>"<?php if($__Context->val1['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val1['link'] ?></a></h2><?php }} ?>
						<?php if($__Context->sub_menu->list&&count($__Context->sub_menu->list))foreach($__Context->sub_menu->list as $__Context->key1=>$__Context->val1){;
if($__Context->val1['selected'] && $__Context->val1['list']){ ?><div class="in_section" >
							<ul class="locNav">
									<?php $__Context->idx=1 ?>
								<?php if($__Context->val1['list']&&count($__Context->val1['list']))foreach($__Context->val1['list'] as $__Context->key2=>$__Context->val2){ ?><li<?php if($__Context->val2['selected']){ ?> class="active locLi_<?php echo $__Context->idx ?> locLi<?php echo ($__Context->idx+1)%2+1 ?>"<?php };
if(!$__Context->val2['selected']){ ?> class="locLi_<?php echo $__Context->idx ?> locLi<?php echo ($__Context->idx+1)%2+1 ?>"<?php } ?>><a href="<?php echo $__Context->val2['href'] ?>"<?php if($__Context->val2['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val2['text'];
if($__Context->val2['selected']){ ?><i class="xi-angle-right"></i><?php } ?></a>
									<?php $__Context->idx++ ?>
								</li><?php } ?>
							</ul>
						</div><?php }} ?>
					</div>
						
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/DW_ClayoutA/slide','sub_widget.html') ?>
						
					<!-- 서브메뉴 하위메뉴 끝 -->
					<?php if($__Context->layout_info->sub_banner_img1){ ?><ul class="sub_banner">
						<?php if($__Context->layout_info->sub_banner_img1){ ?><li>
							<a<?php if($__Context->layout_info->sub_blank){ ?> target="_blank"<?php } ?> href="<?php echo $__Context->layout_info->sub_banner_url1 ?>"><img src="<?php echo $__Context->layout_info->sub_banner_img1 ?>" alt="<?php echo $__Context->layout_info->sub_banner_alt1 ?>" /></a>
						</li><?php } ?>
								
						<?php if($__Context->layout_info->sub_banner_img2){ ?><li>
							<a<?php if($__Context->layout_info->sub_blank){ ?> target="_blank"<?php } ?> href="<?php echo $__Context->layout_info->sub_banner_url2 ?>"><img src="<?php echo $__Context->layout_info->sub_banner_img2 ?>" alt="<?php echo $__Context->layout_info->sub_banner_alt2 ?>" /></a>
						</li><?php } ?>
						<?php if($__Context->layout_info->sub_banner_img3){ ?><li>
							<a<?php if($__Context->layout_info->sub_blank){ ?> target="_blank"<?php } ?> href="<?php echo $__Context->layout_info->sub_banner_url3 ?>"><img src="<?php echo $__Context->layout_info->sub_banner_img3 ?>" alt="<?php echo $__Context->layout_info->sub_banner_alt3 ?>" /></a>
						</li><?php } ?>
						<?php if($__Context->layout_info->sub_banner_img4){ ?><li>
							<a<?php if($__Context->layout_info->sub_blank){ ?> target="_blank"<?php } ?> href="<?php echo $__Context->layout_info->sub_banner_url4 ?>"><img src="<?php echo $__Context->layout_info->sub_banner_img4 ?>" alt="<?php echo $__Context->layout_info->sub_banner_alt4 ?>" /></a>
						</li><?php } ?>
						<?php if($__Context->layout_info->sub_banner_img5){ ?><li>
							<a<?php if($__Context->layout_info->sub_blank){ ?> target="_blank"<?php } ?> href="<?php echo $__Context->layout_info->sub_banner_url5 ?>"><img src="<?php echo $__Context->layout_info->sub_banner_img5 ?>" alt="<?php echo $__Context->layout_info->sub_banner_alt5 ?>" /></a>
						</li><?php } ?>
					</ul><?php } ?>
				</div><?php } ?>
			</div><?php } ?>
			<div class="content">
				<div class="in_content">
					<?php if($__Context->layout_info->breadclumb=='yes'||$__Context->layout_info->breadclumb=='no'){ ?>
					<!-- depth 1 -->
					<?php if($__Context->breadclumb_menu->list&&count($__Context->breadclumb_menu->list))foreach($__Context->breadclumb_menu->list as $__Context->key=>$__Context->val){;
if($__Context->val['selected']){;
$__Context->menu_depth1 = $__Context->val;
}} ?>
					<!-- depth 2 -->
					<?php if($__Context->menu_depth1['list']&&count($__Context->menu_depth1['list']))foreach($__Context->menu_depth1['list'] as $__Context->key=>$__Context->val){;
if($__Context->val['selected'] && $__Context->menu_depth1){;
$__Context->menu_depth2 = $__Context->val;
}} ?>
					<!-- depth 3 -->
					<?php if($__Context->menu_depth2['list']&&count($__Context->menu_depth2['list']))foreach($__Context->menu_depth2['list'] as $__Context->key=>$__Context->val){;
if($__Context->val['selected'] && $__Context->menu_depth2){;
$__Context->menu_depth3 = $__Context->val;
}} ?>
					<div class="wrap_breadclumb <?php echo $__Context->layout_info->lnb_style ?>_breadclumb line_<?php echo $__Context->layout_info->breadclumb ?>_breadclumb">
						<div class="sub_title">
							<h2>
								<?php if($__Context->menu_depth1&&!$__Context->menu_depth2){ ?><a href="<?php echo $__Context->menu_depth1['href'] ?>"><?php echo $__Context->menu_depth1['link'] ?></a><?php } ?>
								<?php if($__Context->menu_depth2){ ?><a href="<?php echo $__Context->menu_depth2['href'] ?>"><?php echo $__Context->menu_depth2['link'] ?></a><?php } ?>
								<span class="span_breadclumb"></span>
							</h2>
						</div>
						<ul class="breadclumb">												
							<li class="first_breadclumb png_bg">
								<a href="<?php echo getSiteUrl() ?>">홈</a>
							</li>
							<?php if($__Context->menu_depth1){ ?><li class="png_bg">
								<a class="Ccolor" href="<?php echo $__Context->menu_depth1['href'] ?>"><?php echo $__Context->menu_depth1['text'] ?></a>
							</li><?php } ?>
							<?php if($__Context->menu_depth2){ ?><li class="png_bg">
								<a class="Ccolor" href="<?php echo $__Context->menu_depth2['href'] ?>"><?php echo $__Context->menu_depth2['text'] ?></a>
							</li><?php } ?>
						</ul>		
					</div>	
					<?php } ?>
					<div class="in_section">
						<?php echo $__Context->content ?>
					</div>
				</div>
			</div>
		</div><?php } ?>
	</div>
	<?php if($__Context->layout_info->use_widget){ ?>
		<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/DW_ClayoutA/slide','use_widgetA.html') ?>
	<?php } ?>
	<footer class="footer xe_width" id="footer">
		<?php if($__Context->layout_info->foot_style=='A'){ ?><div class="wrap_footer xe_width">
			<div class="foot_menu">
				<ul class="clearBoth">
					<?php $__Context->idx=1 ?>
					<?php if($__Context->foot_menu->list&&count($__Context->foot_menu->list))foreach($__Context->foot_menu->list as $__Context->key1=>$__Context->val1){;
if($__Context->val1['link']){ ?><li class="foot_li<?php echo $__Context->idx ?>">
						<a href="<?php echo $__Context->val1['href'] ?>"<?php if($__Context->val1['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val1['text'] ?></a>
					<?php $__Context->idx++ ?>
					</li><?php }} ?>
				</ul>
			</div>
			<div class="in_footer">
				<div class="clearBoth wrap_copylight">
					<div class="footLeft">
						<h2 class="foot_logo">
							<?php if($__Context->layout_info->foot_logo_image){ ?><a<?php if($__Context->layout_info->logo_url){ ?> href="<?php echo $__Context->layout_info->logo_url ?>"<?php } ?> <?php if(!$__Context->layout_info->logo_url){ ?> href="<?php echo getSiteUrl() ?>"<?php } ?> title="<?php echo $__Context->layout_info->logo_image_alt ?>"><img class="logo" src="<?php echo $__Context->layout_info->foot_logo_image ?>" alt="<?php echo $__Context->layout_info->logo_image_alt ?>" border="0" /></a><?php } ?>
							<?php if(!$__Context->layout_info->foot_logo_image){ ?><a href="<?php echo getSiteUrl() ?>" class="text_logo" title="Door of Web"><img class="logo" src="/layouts/DW_ClayoutA/img/foot_logo.png" border="0" alt="Door of Web"></a><?php } ?>
						</h2>
						<?php if($__Context->layout_info->footer_text){ ?><p>
							<?php echo $__Context->layout_info->footer_text ?>
						</p><?php } ?>
					</div>
					<div class="footRight">
						<p class="copylight">
							<?php if(!$__Context->layout_info->FOOTER){ ?>
							<span>주소 : </span>대한민국 서울특별시 영등포구 의사당대로 1<br /> 
							<span>Tel : </span>+82 2-788-2114   <br />
							<span>Fax : </span>000.000.0001 
							<?php } ?>
							<?php if($__Context->layout_info->FOOTER){ ?>
							<?php echo $__Context->layout_info->FOOTER ?>
							<?php } ?>
						</p>
					</div>
				</div>
				<div class="foot_absolute">
					<?php if($__Context->layout_info->use_footer_SNS){ ?><ul class="foot_sns">
						<?php if($__Context->layout_info->facebook){ ?><li><a href="<?php echo $__Context->layout_info->facebook ?>" target="_blank"  title="Facebook 바로가기"><img src="/layouts/DW_ClayoutA/img/facebook.png" alt="facebook" /></a></li><?php } ?>
						<?php if($__Context->layout_info->twitter){ ?><li><a href="<?php echo $__Context->layout_info->twitter ?>" target="_blank" title="Twitter 바로가기"><img src="/layouts/DW_ClayoutA/img/twitter.png" alt="twitter" /></a></li><?php } ?>
						<?php if($__Context->layout_info->instagram){ ?><li><a href="<?php echo $__Context->layout_info->instagram ?>" target="_blank" title="Instagram 바로가기"><img src="/layouts/DW_ClayoutA/img/instagram.png" alt="Instagram" /></a></li><?php } ?>
						<?php if($__Context->layout_info->google){ ?><li><a href="<?php echo $__Context->layout_info->google ?>" target="_blank" title="Google 바로가기"><img src="/layouts/DW_ClayoutA/img/google.png" alt="google" /></a></li><?php } ?>
						<?php if($__Context->layout_info->pinterest){ ?><li><a href="<?php echo $__Context->layout_info->pinterest ?>" target="_blank" title="Pinterest 바로가기"><img src="/layouts/DW_ClayoutA/img/pinterest.png" alt="pinterest" /></a></li><?php } ?>
						<?php if($__Context->layout_info->kakaostory){ ?><li><a href="<?php echo $__Context->layout_info->kakaostory ?>" target="_blank" title="Kakaostory 바로가기"><img src="/layouts/DW_ClayoutA/img/kakaostory.png" alt="kakaostory" /></a></li><?php } ?>
						<?php if($__Context->layout_info->band){ ?><li><a href="<?php echo $__Context->layout_info->band ?>" target="_blank" title="Band 바로가기"><img src="/layouts/DW_ClayoutA/img/band.png" alt="band" /></a></li><?php } ?>
						<?php if($__Context->layout_info->sns_image1){ ?><li><a target="_blank" href="<?php echo $__Context->layout_info->sns_image_url1 ?>"  title="<?php echo $__Context->layout_info->sns_image_alt1 ?> 바로가기"><img src="<?php echo $__Context->layout_info->sns_image1 ?>" alt="<?php echo $__Context->layout_info->sns_image_alt1 ?>" title="<?php echo $__Context->layout_info->sns_image_alt1 ?>" /></a></li><?php } ?>
						<?php if($__Context->layout_info->sns_image2){ ?><li><a target="_blank" href="<?php echo $__Context->layout_info->sns_image_url2 ?>"  title="<?php echo $__Context->layout_info->sns_image_alt2 ?> 바로가기"><img src="<?php echo $__Context->layout_info->sns_image2 ?>" alt="<?php echo $__Context->layout_info->sns_image_alt2 ?>" title="<?php echo $__Context->layout_info->sns_image_alt2 ?>" /></a></li><?php } ?>
						<?php if($__Context->layout_info->sns_image3){ ?><li><a target="_blank" href="<?php echo $__Context->layout_info->sns_image_url3 ?>"  title="<?php echo $__Context->layout_info->sns_image_alt3 ?> 바로가기"><img src="<?php echo $__Context->layout_info->sns_image3 ?>" alt="<?php echo $__Context->layout_info->sns_image_alt3 ?>"  title="<?php echo $__Context->layout_info->sns_image_alt3 ?>"/></a></li><?php } ?>
						<?php if($__Context->layout_info->sns_image4){ ?><li><a target="_blank" href="<?php echo $__Context->layout_info->sns_image_url4 ?>"  title="<?php echo $__Context->layout_info->sns_image_alt4 ?> 바로가기"><img src="<?php echo $__Context->layout_info->sns_image4 ?>" alt="<?php echo $__Context->layout_info->sns_image_alt4 ?>" title="<?php echo $__Context->layout_info->sns_image_alt4 ?>" /></a></li><?php } ?>
					</ul><?php } ?>
					<a href="http://doorweb.net/xe" target="_blank" class="ds_dw">Skin by <span class="skin_by">DoorWeb</span></a>
				</div>
			</div>
			
		</div><?php } ?>
		<?php if($__Context->layout_info->foot_style!=='A'){ ?><div class="wrap_footerB xe_width">
			
			<div class="in_footer">
				<div class="clearBoth wrap_copylight">
					<div class="footLeft">
						<h2 class="foot_logo">
							<?php if($__Context->layout_info->foot_logo_image){ ?><a<?php if($__Context->layout_info->logo_url){ ?> href="<?php echo $__Context->layout_info->logo_url ?>"<?php } ?> <?php if(!$__Context->layout_info->logo_url){ ?> href="<?php echo getSiteUrl() ?>"<?php } ?> title="<?php echo $__Context->layout_info->logo_image_alt ?>"><img class="logo" src="<?php echo $__Context->layout_info->foot_logo_image ?>" alt="<?php echo $__Context->layout_info->logo_image_alt ?>" border="0" /></a><?php } ?>
							<?php if(!$__Context->layout_info->foot_logo_image){ ?><a href="<?php echo getSiteUrl() ?>" class="text_logo" title="Door of Web"><img class="logo" src="/layouts/DW_ClayoutA/img/foot_logo.png" border="0" alt="Door of Web"></a><?php } ?>
						</h2>
						<?php if($__Context->layout_info->footer_text){ ?><p>
							<?php echo $__Context->layout_info->footer_text ?>
						</p><?php } ?>
					</div>
					<div class="footRight">
						<ul class="foot_wide_menu clearBoth">
							<?php $__Context->idx=1 ?>
							<?php if($__Context->foot_wide_menu->list&&count($__Context->foot_wide_menu->list))foreach($__Context->foot_wide_menu->list as $__Context->key1=>$__Context->val1){;
if($__Context->val1['link']){ ?><li class="foot_li dw_width<?php echo $__Context->layout_info->foot_menu_width ?>">
								<div class="foot_div">
									<a class="foot_a" href="<?php echo $__Context->val1['href'] ?>"<?php if($__Context->val1['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val1['text'] ?></a>
									<?php if($__Context->val1['list']){ ?><ul class="foot_ul">
										<?php if($__Context->val1['list']&&count($__Context->val1['list']))foreach($__Context->val1['list'] as $__Context->key2=>$__Context->val2){;
if($__Context->val2['link']){ ?><li>
											<a href="<?php echo $__Context->val2['href'] ?>"<?php if($__Context->val2['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val2['text'] ?></a>
										</li><?php }} ?>
									</ul><?php } ?>
								</div>
								<?php $__Context->idx++ ?>
							</li><?php }} ?>		
						</ul>
					</div>
				</div>
			</div>
			<div class="bottom_footer">
				<div class="foot_absolute">
					<?php if($__Context->layout_info->use_footer_SNS){ ?><ul class="foot_sns">
						<?php if($__Context->layout_info->facebook){ ?><li><a href="<?php echo $__Context->layout_info->facebook ?>" target="_blank"  title="Facebook 바로가기"><img src="/layouts/DW_ClayoutA/img/facebook.png" alt="facebook" /></a></li><?php } ?>
						<?php if($__Context->layout_info->twitter){ ?><li><a href="<?php echo $__Context->layout_info->twitter ?>" target="_blank" title="Twitter 바로가기"><img src="/layouts/DW_ClayoutA/img/twitter.png" alt="twitter" /></a></li><?php } ?>
						<?php if($__Context->layout_info->instagram){ ?><li><a href="<?php echo $__Context->layout_info->instagram ?>" target="_blank" title="Instagram 바로가기"><img src="/layouts/DW_ClayoutA/img/instagram.png" alt="Instagram" /></a></li><?php } ?>
						<?php if($__Context->layout_info->google){ ?><li><a href="<?php echo $__Context->layout_info->google ?>" target="_blank" title="Google 바로가기"><img src="/layouts/DW_ClayoutA/img/google.png" alt="google" /></a></li><?php } ?>
						<?php if($__Context->layout_info->pinterest){ ?><li><a href="<?php echo $__Context->layout_info->pinterest ?>" target="_blank" title="Pinterest 바로가기"><img src="/layouts/DW_ClayoutA/img/pinterest.png" alt="pinterest" /></a></li><?php } ?>
						<?php if($__Context->layout_info->kakaostory){ ?><li><a href="<?php echo $__Context->layout_info->kakaostory ?>" target="_blank" title="Kakaostory 바로가기"><img src="/layouts/DW_ClayoutA/img/kakaostory.png" alt="kakaostory" /></a></li><?php } ?>
						<?php if($__Context->layout_info->band){ ?><li><a href="<?php echo $__Context->layout_info->band ?>" target="_blank" title="Band 바로가기"><img src="/layouts/DW_ClayoutA/img/band.png" alt="band" /></a></li><?php } ?>
						<?php if($__Context->layout_info->sns_image1){ ?><li><a target="_blank" href="<?php echo $__Context->layout_info->sns_image_url1 ?>"  title="<?php echo $__Context->layout_info->sns_image_alt1 ?> 바로가기"><img src="<?php echo $__Context->layout_info->sns_image1 ?>" alt="<?php echo $__Context->layout_info->sns_image_alt1 ?>" title="<?php echo $__Context->layout_info->sns_image_alt1 ?>" /></a></li><?php } ?>
						<?php if($__Context->layout_info->sns_image2){ ?><li><a target="_blank" href="<?php echo $__Context->layout_info->sns_image_url2 ?>"  title="<?php echo $__Context->layout_info->sns_image_alt2 ?> 바로가기"><img src="<?php echo $__Context->layout_info->sns_image2 ?>" alt="<?php echo $__Context->layout_info->sns_image_alt2 ?>" title="<?php echo $__Context->layout_info->sns_image_alt2 ?>" /></a></li><?php } ?>
						<?php if($__Context->layout_info->sns_image3){ ?><li><a target="_blank" href="<?php echo $__Context->layout_info->sns_image_url3 ?>"  title="<?php echo $__Context->layout_info->sns_image_alt3 ?> 바로가기"><img src="<?php echo $__Context->layout_info->sns_image3 ?>" alt="<?php echo $__Context->layout_info->sns_image_alt3 ?>"  title="<?php echo $__Context->layout_info->sns_image_alt3 ?>"/></a></li><?php } ?>
						<?php if($__Context->layout_info->sns_image4){ ?><li><a target="_blank" href="<?php echo $__Context->layout_info->sns_image_url4 ?>"  title="<?php echo $__Context->layout_info->sns_image_alt4 ?> 바로가기"><img src="<?php echo $__Context->layout_info->sns_image4 ?>" alt="<?php echo $__Context->layout_info->sns_image_alt4 ?>" title="<?php echo $__Context->layout_info->sns_image_alt4 ?>" /></a></li><?php } ?>
					</ul><?php } ?>
					<a href="http://doorweb.net/xe" target="_blank" class="ds_dw">Design by <span class="skin_by">DoorWeb</span></a>
				</div>
				<p class="copylight">
							<?php if(!$__Context->layout_info->FOOTER){ ?>
							<span>주소 : </span>대한민국 서울특별시 영등포구 의사당대로 1<br /> 
							<span>Tel : </span>+82 2-788-2114   <br />
							<span>Fax : </span>000.000.0001 
							<?php } ?>
							<?php if($__Context->layout_info->FOOTER){ ?>
							<?php echo $__Context->layout_info->FOOTER ?>
							<?php } ?>
				</p>
			</div>
			<div class="foot_menu">
				<ul class="clearBoth">
					<?php $__Context->idx=1 ?>
					<?php if($__Context->foot_menu->list&&count($__Context->foot_menu->list))foreach($__Context->foot_menu->list as $__Context->key1=>$__Context->val1){;
if($__Context->val1['link']){ ?><li class="foot_li<?php echo $__Context->idx ?>">
						<a href="<?php echo $__Context->val1['href'] ?>"<?php if($__Context->val1['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val1['text'] ?></a>
					<?php $__Context->idx++ ?>
					</li><?php }} ?>
				</ul>
			</div>
		</div><?php } ?>
	</footer>
	
</div>
<?php if(!$__Context->is_logged){ ?>
<?php if($__Context->layout_info->use_sns){ ?><section class="login_widget">
	<!--#Meta:layouts/DW_ClayoutA/css/widget.login.css--><?php $__tmp=array('layouts/DW_ClayoutA/css/widget.login.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
	<div class="ly_dimmed"></div>
	<div class="signin">
		<div class="login-header">
			<h1>LOGIN</h1>
		</div>
		<div class="login-body">
			<form action="<?php echo getUrl() ?>" method="post" autocomplete="off"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
				<input type="hidden" name="act" value="procMemberLogin" />
				<input type="hidden" name="success_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', FALSE) ?>" />
				<input type="hidden" name="xe_validator_id" value="layouts/Clayout_A/layout/1" />
				<fieldset>
					<legend class="blind"><?php echo $__Context->lang->cmd_login ?></legend>
					<div class="control-group">
						<div class="group">
							<input type="text" name="user_id" id="uemail" required="true" />
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="info_label" for="uemail"><?php echo $__Context->lang->user_id ?></label>
						</div>
						<div class="group">
							<input type="password" name="password" id="upw" required="true" />
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="info_label" for="upw"><?php echo $__Context->lang->password ?></label>
						</div>
						<label class="chk_label" for="keepid_opt">
							<input type="checkbox" name="keep_signed" id="keepid_opt" value="Y" />
							<span class="checkbox"></span> <?php echo $__Context->lang->keep_signed ?>
						</label>
						<div class="wrap_warning">
							<div id="warning">
								<p style="text-align:right;"><i class="xi-close"></i></p>
								<p><?php echo str_replace('\n\n', '<br />', $__Context->lang->about_keep_signed) ?></p>
								<div class="edge"></div>
							</div>
						</div>
					</div>
					<?php if($__Context->XE_VALIDATOR_ID == 'layouts/Clayout_A/layout/1' && $__Context->XE_VALIDATOR_MESSAGE){ ?><div class="control-group">
						<p class="error"><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
					</div><?php } ?>
					<div class="control-submit">
						
						<button type="submit" class="btn_submit"><?php echo $__Context->lang->cmd_login ?></button>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="login-footer">
			<?php  $__Context->oSocialxeModel = getModel('socialxe'); ?>
			<ul class="wrap_sns">
				<li><?php if($__Context->layout_info->naver_login){ ?><a class="naver_login" href="<?php echo $__Context->oSocialxeModel->snsAuthUrl('naver', 'login') ?>"><img src="/layouts/DW_ClayoutA/img/btn_naver.png" alt="Naver Login">Naver Login</a><?php } ?></li>
				<li><?php if($__Context->layout_info->kakao_login){ ?><a class="kakao_login" href="<?php echo $__Context->oSocialxeModel->snsAuthUrl('kakao', 'login') ?>"><img src="/layouts/DW_ClayoutA/img/btn_kakao.png" alt="kakao Login">Kakao Login</a><?php } ?></li>
				<li><?php if($__Context->layout_info->twitter_login){ ?><a class="twitter_login" href="<?php echo $__Context->oSocialxeModel->snsAuthUrl('twitter', 'login') ?>"><img src="/layouts/DW_ClayoutA/img/btn_twitter.png" alt="twitter Login">Twitter Login</a><?php } ?></li>
				<li><?php if($__Context->layout_info->facebook_login){ ?><a class="facebook_login" href="<?php echo $__Context->oSocialxeModel->snsAuthUrl('facebook', 'login') ?>"><img src="/layouts/DW_ClayoutA/img/btn_facebook.png" alt="facebook Login">Facebook Login</a><?php } ?></li>
				<li><?php if($__Context->layout_info->google_login){ ?><a class="google_login" href="<?php echo $__Context->oSocialxeModel->snsAuthUrl('google', 'login') ?>"><img src="/layouts/DW_ClayoutA/img/btn_google.png" alt="google Login">Google Login</a><?php } ?></li>
			</ul>
		</div>
		<a href="#" class="btn_ly_popup"><span class="blind">닫기</span></a>
	</div>
</section><?php } ?>
<?php } ?>
<nav class="nav">
    <ul>
		<li class="nav_top"><a href="#skip"><span>TO TOP</span></a></li>
        <?php if($__Context->layout_info->main_widget1){ ?><li><a class="nav_normal" href="#section1"><span><?php echo $__Context->layout_info->title_quick1 ?></span></a></li><?php } ?>
        <?php if($__Context->layout_info->main_widget2){ ?><li><a class="nav_normal" href="#section2"><span><?php echo $__Context->layout_info->title_quick2 ?></span></a></li><?php } ?>
        <?php if($__Context->layout_info->main_widget3){ ?><li><a class="nav_normal" href="#section3"><span><?php echo $__Context->layout_info->title_quick3 ?></span></a></li><?php } ?>
        <?php if($__Context->layout_info->wrap_main_widget4){ ?><li><a class="nav_normal" href="#section4"><span><?php echo $__Context->layout_info->title_quick4 ?></span></a></li><?php } ?>
        <?php if($__Context->layout_info->use_map){ ?><li><a class="nav_normal" href="#section5"><span><?php echo $__Context->layout_info->title_quick5 ?></span></a></li><?php } ?>
		<li class="nav_bottom"><a href="#footer"><span>TO BOTTOM</span></a></li>
    </ul>
</nav>