<?php if(!defined("__XE__"))exit;?><div class="x_page-header">
	<h1>안드로이드 푸시 앱 <?php if($__Context->act=='dispAndroidpushappAdminConfig'){ ?>v<?php echo $__Context->androidpushapp_module_info->version;
} ?></h1>
</div>
<div class="header4">
	<ul class="x_nav x_nav-tabs">
		<li<?php if($__Context->act=='dispAndroidpushappAdminConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAndroidpushappAdminConfig','filter_type','') ?>">환경설정</a></li>
		<li<?php if($__Context->act=='dispAndroidpushappAdminList'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAndroidpushappAdminList','filter_type','') ?>">푸시 결과값 목록</a></li>
		<li<?php if($__Context->act=='dispAndroidpushappAdminRegId'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAndroidpushappAdminRegId','filter_type','') ?>">등록 기기 목록</a></li>
	</ul>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>