<?php if(!defined("__XE__")) exit(); $layout_info = new stdClass;
$layout_info->site_srl = "0";
$layout_info->layout = "CustomStrap";
$layout_info->type = "";
$layout_info->path = "./layouts/CustomStrap/";
$layout_info->title = "CustomStrap";
$layout_info->description = "";
$layout_info->version = "1.0";
$layout_info->date = "20141126";
$layout_info->homepage = "";
$layout_info->layout_srl = $layout_srl;
$layout_info->layout_title = $layout_title;
$layout_info->license = "";
$layout_info->license_link = "";
$layout_info->layout_type = "P";
$layout_info->author = array();
$layout_info->author[0] = new stdClass;
$layout_info->author[0]->name = "Force";
$layout_info->author[0]->email_address = "me@wizss.net";
$layout_info->author[0]->homepage = "https://blog.craftnk.net";
$layout_info->extra_var = new stdClass;
$layout_info->extra_var->nav_color = new stdClass;
$layout_info->extra_var->nav_color->group = "네비게이션 바";
$layout_info->extra_var->nav_color->title = "네비게이션 바 색상";
$layout_info->extra_var->nav_color->type = "select";
$layout_info->extra_var->nav_color->value = $vars->nav_color;
$layout_info->extra_var->nav_color->description = "네비게이션 바의 색상을 선택하십시오.";
$layout_info->extra_var->nav_color->options = array();
$layout_info->extra_var->nav_color->options["white"] = new stdClass;
$layout_info->extra_var->nav_color->options["white"]->val = "하얀색 [기본]";
$layout_info->extra_var->nav_color->options["black"] = new stdClass;
$layout_info->extra_var->nav_color->options["black"]->val = "검정색";
$layout_info->extra_var->nav_title = new stdClass;
$layout_info->extra_var->nav_title->group = "네비게이션 바";
$layout_info->extra_var->nav_title->title = "홈페이지 이름";
$layout_info->extra_var->nav_title->type = "text";
$layout_info->extra_var->nav_title->value = $vars->nav_title;
$layout_info->extra_var->nav_title->description = "네비게이션 바에 사용하실 홈페이지 이름을 입력하십시오.";
$layout_info->extra_var->nav_url = new stdClass;
$layout_info->extra_var->nav_url->group = "네비게이션 바";
$layout_info->extra_var->nav_url->title = "주소";
$layout_info->extra_var->nav_url->type = "text";
$layout_info->extra_var->nav_url->value = $vars->nav_url;
$layout_info->extra_var->nav_url->description = "홈페이지 이름 클릭시 이동할 사이트 주소를 입력하십시오. (아무 것도 입력하지 않을시에는 사이트 최하위 경로로 이동합니다.)";
$layout_info->extra_var->alert = new stdClass;
$layout_info->extra_var->alert->group = "공지";
$layout_info->extra_var->alert->title = "상단 공지사항 ON/OFF";
$layout_info->extra_var->alert->type = "select";
$layout_info->extra_var->alert->value = $vars->alert;
$layout_info->extra_var->alert->description = "상단 공지사항의 ON/OFF 여부를 선택해주십시오.";
$layout_info->extra_var->alert->options = array();
$layout_info->extra_var->alert->options["Y"] = new stdClass;
$layout_info->extra_var->alert->options["Y"]->val = "ON (기본)";
$layout_info->extra_var->alert->options["N"] = new stdClass;
$layout_info->extra_var->alert->options["N"]->val = "OFF";
$layout_info->extra_var->alert_color = new stdClass;
$layout_info->extra_var->alert_color->group = "공지";
$layout_info->extra_var->alert_color->title = "상단 공지사항 색상";
$layout_info->extra_var->alert_color->type = "select";
$layout_info->extra_var->alert_color->value = $vars->alert_color;
$layout_info->extra_var->alert_color->description = "상단 공지사항의 색상을 선택해주십시오.";
$layout_info->extra_var->alert_color->options = array();
$layout_info->extra_var->alert_color->options["lg"] = new stdClass;
$layout_info->extra_var->alert_color->options["lg"]->val = "연두색 (기본)";
$layout_info->extra_var->alert_color->options["sb"] = new stdClass;
$layout_info->extra_var->alert_color->options["sb"]->val = "하늘색";
$layout_info->extra_var->alert_color->options["ly"] = new stdClass;
$layout_info->extra_var->alert_color->options["ly"]->val = "연한 노란색";
$layout_info->extra_var->alert_color->options["lr"] = new stdClass;
$layout_info->extra_var->alert_color->options["lr"]->val = "연한 빨간색";
$layout_info->extra_var->alert_title = new stdClass;
$layout_info->extra_var->alert_title->group = "공지";
$layout_info->extra_var->alert_title->title = "상단 공지사항 타이틀";
$layout_info->extra_var->alert_title->type = "text";
$layout_info->extra_var->alert_title->value = $vars->alert_title;
$layout_info->extra_var->alert_title->description = "상단 공지사항의 타이틀을 입력해주십시오. (두꺼운 부분이 타이틀 입니다, Font Awesome 4.2.0, 3.2.0 을 사용하실 수 있습니다.)";
$layout_info->extra_var->alert_text = new stdClass;
$layout_info->extra_var->alert_text->group = "공지";
$layout_info->extra_var->alert_text->title = "상단 공지사항 텍스트";
$layout_info->extra_var->alert_text->type = "text";
$layout_info->extra_var->alert_text->value = $vars->alert_text;
$layout_info->extra_var->alert_text->description = "상단 공지사항에 들어갈 내용을 입력해주십시오. (Font Awesome 4.2.0, 3.2.0 을 사용하실 수 있습니다.)";
$layout_info->extra_var->iv = new stdClass;
$layout_info->extra_var->iv->group = "이미지";
$layout_info->extra_var->iv->title = "상단 이미지 영역 ON/OFF 여부";
$layout_info->extra_var->iv->type = "select";
$layout_info->extra_var->iv->value = $vars->iv;
$layout_info->extra_var->iv->description = "상단 이미지 영역 사용여부를 선택하십시오. 상단에 이미지 영역을 추가하는 것 입니다. '상단 이미지 영역' 기능을 사용하시려면 본 옵션을 ON으로 설정하십시오.";
$layout_info->extra_var->iv->options = array();
$layout_info->extra_var->iv->options["N"] = new stdClass;
$layout_info->extra_var->iv->options["N"]->val = "OFF [기본]";
$layout_info->extra_var->iv->options["Y"] = new stdClass;
$layout_info->extra_var->iv->options["Y"]->val = "ON";
$layout_info->extra_var->iv_1 = new stdClass;
$layout_info->extra_var->iv_1->group = "이미지";
$layout_info->extra_var->iv_1->title = "상단 이미지 영역 1 - ON/OFF 여부";
$layout_info->extra_var->iv_1->type = "select";
$layout_info->extra_var->iv_1->value = $vars->iv_1;
$layout_info->extra_var->iv_1->description = "상단 이미지 영역 1의 ON/OFF 여부를 선택하십시오.";
$layout_info->extra_var->iv_1->options = array();
$layout_info->extra_var->iv_1->options["N"] = new stdClass;
$layout_info->extra_var->iv_1->options["N"]->val = "OFF [기본]";
$layout_info->extra_var->iv_1->options["Y"] = new stdClass;
$layout_info->extra_var->iv_1->options["Y"]->val = "ON";
$layout_info->extra_var->iv_1_img = new stdClass;
$layout_info->extra_var->iv_1_img->group = "이미지";
$layout_info->extra_var->iv_1_img->title = "상단 이미지 영역 1 - 이미지";
$layout_info->extra_var->iv_1_img->type = "image";
$layout_info->extra_var->iv_1_img->value = $vars->iv_1_img;
$layout_info->extra_var->iv_1_img->description = "상단 이미지 영역 1의 이미지를 추가해주십시오.";
$layout_info->extra_var->iv_1_title = new stdClass;
$layout_info->extra_var->iv_1_title->group = "이미지";
$layout_info->extra_var->iv_1_title->title = "상단 이미지영역 1 - 타이틀";
$layout_info->extra_var->iv_1_title->type = "text";
$layout_info->extra_var->iv_1_title->value = $vars->iv_1_title;
$layout_info->extra_var->iv_1_title->description = "상단 이미지 영역 1의 타이틀을 입력해주십시오.";
$layout_info->extra_var->iv_1_text = new stdClass;
$layout_info->extra_var->iv_1_text->group = "이미지";
$layout_info->extra_var->iv_1_text->title = "상단 이미지영역 1 - 텍스트";
$layout_info->extra_var->iv_1_text->type = "text";
$layout_info->extra_var->iv_1_text->value = $vars->iv_1_text;
$layout_info->extra_var->iv_1_text->description = "상단 이미지 영역 1의 텍스트를 입력해주십시오.";
$layout_info->extra_var->iv_2 = new stdClass;
$layout_info->extra_var->iv_2->group = "이미지";
$layout_info->extra_var->iv_2->title = "상단 이미지 영역 2 - ON/OFF 여부";
$layout_info->extra_var->iv_2->type = "select";
$layout_info->extra_var->iv_2->value = $vars->iv_2;
$layout_info->extra_var->iv_2->description = "상단 이미지 영역 2의 ON/OFF 여부를 선택하십시오.";
$layout_info->extra_var->iv_2->options = array();
$layout_info->extra_var->iv_2->options["N"] = new stdClass;
$layout_info->extra_var->iv_2->options["N"]->val = "OFF [기본]";
$layout_info->extra_var->iv_2->options["Y"] = new stdClass;
$layout_info->extra_var->iv_2->options["Y"]->val = "ON";
$layout_info->extra_var->iv_2_img = new stdClass;
$layout_info->extra_var->iv_2_img->group = "이미지";
$layout_info->extra_var->iv_2_img->title = "상단 이미지 영역 2 - 이미지";
$layout_info->extra_var->iv_2_img->type = "image";
$layout_info->extra_var->iv_2_img->value = $vars->iv_2_img;
$layout_info->extra_var->iv_2_img->description = "상단 이미지 영역 2의 이미지를 추가해주십시오.";
$layout_info->extra_var->iv_2_title = new stdClass;
$layout_info->extra_var->iv_2_title->group = "이미지";
$layout_info->extra_var->iv_2_title->title = "상단 이미지영역 2 - 타이틀";
$layout_info->extra_var->iv_2_title->type = "text";
$layout_info->extra_var->iv_2_title->value = $vars->iv_2_title;
$layout_info->extra_var->iv_2_title->description = "상단 이미지 영역 2의 타이틀을 입력해주십시오.";
$layout_info->extra_var->iv_2_text = new stdClass;
$layout_info->extra_var->iv_2_text->group = "이미지";
$layout_info->extra_var->iv_2_text->title = "상단 이미지영역 2 - 텍스트";
$layout_info->extra_var->iv_2_text->type = "text";
$layout_info->extra_var->iv_2_text->value = $vars->iv_2_text;
$layout_info->extra_var->iv_2_text->description = "상단 이미지 영역 2의 텍스트를 입력해주십시오.";
$layout_info->extra_var->iv_3 = new stdClass;
$layout_info->extra_var->iv_3->group = "이미지";
$layout_info->extra_var->iv_3->title = "상단 이미지 영역 3 - ON/OFF 여부";
$layout_info->extra_var->iv_3->type = "select";
$layout_info->extra_var->iv_3->value = $vars->iv_3;
$layout_info->extra_var->iv_3->description = "상단 이미지 영역 3의 ON/OFF 여부를 선택하십시오.";
$layout_info->extra_var->iv_3->options = array();
$layout_info->extra_var->iv_3->options["N"] = new stdClass;
$layout_info->extra_var->iv_3->options["N"]->val = "OFF [기본]";
$layout_info->extra_var->iv_3->options["Y"] = new stdClass;
$layout_info->extra_var->iv_3->options["Y"]->val = "ON";
$layout_info->extra_var->iv_3_title = new stdClass;
$layout_info->extra_var->iv_3_title->group = "이미지";
$layout_info->extra_var->iv_3_title->title = "상단 이미지영역 3 - 타이틀";
$layout_info->extra_var->iv_3_title->type = "text";
$layout_info->extra_var->iv_3_title->value = $vars->iv_3_title;
$layout_info->extra_var->iv_3_title->description = "상단 이미지 영역 3의 타이틀을 입력해주십시오.";
$layout_info->extra_var->iv_3_img = new stdClass;
$layout_info->extra_var->iv_3_img->group = "이미지";
$layout_info->extra_var->iv_3_img->title = "상단 이미지 영역 3 - 이미지";
$layout_info->extra_var->iv_3_img->type = "image";
$layout_info->extra_var->iv_3_img->value = $vars->iv_3_img;
$layout_info->extra_var->iv_3_img->description = "상단 이미지 영역 3의 이미지를 추가해주십시오.";
$layout_info->extra_var->iv_3_text = new stdClass;
$layout_info->extra_var->iv_3_text->group = "이미지";
$layout_info->extra_var->iv_3_text->title = "상단 이미지영역 3 - 텍스트";
$layout_info->extra_var->iv_3_text->type = "text";
$layout_info->extra_var->iv_3_text->value = $vars->iv_3_text;
$layout_info->extra_var->iv_3_text->description = "상단 이미지 영역 3의 텍스트를 입력해주십시오.";
$layout_info->extra_var->footer_text = new stdClass;
$layout_info->extra_var->footer_text->group = "푸터";
$layout_info->extra_var->footer_text->title = "푸터 텍스트";
$layout_info->extra_var->footer_text->type = "text";
$layout_info->extra_var->footer_text->value = $vars->footer_text;
$layout_info->extra_var->footer_text->description = "푸터 영역에 들어갈 텍스트를 입력해주십시오.";
$layout_info->extra_var_count = "21";
$layout_info->menu_count = "1";
$layout_info->menu = new stdClass;
$layout_info->default_menu = "top_menu";
$layout_info->menu->top_menu = new stdClass;
$layout_info->menu->top_menu->name = "top_menu";
$layout_info->menu->top_menu->title = "상단 메뉴";
$layout_info->menu->top_menu->maxdepth = "3";
$layout_info->menu->top_menu->menu_srl = $vars->top_menu;
$layout_info->menu->top_menu->xml_file = "./files/cache/menu/".$vars->top_menu.".xml.php";
$layout_info->menu->top_menu->php_file = "./files/cache/menu/".$vars->top_menu.".php";