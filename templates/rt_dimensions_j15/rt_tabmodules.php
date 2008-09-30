<?php 
defined( '_JEXEC' ) or die( 'Restricted index access' );


function outputTabModules(&$document, $module, $counter) {
	
	$max_mods_per_row = $document->params->get("maxModsPerRow", 3);
	
	if ($document->countModules($module["module"]) > $max_mods_per_row) {
		$cols = $max_mods_per_row;
	} else {
		$cols = $document->countModules($module["module"]);
	}

	echo "<div class=\"tab-pane\" id=\"tab-$counter-pane\">\n";
	echo "<h1 class=\"tab-title\"><span>" . $module["title"] . "</span></h1>\n";
	echo "<div class=\"padding mmpr-" . $cols . "\">\n";
	
	$renderer	= $document->loadRenderer( 'modules' );
	$options	= array( 'style' => 'rounded' );
	echo $renderer->render( $module["module"], $options, null );
	echo "</div>\n";
	echo "</div>\n";
	
}

function displayTabs(&$document) {
	global $modules_list;
	
	$template_width = $document->params->get("templateWidth", "950");
	$module_slider_height = $document->params->get("moduleSliderHeight", 200);

	if (intval($template_width) > 0) {
		$module_slider_width = intval($template_width) - 50;
	} else {
		$module_slider_width = 700;
	}
	
	$module_count = 0;
	foreach ($modules_list as $module) {
		if ($document->countModules($module["module"]) > 0) $module_count++;
	}
	
	if ($module_count > 0) {
		echo "<script type=\"text/javascript\" src=\"" . $document->baseurl . "/templates/" . $document->template . "/js/rokslidestrip.js\"></script>\n";
		echo "<script type=\"text/javascript\">
					window.addEvent('domready', function() {
						var mySlideModules = new RokSlide($('moduleslide'), {
							fx: {
								wait: true,
								duration: 1000
							},
							scrollFX: {
								transition: Fx.Transitions.Cubic.easeIn
							},
							dimensions: {
								width: $module_slider_width,
								height: $module_slider_height
							}
						});
					});
					</script>\n";
		echo '<div id="moduleslide">';
		$counter = 0;

		foreach ($modules_list as $module) {
			if ($document->countModules($module["module"])) {
				outputTabModules($document, $module, $counter++);
			}
		}
		echo '</div>';
	}
}


?>