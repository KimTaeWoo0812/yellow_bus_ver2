<?php if(!defined("__XE__"))exit;?>			<!-- 첫번째 블럭 시작 -->
			<?php if($__Context->layout_info->main_widget1){ ?><section id="section1" class="section1 align-center">
				<?php if(!$__Context->layout_info->main_widget_Img1){ ?><div class="in_section1">
					<?php if($__Context->layout_info->main_widget_title1){ ?><h1 class="text-shadow1"><?php echo $__Context->layout_info->main_widget_title1 ?></h1><?php } ?>
					<?php if($__Context->layout_info->main_widget_text1){ ?><p><?php echo $__Context->layout_info->main_widget_text1 ?></p><?php } ?>
				</div><?php } ?>
				<?php if($__Context->layout_info->main_widget_Img1){ ?><div class="in_section1">
					<img src="<?php echo $__Context->layout_info->main_widget_Img1 ?>" alt="" />
				</div><?php } ?>
				<span class="bg_span left_span"></span>
				<span class="bg_span right_span"></span>
			</section><?php } ?>
			<!-- 첫번째 블럭 끝 -->
			<!-- 두번째 블럭 시작 -->
			<?php if($__Context->layout_info->main_widget2){ ?><section id="section2" class="section2">
				<div class="in_section2 align-center">
					<?php if(!$__Context->layout_info->main_widget_Img2&&$__Context->layout_info->main_widget_title2){ ?><div class="section_top" >
						<?php if($__Context->layout_info->main_widget_title2){ ?><h2 class="text-shadow1 section_h2"><?php echo $__Context->layout_info->main_widget_title2 ?></h2><?php } ?>
						<?php if($__Context->layout_info->main_widget_text2){ ?><p class="section_p"><?php echo $__Context->layout_info->main_widget_text2 ?></p><?php } ?>
					</div><?php } ?>
					<?php if($__Context->layout_info->main_widget_Img2){ ?><div class="section_top" >
						<img src="<?php echo $__Context->layout_info->main_widget_Img2 ?>" alt="" />
					</div><?php } ?>
					<div class="banner_div">
						<ul class="banner_ul clearBoth">
							<?php if($__Context->layout_info->in_banner_Img1){ ?><li>
								<div class="in_banner">
									<p>
										<img src="<?php echo $__Context->layout_info->in_banner_Img1 ?>" alt="" />
										<?php if($__Context->layout_info->in_banner_url1){ ?><span class="OverBanner1">
											<a class="OverBanner_i" href="<?php echo $__Context->layout_info->in_banner_url1 ?>"><i class="xi-link"></i></a>
										</span><?php } ?>
									</p>
									<h3><?php echo $__Context->layout_info->in_banner_title1 ?></h3>
									<div class="wrap_text"><?php echo $__Context->layout_info->in_banner_text1 ?></div>
								</div>
							</li><?php } ?>
							<?php if($__Context->layout_info->in_banner_Img2){ ?><li>
								<div class="in_banner">
									<p>
										<img src="<?php echo $__Context->layout_info->in_banner_Img2 ?>" alt="" />
										<?php if($__Context->layout_info->in_banner_url2){ ?><span class="OverBanner1">
											<a class="OverBanner_i" href="<?php echo $__Context->layout_info->in_banner_url2 ?>"><i class="xi-link"></i></a>
										</span><?php } ?>
									</p>
									<h3><?php echo $__Context->layout_info->in_banner_title2 ?></h3>
									<div class="wrap_text"><?php echo $__Context->layout_info->in_banner_text2 ?></div>
								</div>
							</li><?php } ?>
							<?php if($__Context->layout_info->in_banner_Img3){ ?><li>
								<div class="in_banner">
									<p>
										<img src="<?php echo $__Context->layout_info->in_banner_Img3 ?>" alt="" />
										<?php if($__Context->layout_info->in_banner_url3){ ?><span class="OverBanner1">
											<a class="OverBanner_i" href="<?php echo $__Context->layout_info->in_banner_url3 ?>"><i class="xi-link"></i></a>
										</span><?php } ?>
									</p>
									<h3><?php echo $__Context->layout_info->in_banner_title3 ?></h3>
									<div class="wrap_text"><?php echo $__Context->layout_info->in_banner_text3 ?></div>
								</div>
							</li><?php } ?>
						</ul>
					</div>
				</div>
				<?php if($__Context->layout_info->foot_v2){ ?>
				<span class="bg_span left_span"></span>
				<span class="bg_span right_span"></span>
				<?php } ?>
			</section><?php } ?>
			<!-- 두번째 블럭 끝 -->
			<!-- 세번째 블럭 시작 -->
			<?php if($__Context->layout_info->main_widget3){ ?><section id="section3" class="section3">
				<div class="in_section2 align-center">
					<?php if(!$__Context->layout_info->main_widget_Img3&&$__Context->layout_info->main_widget_title3){ ?><div class="section_top" >
						<?php if($__Context->layout_info->main_widget_title3){ ?><h2 class="text-shadow1 section_h2"><?php echo $__Context->layout_info->main_widget_title3 ?></h2><?php } ?>
						<?php if($__Context->layout_info->main_widget_text3){ ?><p class="section_p"><?php echo $__Context->layout_info->main_widget_text3 ?></p><?php } ?>
					</div><?php } ?>
					<?php if($__Context->layout_info->main_widget_Img3){ ?><div class="section_top" >
						<img src="<?php echo $__Context->layout_info->main_widget_Img3 ?>" alt="" />
					</div><?php } ?>
					<div class="banner_div">
						<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->main_widget_srl3 ?>" list_type="image_slide" tab_type="none" markup_type="list" list_count="<?php echo $__Context->layout_info->list_count_3 ?>" cols_list_count="3" page_count="1" subject_cut_size="70" content_cut_size="180" option_view="thumbnail,title" show_browser_title="N" show_comment_count="<?php echo $__Context->layout_info->show_comment_count_3 ?>" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="460" thumbnail_height="300" />
					</div>
				</div>
				
				<?php if($__Context->layout_info->foot_v3){ ?>
				<span class="bg_span left_span"></span>
				<span class="bg_span right_span"></span>
				<?php } ?>
			</section><?php } ?>
			<!-- 세번째 블럭 끝 -->
			
			<!-- 네번째 블럭 시작 -->
			<?php if($__Context->layout_info->wrap_main_widget4){ ?><section id="section4" class="section4">
				<div class="in_section3">
					<?php if(!$__Context->layout_info->main_widget_Img4&&$__Context->layout_info->main_widget_title4){ ?><div class="section_top align-center" >
						<?php if($__Context->layout_info->main_widget_title4){ ?><h2 class="text-shadow1 section_h2"><?php echo $__Context->layout_info->main_widget_title4 ?></h2><?php } ?>
						<?php if($__Context->layout_info->main_widget_text4){ ?><p class="section_p"><?php echo $__Context->layout_info->main_widget_text4 ?></p><?php } ?>
					</div><?php } ?>
					<?php if($__Context->layout_info->main_widget_Img4){ ?><div class="section_top align-center" >
						<img src="<?php echo $__Context->layout_info->main_widget_Img4 ?>" alt="" />
					</div><?php } ?>
					<div class="banner_div clearBoth">
						<!-- 4-1 블럭 시작 -->
						<?php if($__Context->layout_info->in_widget1=='normal'){ ?><div class="in_office in_office1"><!-- 목록형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img1){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img1 ?>" alt="<?php echo $__Context->layout_info->in_widget_title1 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img1){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title1 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url1){ ?><a href="<?php echo $__Context->layout_info->in_widget_url1 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="document" module_srls="<?php echo $__Context->layout_info->in_widget_srl1 ?>" list_type="normal" tab_type="none" markup_type="list" list_count="5" page_count="1" subject_cut_size="60" option_view="regdate,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget1=='gallery'){ ?><div class="in_office in_office1"><!-- 갤러리형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img1){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img1 ?>" alt="<?php echo $__Context->layout_info->in_widget_title1 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img1){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title1 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url1){ ?><a href="<?php echo $__Context->layout_info->in_widget_url1 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_gallery">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl1 ?>" list_type="gallery" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="20" content_cut_size="60" option_view="thumbnail,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="230" thumbnail_height="162" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget1=='image_title_content'){ ?><div class="in_office in_office1"><!-- 이미지+제목+내용형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img1){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img1 ?>" alt="<?php echo $__Context->layout_info->in_widget_title1 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img1){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title1 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url1){ ?><a href="<?php echo $__Context->layout_info->in_widget_url1 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl1 ?>" list_type="image_title_content" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="70" content_cut_size="180" option_view="thumbnail,title,content" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="120" thumbnail_height="90" />
								</div>
							</div>
						</div><?php } ?>
						<!-- 4-1 블럭 끝 -->
						<!-- 4-2 블럭 시작 -->
						<?php if($__Context->layout_info->in_widget2=='normal'){ ?><div class="in_office in_office1"><!-- 목록형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img2){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img2 ?>" alt="<?php echo $__Context->layout_info->in_widget_title2 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img2){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title2 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url2){ ?><a href="<?php echo $__Context->layout_info->in_widget_url2 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="document" module_srls="<?php echo $__Context->layout_info->in_widget_srl2 ?>" list_type="normal" tab_type="none" markup_type="list" list_count="5" page_count="1" subject_cut_size="60" option_view="regdate,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget2=='gallery'){ ?><div class="in_office in_office1"><!-- 갤러리형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img2){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img2 ?>" alt="<?php echo $__Context->layout_info->in_widget_title2 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img2){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title2 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url2){ ?><a href="<?php echo $__Context->layout_info->in_widget_url2 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_gallery">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl2 ?>" list_type="gallery" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="20" content_cut_size="60" option_view="thumbnail,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="230" thumbnail_height="162" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget2=='image_title_content'){ ?><div class="in_office in_office1"><!-- 이미지+제목+내용형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img2){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img2 ?>" alt="<?php echo $__Context->layout_info->in_widget_title2 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img2){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title2 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url2){ ?><a href="<?php echo $__Context->layout_info->in_widget_url2 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl2 ?>" list_type="image_title_content" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="70" content_cut_size="180" option_view="thumbnail,title,content" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="120" thumbnail_height="90" />
								</div>
							</div>
						</div><?php } ?>
						<!-- 4-2 블럭 끝 -->
						<!-- 4-3 블럭 시작 -->
						<?php if($__Context->layout_info->in_widget3=='normal'){ ?><div class="in_office in_office1 in_office3"><!-- 목록형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img3){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img3 ?>" alt="<?php echo $__Context->layout_info->in_widget_title3 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img3){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title3 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url3){ ?><a href="<?php echo $__Context->layout_info->in_widget_url3 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="document" module_srls="<?php echo $__Context->layout_info->in_widget_srl3 ?>" list_type="normal" tab_type="none" markup_type="list" list_count="5" page_count="1" subject_cut_size="60" option_view="regdate,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget3=='gallery'){ ?><div class="in_office in_office1 in_office3"><!-- 갤러리형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img3){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img3 ?>" alt="<?php echo $__Context->layout_info->in_widget_title3 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img3){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title3 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url3){ ?><a href="<?php echo $__Context->layout_info->in_widget_url3 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_gallery">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl3 ?>" list_type="gallery" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="20" content_cut_size="60" option_view="thumbnail,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="230" thumbnail_height="162" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget3=='image_title_content'){ ?><div class="in_office in_office1 in_office3"><!-- 이미지+제목+내용형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img3){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img3 ?>" alt="<?php echo $__Context->layout_info->in_widget_title3 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img3){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title3 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url3){ ?><a href="<?php echo $__Context->layout_info->in_widget_url3 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl3 ?>" list_type="image_title_content" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="70" content_cut_size="180" option_view="thumbnail,title,content" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="120" thumbnail_height="90" />
								</div>
							</div>
						</div><?php } ?>
						<!-- 4-3 블럭 끝 -->
						<!-- 4-4 블럭 시작 -->
						<?php if($__Context->layout_info->in_widget4=='normal'){ ?><div class="in_office in_office1 in_office4"><!-- 목록형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img4){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img4 ?>" alt="<?php echo $__Context->layout_info->in_widget_title4 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img4){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title4 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url4){ ?><a href="<?php echo $__Context->layout_info->in_widget_url4 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="document" module_srls="<?php echo $__Context->layout_info->in_widget_srl4 ?>" list_type="normal" tab_type="none" markup_type="list" list_count="5" page_count="1" subject_cut_size="60" option_view="regdate,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget4=='gallery'){ ?><div class="in_office in_office1 in_office4"><!-- 갤러리형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img4){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img4 ?>" alt="<?php echo $__Context->layout_info->in_widget_title4 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img4){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title4 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url4){ ?><a href="<?php echo $__Context->layout_info->in_widget_url4 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_gallery">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl4 ?>" list_type="gallery" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="20" content_cut_size="60" option_view="thumbnail,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="230" thumbnail_height="162" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget4=='image_title_content'){ ?><div class="in_office in_office1 in_office4"><!-- 이미지+제목+내용형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img4){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img4 ?>" alt="<?php echo $__Context->layout_info->in_widget_title4 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img4){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title4 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url4){ ?><a href="<?php echo $__Context->layout_info->in_widget_url4 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl4 ?>" list_type="image_title_content" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="70" content_cut_size="180" option_view="thumbnail,title,content" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="120" thumbnail_height="90" />
								</div>
							</div>
						</div><?php } ?>
						<!-- 4-4 블럭 끝 -->
						<!-- 4-5 블럭 시작 -->
						<?php if($__Context->layout_info->in_widget5=='normal'){ ?><div class="in_office in_office1 in_office5"><!-- 목록형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img5){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img5 ?>" alt="<?php echo $__Context->layout_info->in_widget_title5 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img5){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title5 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url5){ ?><a href="<?php echo $__Context->layout_info->in_widget_url5 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="document" module_srls="<?php echo $__Context->layout_info->in_widget_srl5 ?>" list_type="normal" tab_type="none" markup_type="list" list_count="5" page_count="1" subject_cut_size="60" option_view="regdate,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget5=='gallery'){ ?><div class="in_office in_office1 in_office5"><!-- 갤러리형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img5){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img5 ?>" alt="<?php echo $__Context->layout_info->in_widget_title5 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img5){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title5 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url5){ ?><a href="<?php echo $__Context->layout_info->in_widget_url5 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_gallery">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl5 ?>" list_type="gallery" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="20" content_cut_size="60" option_view="thumbnail,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="230" thumbnail_height="162" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget5=='image_title_content'){ ?><div class="in_office in_office1 in_office5"><!-- 이미지+제목+내용형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img5){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img5 ?>" alt="<?php echo $__Context->layout_info->in_widget_title5 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img5){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title5 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url5){ ?><a href="<?php echo $__Context->layout_info->in_widget_url5 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl5 ?>" list_type="image_title_content" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="70" content_cut_size="180" option_view="thumbnail,title,content" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="120" thumbnail_height="90" />
								</div>
							</div>
						</div><?php } ?>
						<!-- 4-5 블럭 끝 -->
						<!-- 4-6 블럭 시작 -->
						<?php if($__Context->layout_info->in_widget6=='normal'){ ?><div class="in_office in_office1 in_office6"><!-- 목록형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img6){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img6 ?>" alt="<?php echo $__Context->layout_info->in_widget_title6 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img6){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title6 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url6){ ?><a href="<?php echo $__Context->layout_info->in_widget_url6 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="document" module_srls="<?php echo $__Context->layout_info->in_widget_srl6 ?>" list_type="normal" tab_type="none" markup_type="list" list_count="5" page_count="1" subject_cut_size="60" option_view="regdate,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget6=='gallery'){ ?><div class="in_office in_office1 in_office6"><!-- 갤러리형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img6){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img6 ?>" alt="<?php echo $__Context->layout_info->in_widget_title6 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img6){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title6 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url6){ ?><a href="<?php echo $__Context->layout_info->in_widget_url6 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_gallery">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl6 ?>" list_type="gallery" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="20" content_cut_size="60" option_view="thumbnail,title" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="230" thumbnail_height="162" />
								</div>
							</div>
						</div><?php } ?>
						<?php if($__Context->layout_info->in_widget6=='image_title_content'){ ?><div class="in_office in_office1 in_office6"><!-- 이미지+제목+내용형 -->
							<div class="inner_office wrap_widgetA">
								<h2 class="DW_StA_h2">
									<?php if($__Context->layout_info->in_widget_H2Img6){ ?><span class="DW_StA_span"><img class="H2Img" src="<?php echo $__Context->layout_info->in_widget_H2Img6 ?>" alt="<?php echo $__Context->layout_info->in_widget_title6 ?>" /></span><?php } ?>
									<?php if(!$__Context->layout_info->in_widget_H2Img6){ ?><span class="DW_StA_span"><?php echo $__Context->layout_info->in_widget_title6 ?></span><?php } ?>
									<?php if($__Context->layout_info->in_widget_url6){ ?><a href="<?php echo $__Context->layout_info->in_widget_url6 ?>" class="DW_StA_h2_more"><span>+</span> more</a><?php } ?>
									<hr class="DW_StA_hr" />
								</h2>
								<div class="DW_StA_normal">
									<img class="zbxe_widget_output" widget="DWbasic" skin="default" colorset="white" content_type="image" module_srls="<?php echo $__Context->layout_info->in_widget_srl6 ?>" list_type="image_title_content" tab_type="none" markup_type="list" list_count="2" cols_list_count="2" page_count="1" subject_cut_size="70" content_cut_size="180" option_view="thumbnail,title,content" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="120" thumbnail_height="90" />
								</div>
							</div>
						</div><?php } ?>
						<!-- 4-6 블럭 끝 -->
					</div>
				</div>
				<?php if($__Context->layout_info->foot_v4){ ?>
				<span class="bg_span left_span"></span>
				<span class="bg_span right_span"></span>
				<?php } ?>
			</section><?php } ?>
			<?php if($__Context->layout_info->use_map){ ?><section id="section5" class="wrap_map section5">
				<?php if(!$__Context->layout_info->map_text){;
$__Context->layout_info->map_text = "국회의사당~~";
} ?>
				<div class="in_map">
					<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
					
					<div class="dw-map" id="myMap" style="width: 100%; height: 550px;"  ></div>
					<script type="text/javascript">
					function dw_maps_loaded() {
					var myMap = document.getElementById("myMap");
					var loc = new google.maps.LatLng(<?php echo $__Context->layout_info->LatLng ?>);
					//	div 에 구글맵 보이기
					var gmap = new google.maps.Map(
							myMap,	//지도가 보여질 div
							{
								zoom:16,//	지도 확대 정보
								center:loc,	//	지도 중앙	위치
								mapTypeId:google.maps.MapTypeId.ROADMAP //	지도타입
							}
					);
					//	위치에 마커 표시하기
					var gmarker = new google.maps.Marker(
						{
							position:loc,
							map:gmap,
							title:""
						}
					);
					var content = "<?php echo $__Context->layout_info->map_text ?>"; // 말풍선 안에 들어갈 내용
					var infowindow = new google.maps.InfoWindow({ content: content});
					infowindow.open(gmap,gmarker);
					}
					jQuery(window).load(function() {
					  dw_maps_loaded();
					});
					</script>
				</div>
			</section><?php } ?>
						
			