<?php
class androidpushapp extends ModuleObject
{
	
	var $triggers = array(
		array('comment.insertComment', 'androidpushapp', 'controller', 'triggerAfterInsertComment', 'after'),	
		array('document.insertDocument', 'androidpushapp', 'controller', 'triggerAfterInsertDocument', 'after'),
		array('communication.sendMessage', 'androidpushapp', 'controller', 'triggerAfterSendMessage', 'after'),	
		array('display', 'androidpushapp', 'controller', 'triggerBeforeDisplay', 'before'),
	);	

	function moduleInstall()
	{
		return new Object();
	}

	function checkUpdate()
	{
		$oModuleModel = getModel('module');
		$oDB = &DB::getInstance();

		foreach($this->triggers as $trigger)
		{
			if(!$oModuleModel->getTrigger($trigger[0], $trigger[1], $trigger[2], $trigger[3], $trigger[4])) return true;
		}

		if(!$oDB->isColumnExists('androidpushapp_gcmregid', 'member_srl'))
		{
			return true;
		}
		
		if(!$oDB->isColumnExists('androidpushapp_gcmregid', 'setting'))
		{
			return true;
		}
		if(!$oDB->isColumnExists('androidpushapp_gcmregid', 'setting_board'))
		{
			return true;
		}

		if(!$oDB->isColumnExists('androidpushapp_gcmregid', 'sort'))
		{
			return true;
		}
		if(!$oDB->isColumnExists('androidpushapp_gcmregid', 'last_login'))
		{
			return true;
		}
		if(!$oDB->isColumnExists('androidpushapp_gcmregid', 'deviceId'))
		{
			return true;
		}
		if(!$oDB->isColumnExists('androidpushapp_gcmregid', 'sync'))
		{
			return true;
		}
		

		return false;
	}

	function moduleUpdate()
	{
		$oModuleModel = getModel('module');
		$oModuleController = getController('module');
		$oDB = &DB::getInstance();

		foreach($this->triggers as $trigger)
		{
			if(!$oModuleModel->getTrigger($trigger[0], $trigger[1], $trigger[2], $trigger[3], $trigger[4]))
			{
				$oModuleController->insertTrigger($trigger[0], $trigger[1], $trigger[2], $trigger[3], $trigger[4]);
			}
		}

		if(!$oDB->isColumnExists('androidpushapp_gcmregid','member_srl'))
		{
			$oDB->addColumn('androidpushapp_gcmregid', 'member_srl', 'number', 11);
		}
		if(!$oDB->isColumnExists('androidpushapp_gcmregid','setting'))
		{
			$oDB->addColumn('androidpushapp_gcmregid', 'setting', 'text');
		}
		if(!$oDB->isColumnExists('androidpushapp_gcmregid','setting_board'))
		{
			$oDB->addColumn('androidpushapp_gcmregid', 'setting_board', 'text');
		}
		if(!$oDB->isColumnExists('androidpushapp_gcmregid','last_login'))
		{
			$oDB->addColumn('androidpushapp_gcmregid', 'last_login', 'date');
		}
		if(!$oDB->isColumnExists('androidpushapp_gcmregid','sort'))
		{
			$oDB->addColumn('androidpushapp_gcmregid', 'sort', 'char', 1, 'W', 'true');
		}
		if(!$oDB->isColumnExists('androidpushapp_gcmregid','deviceId'))
		{
			$oDB->addColumn('androidpushapp_gcmregid', 'deviceId', 'varchar', 250, 'none', 'true');
		}
		if(!$oDB->isColumnExists('androidpushapp_gcmregid','sync'))
		{
			$oDB->addColumn('androidpushapp_gcmregid', 'sync', 'char', 1, 'N', 'true');
			$output = executeQueryArray('androidpushapp.getgcm');
			$gcmmems = array();
			foreach($output->data as $data){
				if($data->member_srl!="") array_push($gcmmems, $data->member_srl);
			}
			$args = new stdClass();
			$args->member_srls=$gcmmems;
			$outputd = executeQuery('androidpushapp.upgrade', $args);
			if(!$outputd->toBool())
			{
				return $outputd;
			}
		}
		
		return new Object(0, 'success_updated');		
	}

	function recompileCache()
	{
		return new Object();
	}

	function moduleUninstall()
	{
		$oModuleController = getController('module');

		foreach($this->triggers as $trigger)
		{
			$oModuleController->deleteTrigger($trigger[0], $trigger[1], $trigger[2], $trigger[3], $trigger[4]);
		}
		return new Object();
	}
}
