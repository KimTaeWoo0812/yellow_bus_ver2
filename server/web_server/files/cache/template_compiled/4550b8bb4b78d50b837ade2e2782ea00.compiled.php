<?php if(!defined("__XE__"))exit;
Context::addHtmlHeader('<meta name="viewport" content="width=device-width, user-scalable=yes">')
 ?>
  <?php if(file_exists('./common/js/jquery.min.js')){ ?>
   <?php  Context::addJsFile("./common/js/jquery.min.js", true, '', -10000011)  ?>
   <?php }elseif(file_exists('./common/js/jquery.js')){ ?>
   <?php  Context::addJsFile("./common/js/jquery.js", true, '', -10000011)  ?>
   <?php } ?>
<!--#Meta:common/xeicon/xeicon.min.css--><?php $__tmp=array('common/xeicon/xeicon.min.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/DW_ClayoutA/css/m.default.css--><?php $__tmp=array('layouts/DW_ClayoutA/css/m.default.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/DW_ClayoutA/js/m.xe_official.js--><?php $__tmp=array('layouts/DW_ClayoutA/js/m.xe_official.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/DW_ClayoutA/js/jquery.scrollUp.min.js--><?php $__tmp=array('layouts/DW_ClayoutA/js/jquery.scrollUp.min.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<style>
<?php if($__Context->layout_info->border_basic){ ?>
.header{border-color:<?php echo $__Context->layout_info->border_basic ?>}
<?php } ?>
<?php if($__Context->layout_info->bg_basic){ ?>
.breadclumb .last_breadclumb a{color:<?php echo $__Context->layout_info->bg_basic ?> !important}
#scrollUp:hover{background-color:<?php echo $__Context->layout_info->bg_basic ?> !important}
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
<?php if($__Context->layout_info->bg_up_breadclumb){ ?>
.breadclumb_up{background:<?php echo $__Context->layout_info->bg_up_breadclumb ?>}
<?php } ?>
<?php if($__Context->layout_info->color_up_breadclumb){ ?>
.xe .breadclumb_up *,
.xe .breadclumb_up .last_breadclumb a{color:<?php echo $__Context->layout_info->color_up_breadclumb ?> !important;}
<?php } ?>
<?php if($__Context->layout_info->border_up_breadclumb){ ?>
.breadclumb_up{border-color:<?php echo $__Context->layout_info->border_up_breadclumb ?> !important;}
<?php } ?>
</style>
<div class="xe">
	<!-- 헤더 시작 -->
	<div class="wrap_header">
		<div class="xe_width">
			<div class="header">
				<div class="middle_menu">
					<div class="wrap_menu clearBoth">
						<h1 class="large_logo">
							<?php if($__Context->layout_info->logo_image || $__Context->layout_info->m_logo_image){ ?><a<?php if($__Context->layout_info->logo_url){ ?> href="<?php echo $__Context->layout_info->logo_url ?>"<?php } ?> <?php if(!$__Context->layout_info->logo_url){ ?> href="<?php echo getSiteUrl() ?>"<?php } ?> title="<?php echo $__Context->layout_info->logo_image_alt ?>">
								<?php if(!$__Context->layout_info->m_logo_image){ ?><img class="logo" src="<?php echo $__Context->layout_info->logo_image ?>" alt="<?php echo $__Context->layout_info->logo_image_alt ?>" border="0" /><?php } ?>
								<?php if($__Context->layout_info->m_logo_image){ ?><img class="logo" src="<?php echo $__Context->layout_info->m_logo_image ?>" alt="<?php echo $__Context->layout_info->logo_image_alt ?>" border="0" /><?php } ?>
							</a><?php } ?>
							<?php if(!$__Context->layout_info->logo_image && !$__Context->layout_info->m_logo_image){ ?><a href="<?php echo getSiteUrl() ?>" class="text_logo" title="Door of Web"><img class="logo" src="/layouts/DW_ClayoutA/img/m.logo.png" border="0" alt="Door of Web"></a><?php } ?>
						</h1>
						<a href="#" class="first_a mobile_menu_act"><img src="/layouts/DW_ClayoutA/img/menu.png" alt="menu" /></a>
						<a href="#" class="first_a search_menu"><img src="/layouts/DW_ClayoutA/img/login.png" alt="login" /></a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!-- 헤더 끝 -->
	<div class="xe_width body">
		<?php if($__Context->layout_info->main_slide){ ?><div class="wrap_slide">
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/DW_ClayoutA/slide','da-slider.html') ?>
		</div><?php } ?>
		<?php if($__Context->layout_info->breadclumb){ ?><div class="mobile_breadclumb breadclumb_<?php echo $__Context->layout_info->breadclumb ?>">
			<div>
				<!-- depth 1 -->
				<?php if($__Context->main_menu->list&&count($__Context->main_menu->list))foreach($__Context->main_menu->list as $__Context->key=>$__Context->val){;
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
				<?php if($__Context->layout_info->breadclumb){ ?><div class="wrap_breadclumb clearBoth" >
					<?php if($__Context->layout_info->breadclumb=='up'){ ?><div class="sub_title">
						<h2>
							<?php if($__Context->menu_depth1&&!$__Context->menu_depth2){ ?><a href="<?php echo $__Context->menu_depth1['href'] ?>"><?php echo $__Context->menu_depth1['link'] ?></a><?php } ?>
							<?php if($__Context->menu_depth2){ ?><a href="<?php echo $__Context->menu_depth2['href'] ?>"><?php echo $__Context->menu_depth2['link'] ?></a><?php } ?>
						</h2>
					</div><?php } ?>
					<?php if($__Context->layout_info->breadclumb!=='up'){ ?><ul class="breadclumb">													
						<li class="first_breadclumb png_bg">
							<a href="<?php echo getSiteUrl() ?>">
													홈
							</a>
						</li>
						<?php if($__Context->menu_depth1){ ?><li class="png_bg">
							<a class="Ccolor" href="<?php echo $__Context->menu_depth1['href'] ?>"><?php echo $__Context->menu_depth1['text'] ?></a>
						</li><?php } ?>
						<?php if($__Context->menu_depth2){ ?><li class="png_bg">
							<a class="Ccolor" href="<?php echo $__Context->menu_depth2['href'] ?>"><?php echo $__Context->menu_depth2['text'] ?></a>
						</li><?php } ?>
					</ul><?php } ?>
					<?php if($__Context->layout_info->breadclumb=='up'){ ?><ul class="breadclumb">													
						<li class="first_breadclumb png_bg">
							<a href="<?php echo getSiteUrl() ?>">홈</a>
						</li>
						<?php if($__Context->menu_depth1){ ?><li class="png_bg">
							<i class="xi-angle-right"></i>	<a class="Ccolor" href="<?php echo $__Context->menu_depth1['href'] ?>"><?php echo $__Context->menu_depth1['text'] ?></a>
						</li><?php } ?>
						<?php if($__Context->menu_depth2){ ?><li class="png_bg">
							<i class="xi-angle-right"></i> <a class="Ccolor" href="<?php echo $__Context->menu_depth2['href'] ?>"><?php echo $__Context->menu_depth2['text'] ?></a>
						</li><?php } ?>
					</ul><?php } ?>
									
				</div><?php } ?>	
			</div>	
		</div><?php } ?>
		<?php if($__Context->content){ ?><div class="body_widget">
			<div class="content xe_content" >
				<div class="section wrap_section">
					<div>
						<?php echo $__Context->content ?>
					</div>
				</div>
			</div>
		</div><?php } ?>
		
		<?php if($__Context->layout_info->use_widget){ ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/DW_ClayoutA/slide','use_widgetB.html') ?>
		<?php } ?>
		<div class="footer">
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
			<div class="foot_absolute clearBoth">
				<?php if($__Context->layout_info->use_footer_SNS){ ?><ul class="foot_sns clearBoth">
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
		</div>
	</div>
</div>
		<div class="fix_mobile">
		</div>
			<div class="mm_mobile_menu none_mobile_menu">
				<div class="top-mm-menu">MENU<a href="#" class="mobile_menu_act in_mobile_act">CLOSE</a></div>
				<nav id="mm-menu">
					<ul class="mm-list">
						<?php if($__Context->layout_info->use_language=='Y'){ ?><li class="mm-list-li">
							<a class="mm_a mm_lang" href="#">Select language</a><button<?php if($__Context->val1['selected']){ ?> class="Nav_i hover"<?php } ?> <?php if(!$__Context->val1['selected']){ ?> class="Nav_i"<?php } ?>><i class="xi-plus-square"></i><i class="xi-minus-square"> </i></button>
							<ul class="selectLang none_login">
								<?php if($__Context->lang_supported&&count($__Context->lang_supported))foreach($__Context->lang_supported as $__Context->key=>$__Context->val){;
if($__Context->key!= $__Context->lang_type){ ?><li><a href="#" onclick="doChangeLangType('<?php echo $__Context->key ?>');return false;">- <?php echo $__Context->val ?></a></li><?php }} ?>
							</ul>
						</li><?php } ?>
						<?php if($__Context->main_menu->list&&count($__Context->main_menu->list))foreach($__Context->main_menu->list as $__Context->key1=>$__Context->val1){ ?><li<?php if($__Context->val1['selected']){ ?> class="active mm-list-li"<?php };
if(!$__Context->val1['selected']){ ?> class="mm-list-li"<?php } ?>><a<?php if(!$__Context->val1['selected']){ ?> class="mm_a"<?php };
if($__Context->val1['selected']){ ?> class="mm_a active_a"<?php } ?> href="<?php echo $__Context->val1['href'] ?>"<?php if($__Context->val1['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val1['text'] ?></a><?php if($__Context->val1['list']){ ?><button<?php if($__Context->val1['selected']){ ?> class="Nav_i hover"<?php } ?> <?php if(!$__Context->val1['selected']){ ?> class="Nav_i"<?php } ?>><i class="xi-plus-square"></i><i class="xi-minus-square"> </i></button><?php } ?>
							<?php if($__Context->val1['list']){ ?><ul>
								<?php if($__Context->val1['list']&&count($__Context->val1['list']))foreach($__Context->val1['list'] as $__Context->key2=>$__Context->val2){ ?><li><a<?php if($__Context->val2['selected']){ ?> class="active_a"<?php } ?> href="<?php echo $__Context->val2['href'] ?>"<?php if($__Context->val2['open_window']=='Y'){ ?> target="_blank"<?php } ?>>- <?php echo $__Context->val2['text'] ?></a>
									<!-- <?php if($__Context->val2['list']){ ?><ul>
										<?php if($__Context->val2['list']&&count($__Context->val2['list']))foreach($__Context->val2['list'] as $__Context->key3=>$__Context->val3){ ?><li<?php if($__Context->val3['selected']){ ?> class="active"<?php } ?>><a href="<?php echo $__Context->val3['href'] ?>"<?php if($__Context->val3['open_window']=='Y'){ ?> target="_blank"<?php } ?>> <?php echo $__Context->val3['text'] ?></a></li><?php } ?>
									</ul><?php } ?> -->
								</li><?php } ?>
							</ul><?php } ?>
						</li><?php } ?>
					</ul>
				</nav>
			</div>
			<div class="mm_search_menu none_search_menu mobile_menu">
				<div class="top-mm-search"><a href="#" class="mobile_search search_menu">CLOSE</a>MEMBER</div>
				<div class="wrap_lnb right_lnb">
					<div class="login_widget">
						<?php if(!$__Context->is_logged){ ?>
						<!--#Meta:layouts/DW_ClayoutA/css/widget.login.css--><?php $__tmp=array('layouts/DW_ClayoutA/css/widget.login.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
						<div class="signin">
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
												<span class="bar"></span>
												<label class="info_label" for="uemail"><?php echo $__Context->lang->user_id ?></label>
											</div>
											<div class="group">
												<input type="password" name="password" id="upw" required="true" />
												<span class="bar"></span>
												<label class="info_label" for="upw"><?php echo $__Context->lang->password ?></label>
											</div>
											<div class="control-submit">
												<button type="submit" class="btn_submit"><?php echo $__Context->lang->cmd_login ?></button>
											</div>
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
										
									</fieldset>
								</form>
							</div>
							<?php if($__Context->layout_info->use_sns){ ?><div class="login-footer">
								<?php  $__Context->oSocialxeModel = getModel('socialxe'); ?>
								<ul class="wrap_sns">
									<li><?php if($__Context->layout_info->naver_login){ ?><a class="naver_login" href="<?php echo $__Context->oSocialxeModel->snsAuthUrl('naver', 'login') ?>"><img src="/layouts/DW_ClayoutA/img/btn_naver.png" alt="Naver Login">Naver Login</a><?php } ?></li>
									<li><?php if($__Context->layout_info->kakao_login){ ?><a class="kakao_login" href="<?php echo $__Context->oSocialxeModel->snsAuthUrl('kakao', 'login') ?>"><img src="/layouts/DW_ClayoutA/img/btn_kakao.png" alt="kakao Login">Kakao Login</a><?php } ?></li>
									<li><?php if($__Context->layout_info->twitter_login){ ?><a class="twitter_login" href="<?php echo $__Context->oSocialxeModel->snsAuthUrl('twitter', 'login') ?>"><img src="/layouts/DW_ClayoutA/img/btn_twitter.png" alt="twitter Login">Twitter Login</a><?php } ?></li>
									<li><?php if($__Context->layout_info->facebook_login){ ?><a class="facebook_login" href="<?php echo $__Context->oSocialxeModel->snsAuthUrl('facebook', 'login') ?>"><img src="/layouts/DW_ClayoutA/img/btn_facebook.png" alt="facebook Login">Facebook Login</a><?php } ?></li>
									<li><?php if($__Context->layout_info->google_login){ ?><a class="google_login" href="<?php echo $__Context->oSocialxeModel->snsAuthUrl('google', 'login') ?>"><img src="/layouts/DW_ClayoutA/img/btn_google.png" alt="google Login">Google Login</a><?php } ?></li>
								</ul>
							</div><?php } ?>
						</div>
					<?php } ?>
					<?php if($__Context->is_logged){ ?>
						<div class="uesr clearBoth">
							<!-- after_login -->
							<a href="<?php echo getUrl('act', 'dispMemberInfo') ?>" class="login_after">
								<?php if($__Context->logged_info->profile_image->src){ ?>
									<img src="<?php echo $__Context->logged_info->profile_image->src ?>" alt="<?php echo $__Context->logged_info->nick_name ?>" />
								<?php }else{ ?>
									<img src="/layouts/DW_ClayoutA/img/user.gif" alt="<?php echo $__Context->logged_info->nick_name ?>" />
								<?php } ?>
							</a>
							<ul class="wrap_Logout">
								<li><a class="m_nick_name" href="<?php echo getUrl('act', 'dispMemberInfo') ?>"><?php echo $__Context->logged_info->nick_name ?></a> 님</li>
								<li><a class="m_logout" href="<?php echo getUrl('act', 'dispMemberLogout') ?>"><?php echo $__Context->lang->cmd_logout ?></a></li>
									
							</ul>
						</div>
						<div class="logged_info">
							<ul>
								<?php if($__Context->logged_info->is_admin == 'Y'){ ?><li>
									<a href="<?php echo getUrl('', 'module', 'admin') ?>" target="_blank"><?php echo $__Context->lang->cmd_management ?></a>
								</li><?php } ?>
								<?php if($__Context->logged_info->menu_list&&count($__Context->logged_info->menu_list))foreach($__Context->logged_info->menu_list as $__Context->key=>$__Context->val){ ?><li><a href="<?php echo getUrl('act', $__Context->key, 'member_srl', '', 'page', '') ?>"><?php echo Context::getLang($__Context->val) ?></a></li><?php } ?>
									
							</ul>
							<span class="edge"></span>
						</div>
					<?php } ?>
					</div>
					
				</div>
			</div>
			<script>
				/* scrollUp Minimum setup */
			jQuery(function($){
					$.scrollUp();
				});
			</script>