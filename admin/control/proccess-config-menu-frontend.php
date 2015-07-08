<?php
	require_once('../../models/config.php');	
	require_once('../../models/class.php');
	require_once('../../models/class-config.php');
	$menu_config = unserialize($_POST['values_data']);
	$i = 0;
	foreach($menu_config as $key => $val)
	{
		$menu_config[$key] = $_POST['menu_gr_id_'.$i++];
	}
	$config_obj = new cauhinhchung();
	if($config_obj->updateConfig('',serialize($menu_config),"name='menu_config'"))
	{
		header('location: ../index.php?view=config-menu-frontend&stt=success');
	}
	else
	{
		header('location: ../index.php?view=config-menu-frontend&stt=fail');
	}
?>