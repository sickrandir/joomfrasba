<?php header("Content-type: text/css"); ?>
<?php
$path = dirname( dirname( $_SERVER['SCRIPT_NAME'] ) );
?>
/** IE6 is a hunk of crap!!! due to limitations in the CSS capabilities of IE, these hacks are required **/

/* transaprent hyperlink clickable fix */
#top-shadow {
	position: relative;
	width: 100%;
}

a {
	position: relative;
}

#moduleslide a {
	position: static;
}

div#horiz-menu {
	position: static;
	z-index: 2;
}

/* silly IE class ordering bug */

a#active_menu.sublevel,
#dusk a#active_menu.sublevel,
#dawn a#active_menu.sublevel,
#day a#active_menu.sublevel,
#night a#active_menu.sublevel {
	background: none;
}

/** horid IE render order bug - http://www.positioniseverything.net/explorer/percentages.html */

#content,
#component,
#component .padding,
#component .padding2,
#component .contentpaneopen,
span.pathway {
	position: relative;
	height: 1%;
}

/* due to limitiation of IE filters and tiling control - this hack is required for IE */

#bg-bottom-ie,
#bg-bottom-overlay-ie  {
	display: block;
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 451px;
	overflow: hidden;
}

#bg-bottom,
#bg-bottom-overlay  {
	background: none;
}



/* hacks for RokSlide */

.tab-pane {
	margin-left: 10px;
}

/* hack to center align floated slider tabs */

#rokslide-wrapper {
	display: inline-block;
	text-align: center;
}

#rokslide-wrapper del {
	display: inline-block;
	
}

#rokslide-toolbar li {
	float: left;
}

#rokslide-toolbar li span {
	float: left;
}

/* hacks for main menu */

#horiz-menu li li a {
	width: 98%;
}

#horiz-menu a {
	line-height: 39px;
}

#horiz-menu li.active span.topdaddy span.selector {
	bottom: 4px;
}

#topmodules,
#bottommodules {
	zoom: 1;
}

#header, div.loginelement .inputbox, #mod-search input {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/header-bg.png', sizingMethod='scale');
	background: none;
}

#horiz-menu {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/menu-bg.png', sizingMethod='scale');
	background: none;
}

.shadow-1 {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/column-shadow-left.png', sizingMethod='crop');
	background: none;
}

.shadow-2 {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/column-shadow-right.png', sizingMethod='crop');
	background: none;
}

.shadow-3 {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/column-shadow-middle.png', sizingMethod='scale');
	background: none;
}

#body-shadow-left {
	background: none;
}

#body-shadow-right {
	background: none;
}

#bg-top-overlay {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/top-bg-overlay.png', sizingMethod='scale');
	background: none;
}

#bg-bottom-overlay-ie {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/bottom-bg-overlay.png', sizingMethod='scale');
	background: none;
}

.accent .accent-right {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/accent-top-right.png', sizingMethod='scale');
	background: none;
}

.accent .accent-left  {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/accent-top-left.png', sizingMethod='scale');
	background: none;
}

.bottom .accent .accent-right  {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/accent-bottom-right.png', sizingMethod='scale');
	background: none;
}

.bottom .accent .accent-left {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/accent-bottom-left.png', sizingMethod='scale');
	background: none;
}

td.maincol, td.secondcol, td.thirdcol {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/column-shadow.png', sizingMethod='scale');
	background: none;
}

#maincol .accent-top, #secondcol .accent-top, #thirdcol .accent-top {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/accent-top-left.png', sizingMethod='crop');
	background: none;
}


#maincol .accent-top .right, #secondcol .accent-top .right, #thirdcol .accent-top .right {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/accent-top-right.png', sizingMethod='crop');
	background: none;
}

#maincol .accent-bottom, #secondcol .accent-bottom, #thirdcol .accent-bottom {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/accent-bottom-left.png', sizingMethod='crop');
	background: none;
}

#maincol .accent-bottom .right, #secondcol .accent-bottom .right, #thirdcol .accent-bottom .right {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/accent-bottom-right.png', sizingMethod='crop');
	background: none;
}

#horiz-menu li.active span span.selector,
#horiz-menu li:hover span span.selector,
#horiz-menu li.sfHover span span.selector {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $path; ?>/images/menu-accent.png', sizingMethod='crop');
	background-image: none;
}
