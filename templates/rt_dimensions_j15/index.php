<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );
define( 'YOURBASEPATH', dirname(__FILE__) );
require( YOURBASEPATH.DS."rt_styleswitcher.php");
JHTML::_( 'behavior.mootools' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<?php
	$modules_list						= '';
	$default_style    			= $this->params->get("defaultStyle", "style2");
	$template_width   			= $this->params->get("templateWidth", "950"); 
	$thirdcol_width					= $this->params->get("thirdcolWidth", "25%");
	$secondcol_width				= $this->params->get("secondcolWidth", "25%");
	
	$menu_name        			= $this->params->get("menuName", "mainmenu");
	$menu_type        			= $this->params->get("menuType", "splitmenu");
	$splitmenu_col					= $this->params->get("splitmenuCol", "secondcol");
	$default_font     			= $this->params->get("defaultFont", "default");
	$show_breadcrumbs 			= ($this->params->get("showBreadcrumbs", 0)  == 0)?"false":"true";

	// moomenu options
	$moo_bgiframe     			= ($this->params->get("moo_bgiframe'","0") == 0)?"false":"true";
	$moo_delay        			= $this->params->get("moo_delay", "500");
	$moo_duration     			= $this->params->get("moo_duration", "400");
	$moo_fps          			= $this->params->get("moo_fps", "100");
	$moo_transition   			= $this->params->get("moo_transition", "Expo.easeOut");	

	// rokzoom options
	$enable_rokzoom   			= ($this->params->get("enableRokzoom", 1)  == 0)?"false":"true";
	$zoom_resize_duration   = $this->params->get("zoom_resize_duration", "700");
	$zoom_opacity_duration  = $this->params->get("zoom_opacity_duration", "500");
	$zoom_transition   			= $this->params->get("zoom_transition", "Cubic.easeOut");

	// module title for moduleslider
	$module_slider_height 	= $this->params->get("moduleSliderHeight", 200);
	$max_mods_per_row				= $this->params->get("maxModsPerRow", 3);
	$ms_title1							= $this->params->get("msTitle1", "Group 1 Tab");	
	$ms_title2							= $this->params->get("msTitle2", "Group 2 Tab");	
	$ms_title3							= $this->params->get("msTitle3", "Group 3 Tab");	
	$ms_title4							= $this->params->get("msTitle4", "Group 4 Tab");	
	$ms_title5							= $this->params->get("msTitle5", "Group 5 Tab");		
	$ms_module1							= $this->params->get("msModule1", "user7");		
	$ms_module2							= $this->params->get("msModule2", "user8");			
	$ms_module3							= $this->params->get("msModule3", "user9");			
	$ms_module4							= $this->params->get("msModule4", "user10");			
	$ms_module5							= $this->params->get("msModule5", "user11");


	require(YOURBASEPATH .DS."rt_styleloader.php");
	require(YOURBASEPATH .DS."rt_tabmodules.php");
	require(YOURBASEPATH .DS."rt_utils.php");
	
	?>
	<link rel="shortcut icon" href="<?php echo $this->baseurl; ?>/images/favicon.ico" />
	<?php if($mtype=="moomenu" or $mtype=="suckerfish") :?>
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/rokmoomenu.css" rel="stylesheet" type="text/css" />
	<?php endif; ?>
		<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_css.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/<?php echo $tstyle; ?>.css" rel="stylesheet" type="text/css" />
	<?php if($enable_rokzoom=="true") :?>
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/rokzoom/rokzoom.css" rel="stylesheet" type="text/css" />
	<?php endif; ?>
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/rokslidestrip.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		div.wrapper { <?php echo $template_width; ?>padding:0;}
		td.secondcol { width: <?php echo $secondcol_width; ?>;}
		td.thirdcol { width: <?php echo $thirdcol_width; ?>;}
		.shadow-3 { width: <?php echo $raw_width; ?>px;}
	</style>
	<?php if (isIe7()) :?>
	<!--[if IE 7]>
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie7.css" rel="stylesheet" type="text/css" />
	<![endif]-->	
	<?php endif; ?>
	<?php if (isIe6()) :?>
	<!--[if lte IE 6]>
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie6.php?nocache=1" rel="stylesheet" type="text/css" />
	<style type="text/css">
	img { behavior: url(<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/iepngfix.htc); } 
	</style>
	<![endif]-->
	<?php endif; ?>
	<script type="text/javascript">tempus=<?php echo $tempus; ?></script>
	<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/roktempus.js"></script>
	<?php if($enable_rokzoom=="true") :?>
	<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/rokzoom/rokzoom.js"></script>
	<?php endif; ?>
	<?php if($mtype=="moomenu") :?>
	<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokmoomenu.js"></script>
	<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/mootools.bgiframe.js"></script>
	<script type="text/javascript">
	window.addEvent('domready', function() {
		new Rokmoomenu($E('ul.menu'), {
			bgiframe: <?php echo $moo_bgiframe; ?>,
			delay: <?php echo $moo_delay; ?>,
			animate: {
				props: ['opacity', 'width', 'height'],
				opts: {
					duration:<?php echo $moo_duration; ?>,
					fps: <?php echo $moo_fps; ?>,
					transition: Fx.Transitions.<?php echo $moo_transition; ?>
				}
			}
		});
	});
	</script>
	<?php endif; ?>	
	<?php if($mtype=="suckerfish" or $mtype=="splitmenu") :
		echo "<!--[if IE]>\n";		
	  include_once( "templates/". $this->template . "/js/ie_suckerfish.js" );
	  echo "<![endif]-->\n";
	endif; ?>	
	<?php if($enable_rokzoom=="true") :?>
	<script type="text/javascript">
		window.addEvent('load', function() {
			RokZoom.init({
				imageDir: '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/rokzoom/images/',
				resizeFX: {
					duration: <?php echo $zoom_resize_duration; ?>,
					transition: Fx.Transitions.<?php echo $zoom_transition; ?>,
					wait: true
				},
				opacityFX: {
					duration: <?php echo $zoom_opacity_duration; ?>,
					wait: false	
				}
			});
		});
	</script>
	<?php endif; ?>
	</head>
	<body <?php if($tempus!="false") echo 'id=' . $tempus .' '; ?>class="<?php echo $fontstyle; ?> <?php echo $tstyle; ?>">
		<!-- begin top part -->
		<div id="bg-top">
			<div id="bg-top-overlay"></div>
		</div>
		<!-- end top part -->
		<!-- start overall frame -->
		<div id="overall-frame">
			<!-- begin bottom part IE ONLY -->
			<div id="bg-bottom-ie">
				<div id="bg-bottom-overlay-ie"></div>
			</div>
			<!-- end bottom part ie -->
			<!-- start bottom part OTHER BROWSERS -->
			<div id="bg-bottom">
				<div id="bg-bottom-overlay">
					<!-- begin wrapper -->
					<div class="wrapper">
						<div id="top-shadow">
							<div class="shadow-1"></div>
							<div class="shadow-2"></div>
							<div class="shadow-3"></div>
							<!-- begin header -->
							<div id="header">
								<div id="logo-space"><a href="<?php echo $this->baseurl; ?>" class="nounder"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/logo.png" style="border:0;" alt="" id="logo" /></a><br /><span><b>Ultimate Frisbee Como</b></span></div>
							</div>
							<?php if ($this->countModules("top")) :?>
							<div id="mod-top">
								<jdoc:include type="modules" name="top" style="none" />
							</div>	
							<?php endif; ?>
							<?php if ($this->countModules("search")) :?>
							<div id="mod-search">
								<jdoc:include type="modules" name="search" style="none" />
							</div>	
							<?php endif; ?>
						</div>

						<div id="horiz-menu" class="<?php echo $mtype; ?>">
							<?php if($mtype != "module") :
								echo $mainnav;
							else: ?>
								<jdoc:include type="modules" name="toolbar" style="none" />
					    <?php endif; ?>	
						</div>
						<!-- end header -->
						<!-- begin inset -->
						<div id="inset">
							<jdoc:include type="modules" name="inset" style="none" />
						</div>
						<!-- end inset -->
						<!-- begin mainbody -->
						<div id="body-shadow-left">
							<div id="body-shadow-right">
								<div id="body">
									<table class="mainbody" border="0" cellspacing="0" cellpadding="0">
										<tr valign="top">
											<td class="maincol">
												<div id="maincol">
													<div class="accent"><div class="accent-left"></div><div class="accent-right"></div></div>
													<?php if ($show_breadcrumbs == "true") : ?>
														<jdoc:include type="module" name="breadcrumbs" style="none" />
													<?php endif; ?>
													<?php if ($this->countModules('user3') or $this->countModules('user4')) : ?>
														<div id="topmodules" class="spacer<?php echo $topmod_width; ?>">
															<?php if ($this->countModules('user3')) : ?>
																<div class="block">
																	<jdoc:include type="modules" name="user2" style="xhtml" />
																</div>
															<?php endif; ?>
															<?php if ($this->countModules('user4')) : ?>
																<div class="block">
																	<jdoc:include type="modules" name="user4" style="xhtml" />
																</div>
															<?php endif; ?>
														</div>
													<?php endif; ?>
													<div id="component">
														<div class="padding">
															<jdoc:include type="component" />
														</div>
													</div>
													<?php if ($this->countModules('user5') or $this->countModules('user6')) : ?>
														<div id="bottommodules" class="spacer<?php echo $bottommod_width; ?>">
															<?php if ($this->countModules('user5')) : ?>
																<div class="block">
																	<jdoc:include type="modules" name="user5" style="xhtml" />
																</div>
															<?php endif; ?>
															<?php if ($this->countModules('user6')) : ?>
																<div class="block">
																	<jdoc:include type="modules" name="user6" style="xhtml" />
																</div>
															<?php endif; ?>
														</div>
													<?php endif; ?>
												</div>
											</td>
											<?php if ($this->countModules('user1') or ($subnav and $splitmenu_col=="secondcol")) : ?>
												<td class="secondcol">
													<div id="secondcol">
														<div class="accent"><div class="accent-left"></div><div class="accent-right"></div></div>
														<?php if($subnav and $splitmenu_col=="secondcol") : ?>
															<div id="sub-menu">
																<?php echo $subnav; ?>
															</div>
														<?php endif; ?>
														<jdoc:include type="modules" name="user1" style="xhtml" />
													</div>
												</td>
											<?php endif; ?>
											<?php if ($this->countModules('user2') or ($subnav and $splitmenu_col=="thirdcol")) : ?>
												<td class="thirdcol">
													<div id="thirdcol">
														<div class="accent"><div class="accent-left"></div><div class="accent-right"></div></div>
														<?php if($subnav and $splitmenu_col=="thirdcol") : ?>
															<div id="sub-menu">
																<?php echo $subnav; ?>
															</div>
														<?php endif; ?>
														<jdoc:include type="modules" name="user2" style="xhtml" />
													</div>
												</td>
											<?php endif; ?>
										</tr>
										<tr>
											<td class="maincol bottom">
												<div class="accent"><div class="accent-left"></div><div class="accent-right"></div></div>
											</td>
											<?php if ($this->countModules('user1') or ($subnav and $splitmenu_col=="secondcol")) : ?>
											<td class="secondcol bottom">
												<div class="accent"><div class="accent-left"></div><div class="accent-right"></div></div>
											</td>
											<?php endif; ?>
											<?php if ($this->countModules('user2') or ($subnav and $splitmenu_col=="thirdcol")) : ?>
											<td class="thirdcol bottom">
												<div class="accent"><div class="accent-left"></div><div class="accent-right"></div></div>
											</td>
											<?php endif; ?>
										</tr>
									</table>	
								</div>
							</div>
						</div>
						<!-- end mainbody -->
						<!-- begin bottom panel -->
						<div id="bottom-modules">
							<div class="padding" >
								<?php displayTabs($this); ?>
							</div>
						</div>
						<div id="footer-bar">
							<div align="center"><h4>a <b>kinto</b> joint made with <a href="http://www.joomla.org/" title="Joomla" target="_blank">Joomla</a>. Design based on <a href="http://www.fullahead.org/" title="FullAhead" target="_blank">FullAhead</a> and <a href="http://www.rockettheme.com/" title="RocketTheme" target="_blank">RocketTheme</a></h4></div>

						</div>
						<div id="footer-shadow">
						<!--
							<div class="shadow-1"></div>
							<div class="shadow-2"></div>
							<div class="shadow-3"></div>
						-->						
						</div>
						<!--end body panel -->
					</div>
					<!-- end wrapper -->
				</div>
			</div>
			<!-- end bottom part OTHER BROWSERS -->
		</div>
		<!-- end overall frame -->
	</body>	
</html>
