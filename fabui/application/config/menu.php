<?php
/**
 * 
 * @author Krios Mane
 * @version 0.1
 * @license https://opensource.org/licenses/GPL-3.0
 * 
 */

$config['menu'] = array(
	'dashboard' => array(
		'title' => _("Dashboard"),
		'icon' => 'fa fa-dashboard',
		'url' => 'dashboard'
	),
	'make' => array(
		'title' => _("Make"),
		'icon' => 'fabui-core',
		'sub' => array(
			'print' => array(
				'title' => _("Print"),
				'icon' => 'fabui-print',
				'url' => 'make/print'
			),
			'mill' => array(
				'title' => _("Mill"),
				'icon' => 'fabui-subtractive',
				'url' => 'make/mill'
			),
			'scan' => array(
				'title' => _("Scan"),
				'icon' => 'fabui-scan',
				'url' => 'scan'
			),
			'history' => array(
				'title' => _("History"),
				'icon' => 'fa-history',
				'url' => 'history'
			)
		)
	),
	'jog' => array(
		'title' => _("Jog"),
		'icon' => 'fabui-jog',
		'url' => 'jog'
	),
	'projectsmanager' => array(
		'title' => _("Project manager"),
		'icon' => 'fa-cubes',
		'url' => 'projectsmanager'
	),
	'maintenance' => array(
		'title' => _("Maintenance"),
		'icon' => 'fa-wrench',
		'sub' => array(
			'head' => array(
				'title' => _("Head"),
				'icon' => 'fabui-head-2',
				'url' => 'maintenance/head'
			),
			'spool' => array(
				'title' => _("Spool management"),
				'icon' => 'fabui-spool-front',
				'url' => 'maintenance/spool-management'
			),
			'bedcalibration' => array(
				'title' => _("Bed calibration"),
				'icon' => 'fabui-bed',
				'url' => 'maintenance/bed-calibration'
			),
			'nozzle' => array (
				'title' => _("Nozzle"),
				'icon' => 'fabui-nozzle',
				'sub' => array(
					'height' => array(
						'title' => _("Height calibration"),
						'icon' => 'fa-arrows-v',
						'url' => 'maintenance/nozzle-height-calibration'
					),
					'pidtune' => array(
						'title' => _("PID tune"),
						'icon' => 'fa-thermometer-three-quarters',
						'url' => 'maintenance/nozzle-pid-tune'
					)
				)
			),
			'probecalibration' => array(
				'title' => _("Probe calibration"),
				'icon' => 'fa-level-down',
				'sub'  => array(
					'angle' => array(
						'title' => _("Angle calibration"),
						'icon' => 'fa-angle-left',
						'url' => 'maintenance/probe-angle-calibration'
					)
				)
			),
			'feedercalibration' => array(
				'title' => _("Feeder"),
				'icon' => 'fabui-feeder',
				'sub'  => array(
					'profiles' => array(
						'title' => _("Profiles"),
						'icon' => 'fa-bars',
						'url' => 'maintenance/feeder-profiles'
					),
					'length' => array(
						'title' => _("Step calibration"),
						'icon' => 'fabui-e-mode',
						'url' => 'maintenance/feeder-calibration'
					),
					'angle' => array(
						'title' => _("Engage"),
						'icon' => 'fa-hand-o-right',
						'url' => 'maintenance/feeder-engage'
					)
				)
			),
			'4thaxis' => array(
				'title' => _("4th axis"),
				'icon' => 'fa-arrows-h',
				'url' => 'maintenance/4th-axis'
			),
			'firstsetup' => array(
				'title' => _("First setup"),
				'icon' => 'fa-magic',
				'url' => 'maintenance/first-setup'
			),
			'firmware' => array(
				'title' => _("Firmware"),
				'icon' => 'fa-microchip',
				'url' => 'maintenance/firmware'
			),
			'systeminfo' => array(
				'title' => _("System info"),
				'icon' => 'fa-info-circle',
				'url' => 'maintenance/system-info'
			)
		)
	),
	'settings' => array (
		'title' => _("Settings"),
		'icon' => 'fa-cogs',
		'sub' => array(
			'hardware' => array(
				'title' => _("Hardware"),
				'icon' => 'fa-cog',
				'url' => 'settings/hardware'
			),
			'network' => array(
				'title' => _("Network"),
				'icon' => 'fa-globe',
				'url' => 'settings/network'
			),
			'raspicam' => array(
				'title' => _("Raspicam"),
				'icon' => 'fa-video-camera',
				'url' => 'settings/cam'
			)
		)
	),
	'updates' => array(
 		'title' => _("Updates"),
 		'icon' => 'fa fa-refresh',
 		'url' => 'updates'
	),
	'support' => array(
 		'title' => _("Support"),
 		'icon' => 'fa-life-ring',
 		'url' => 'support'
	),
	'plugin' => array(
 		'title' => _("Plugins"),
 		'icon' => 'fa-plug',
 		'url' => 'plugin'
	),
 );
 
$CI =& get_instance();
$CI->load->helper('plugin_helper');

extendMenuWithPlugins($config['menu']);
 
?>
