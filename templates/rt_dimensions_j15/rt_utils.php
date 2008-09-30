<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );

global $Itemid, $modules_list;

// menu code
$document	= &JFactory::getDocument();
$renderer	= $document->loadRenderer( 'module' );
$options	 = array( 'style' => "raw" );
$module	 = JModuleHelper::getModule( 'mod_dimensionmenu' );
$mainnav = false; $subnav = false;
if($mtype == "splitmenu") : 
	$module->params	= "menutype=$menu_name\nstartLevel=0\nendLevel=1";
	$mainnav = $renderer->render( $module, $options );
	$module	 = JModuleHelper::getModule( 'mod_dimensionmenu' );
	$module->params	= "menutype=$menu_name\nstartLevel=1\nendLevel=9\nclass_sfx=side";
	$options	 = array( 'style' => "submenu");
	$subnav = $renderer->render( $module, $options );
elseif($mtype == "moomenu" or $mtype == "suckerfish") : 								      	
	$module->params	= "menutype=$menu_name\nshowAllChildren=1";
	$mainnav = $renderer->render( $module, $options );
endif;

// make sure subnav is empty
if (strlen($subnav) < 10) $subnav = false;
//Are we in edit mode
$editmode = false;
if (JRequest::getCmd('task') == 'edit' ) :
	$editmode = true;
endif;


$topmod_count = ($this->countModules('user3')>0) + ($this->countModules('user4')>0);
$topmod_width = $topmod_count > 0 ? ' w' . floor(99 / $topmod_count) : '';
$bottommod_count = ($this->countModules('user5')>0) + ($this->countModules('user6')>0);
$bottommod_width = $bottommod_count > 0 ? ' w' . floor(99 / $bottommod_count) : '';
$footermod_count = ($this->countModules('user7')>0) + ($this->countModules('user8')>0) + ($this->countModules('user9')>0);
$footermod_width = $footermod_count > 0 ? ' w' . floor(99 / $footermod_count) : '';

$secondcol_width = ($this->countModules('user1')>0 or $subnav) ? $secondcol_width : "0";
$thirdcol_width = $this->countModules('user2') > 0 ? $thirdcol_width : "0";

$extra_space = $this->countModules('user1') == 0 ? ' class="extraspace"' : '';

// module slider configuration
$modules_list 				= array(array("title"=>$ms_title1, "module"=>$ms_module1),
															array("title"=>$ms_title2, "module"=>$ms_module2),
															array("title"=>$ms_title3, "module"=>$ms_module3),
															array("title"=>$ms_title4, "module"=>$ms_module4),
															array("title"=>$ms_title5, "module"=>$ms_module5));

if (!$tempus) {
	$tempus = "false";
} else {
	$tempus = "\"" . $tempus . "\"";
}

$raw_width = $template_width - 50 - (134 * 2);
$template_width = 'margin: 0 auto; width: ' . $template_width . 'px;';
$safari_fix = $module_slider_height + 40;

function isIe7() {
	$agent=$_SERVER['HTTP_USER_AGENT'];
	if (stristr($agent, 'msie 7')) return true;
	return false;
}

function isIe6() {
	$agent=$_SERVER['HTTP_USER_AGENT'];
	if (stristr($agent, 'msie 6')) return true;
	return false;
}

?>