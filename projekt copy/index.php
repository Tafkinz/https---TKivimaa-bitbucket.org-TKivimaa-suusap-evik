<?php 
require_once("funktsioonid.php");
if (! isset($_GET['page'])) 
{
	include("head.html");
	include("index.html");
	include("foot.html");
}
else {
switch($_GET['page'])
	{
	case 'index':
		v_index();
		break;
	case 'about':
		v_about();
		break;
	case 'info':
		v_info();
		break;
	case 'login':
		v_login();
		break;
	case 'register':
		v_register();
		break;
	case 'stats':
		v_stats();
		break;
	case 'standings':
		v_stands();
		break;
	case 'contact':
		v_contact();
		break;
	case 'settings':
		v_settings();
		break;
	case 'thanks':
		v_thanks();
		break;
	}
}
?>