<?php
/**
 * 
 * @author Krios Mane
 * @author Fabtotum Development Team
 * @version 0.1
 * @license https://opensource.org/licenses/GPL-3.0
 * 
 */
?>
<script type="text/javascript">
	var mode;
	var filament;
	var is_pro_head = <?php echo isset($head['feeder']) ? 'true' : 'false' ?>;
	
	$(document).ready(function() {
		setFilamentDescription('<?php echo isset($settings['filament']['type']) ? $settings['filament']['type'] : 'pla' ?>');
		$(".mode-choise").on('click', clickSetMode);
		$(".filament").on('click', filamentButtonClick);
		$("#restart-button").on('click', restartAction);
	});
	
	/**
	*
	**/
	function handleStep()
	{

		var step = $('.wizard').wizard('selectedItem').step;
		if(step == 2){
			if(is_pro_head && mode == 'load'){
				heatsNozzle();
				return false;
			}
		}else if(step == 3)
		{
			doSpoolAction();
			return false;
		}

		return true;
	}
	
	/**
	*
	**/
	function checkWizard()
	{
		var step = $('.wizard').wizard('selectedItem').step;
		console.log('Check', step);
		switch(step){
			case 1: // Choose mode
				disableButton('.button-prev');
				disableButton('.button-next');
				$("#main-widget-spool-management").find('header').find('h2').html(_("Spool management"));
				break;
			case 2: // Filament
				enableButton('.button-prev');
				enableButton('.button-next');
				break;
			case 3: // Get ready
				enableButton('.button-prev');
				enableButton('.button-next');
				break;
			case 4: // Finish
				disableButton('.button-prev');
				disableButton('.button-next');
				break;
		}
	}
	
	/**
	*
	**/
	function clickSetMode()
	{
		var action = $(this).attr('data-action');
		setMode(action);
	}
	/**
	*
	**/
	function setMode(action)
	{	
		mode = action;
		$(".get-ready-row").hide();
		$("#"+mode+"-row").show();
		
		switch(action)
		{
			case 'load':
				$("#filament-title").html('<?php echo _('Select filament to load')?>');
				$("#main-widget-spool-management").find('header').find('h2').html(_("Spool management") + " > " + _("Load spool"));
				break;
			case 'unload':
				$("#filament-title").html('<?php echo _('What filament are you going to unload?')?>');
				$("#main-widget-spool-management").find('header').find('h2').html(_("Spool management") + " > " + _("Unload spool"));
				break;
		}
		gotoWizardStep(2);
	}
	/**
	*
	**/
	function  filamentButtonClick()
	{
		var type = $(this).attr("data-type");
		setFilamentDescription(type);
	}
	/**
	*
	**/
	function setFilamentDescription(type)
	{	
		filament = type;
		$(".filament").addClass('btn-default').removeClass('bg-color-blueLight txt-color-white').find('span').html('');
		$("." + filament).addClass('bg-color-blueLight txt-color-white').removeClass('btn-default').find('span').html('<i class="fa fa-check"></i>');
		var html = $("#"+ filament +"_description").html();
		$("#filament-description").html(html);
		$(".extrusion-temperature").html($("#"+ filament +"_description").attr("data-temperature"));
	}
	/**
	*
	**/
	function doSpoolAction()
	{
		openWait("<i class='fa fa-circle-o-notch fa-spin'></i> <?php echo _("Please wait");?>");
		$.ajax({
			type: "POST",
			url: "<?php echo site_url("spool") ?>/" + mode + '/' + filament,
			dataType: 'json'
		}).done(function( response ) {
		closeWait();
		if(response.response == 'success'){
			if(mode == 'unload'){
				if(is_pro_head == true){
					$(".printing-head-pro-unload-final-step").show();
					$("#pro_head_unload_spool_gif").attr('src', '/assets/img/controllers/spool/pro_head_unload_filament_2.gif');
				}
				$("#restart-button").removeClass('hidden');
			}
			gotoWizardFinish();
		}else{
			fabApp.showErrorAlert(response.message);
		}
	  });
	}
	/**
	*
	*/
	function restartAction()
	{
		setMode('load')
	}
	/**
	*
	**/
	function heatsNozzle()
	{
		openWait("<i class='fa fa-gear-notch fa-spin'></i> <?php echo _("Heating nozzle");?>");
		$.ajax({
			type: "POST",
			url: "<?php echo site_url("spool") ?>/heatsNozzle/" + filament,
			dataType: 'json'
		}).done(function( response ) {
			closeWait();
			if(response.response == 'success'){
				gotoWizardStep(3);
				$("#pro_head_load_spool_gif").attr('src', '/assets/img/controllers/spool/pro_head_load_filament.gif');
			}else{
				fabApp.showErrorAlert(response.message);
			}
	  });
	}
</script>
