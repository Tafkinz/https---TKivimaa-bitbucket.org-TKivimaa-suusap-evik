<?php
global $teams;
$teams = array(array("nimi"=>"T3", "wins"=>18, "losses"=>4, "played"=>22, "points"=>1230), array("nimi"=>"F4", "wins"=>13, "losses"=>4, "played"=>17, "points"=>1210)
,array("nimi"=>"GeC", "wins"=>11, "losses"=>4, "played"=>15, "points"=>1190),array("nimi"=>"MeH", "wins"=>10, "losses"=>8, "played"=>18, "points"=>1105),
array("nimi"=>"lOl", "wins"=>8, "losses"=>14, "played"=>22, "points"=>1030),array("nimi"=>"bmP", "wins"=>3, "losses"=>13, "played"=>16, "points"=>974));

function kontrollimine() {
	
	$vead=array();
	if (!empty($_POST)) {
		
		if (empty($_POST['user'])) {
		$user_puudu = "Kasutajanimi puudub";
		$vead[] = $user_puudu;
	}
		if (empty($_POST['pass'])) {
		$pass_puudu = "Parool puudub";
		$vead[] = $pass_puudu;
	}
		if ($_POST['pass']!="Parool123" || $_POST['user']!="Testija") {
		$pass_vale = "Vale kasutaja või parool";
		$vead[] = $pass_vale;
	}

			if (empty($vead)) {
			header("Location: ?page=settings&login=true");
			}
}
return $vead;
}

function registerkontroll() {
	
	$vead=array();
	if (!empty($_POST)) {
		
		if (empty($_POST['user'])) {
		$user_puudu = "Kasutajanimi puudub";
		$vead[] = $user_puudu;
	}
		if (empty($_POST['pass'])) {
		$pass_puudu = "Parool puudub";
		$vead[] = $pass_puudu;
	}
			if (empty($vead)) {
			header("Location: ?page=settings&login=true");
			}
}
return $vead;
}

function contactform() {
 	$vead=array();
 		if(!empty($_POST)) {
 		$email = $_POST["email"];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 		 $emailErr = "not a valid e-mail format"; 
 		 $vead[] = $emailErr;
		}
		if (empty($_POST['name'])) {
		$nimi_puudu = "You must enter a name";
		$vead[] = $nimi_puudu;
		}
		if(empty($_POST['message'])) {
		$sisu_puudu = "Contact field is empty";
		$vead[] = $sisu_puudu;
		}
		if(empty($vead)) {
		header("Location: ?page=thanks");
		}
	}
		return $vead;
}

function mostGames() {
include ("teams.php");
foreach ($teams as $tiim) {
$suurim[] = $tiim['played'];
}
$enim=max($suurim);
$voti=array_search($enim, $suurim);
return $teams[$voti];
}

function mostWins() {
include ("teams.php");
foreach ($teams as $tiim) {
$suurim[] = $tiim['wins'];
}
$enim=max($suurim);
$voti=array_search($enim, $suurim);
return $teams[$voti];
}

function mostLosses() {
include ("teams.php");
foreach ($teams as $tiim) {
$suurim[] = $tiim['losses'];
}
$enim=max($suurim);
$voti=array_search($enim, $suurim);
return $teams[$voti];
}

function winPercent() {
include ("teams.php");
foreach ($teams as $tiim) {
$protsent[] = ($tiim['wins']/$tiim['played'])*100;
}
$enim=max($protsent);
$voti=array_search($enim, $protsent);
$parimProtsent[0] = $teams[$voti]['nimi'];
$parimProtsent[1] = $protsent[$voti];
return $parimProtsent;
}

function v_index(){
		include_once("head.html");
		include("index.html");
		include_once("foot.html");	
	}
function v_info() {
		include_once("head.html");	
		include("info.html");
		include_once("foot.html");
}
function v_login() {	
		$vead=kontrollimine();
		include_once("head.html");
		include("login.html");
		include_once("foot.html");
}

function v_register() {
		$vead=registerkontroll();
		include_once("head.html");
		include("register.html");
		include_once("foot.html");
}
function v_settings() {
		include_once("head.html");
		include("settings.html");
		include_once("foot.html");
	}
function v_stands() {
		include_once("head.html");
		include("standings.html");
		include_once("foot.html");
		}
function v_stats() {
		$maxGames=mostGames();
		$maxWins=mostWins();
		$maxLoss=mostLosses();
		$bestPercent=winPercent();
		include_once("head.html");
		include("stats.html");
		include_once("foot.html");
		}
function v_contact() {
		$vead=contactform();
		include_once("head.html");
		include("contact.html");
		include_once("foot.html");
		}
function v_about() {
		include_once("head.html");
		include("about.html");
		include_once("foot.html");
		}
function v_thanks() {
		include_once("head.html");
		include("thanks.html");
		include_once("foot.html");
		}
	
?>