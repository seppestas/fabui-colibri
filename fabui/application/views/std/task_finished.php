<?php
/**
 * 
 * @author Krios Mane
 * @author Daniel Kesler
 * @version 0.1
 * @license https://opensource.org/licenses/GPL-3.0
 * 
 */

/* variable initialization */
if( !isset($z_height_save_message) ) $z_height_save_message = _("Z height is <strong><span class=\"z-height\"></span></strong>. Do you want to save it and override the value for the next prints?");

?>
<div class="row">
	<div class="col-sm-6">
		<div class="text-center">
			<h1>
				<span class="fabtotum-icon">
				<i style="font-size:200px;" class="fabui-core"></i>
				</span>
			</h1>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="smart-form">
			<fieldset>
				<section>
					<label class="label"><?php echo _("Duration");?>: <span class="pull-right"><span class="elapsed-time"></span></span></label>
				</section>
				<!--
				<div class="row" id="save-z-height-section">
					<section class="col col-9">
						<label class="label"><?php echo $z_height_save_message; ?></label>
					</section>
					<section class="col col-3">
						<a style="padding:6px 10px 5px" href="javascript:void(0);" class="btn btn-default btn-block save-z-height"><i class="fa fa-save"></i> <?php echo _("Yes");?></a>
					</section>
				</div>
				-->
				<section>
					<div class="rating">
						<input type="radio" name="quality" id="quality-10">
						<label for="quality-10"><i class="fa fa-star"></i></label>
						<input type="radio" name="quality" id="quality-9">
						<label for="quality-9"><i class="fa fa-star"></i></label>
						<input type="radio" name="quality" id="quality-8">
						<label for="quality-8"><i class="fa fa-star"></i></label>
						<input type="radio" name="quality" id="quality-7">
						<label for="quality-7"><i class="fa fa-star"></i></label>
						<input type="radio" name="quality" id="quality-6">
						<label for="quality-6"><i class="fa fa-star"></i></label>
						<input type="radio" name="quality" id="quality-5">
						<label for="quality-5"><i class="fa fa-star"></i></label>
						<input type="radio" name="quality" id="quality-4">
						<label for="quality-4"><i class="fa fa-star"></i></label>
						<input type="radio" name="quality" id="quality-3">
						<label for="quality-3"><i class="fa fa-star"></i></label>
						<input type="radio" name="quality" id="quality-2">
						<label for="quality-2"><i class="fa fa-star"></i></label>
						<input type="radio" name="quality" id="quality-1">
						<label for="quality-1"><i class="fa fa-star"></i></label>
						Quality of the <?php echo isset($type_label) ? strtolower($type_label) : ucfirst($type); ?>
					</div>
				</section>
				<div class="row">
					<section class="col col-6"><a style="padding:6px 10px 5px" href="javascript:void(0);" class="btn btn-default btn-block restart-task"><i class="fa fa-refresh"></i> <?php echo _("Restart");?> <?php echo isset($type_label) ? $type_label : ucfirst($type); ?></a></section>
					<section class="col col-6"><a style="padding:6px 10px 5px" href="javascript:void(0);" class="btn btn-default btn-block new-task"><i class="fa fa-lg fa-fw icon-fab-<?php echo $type ?>"></i> <?php echo _("New");?> <?php echo isset($type_label) ? $type_label : ucfirst($type); ?></a></section>
				</div>
			</fieldset>
		</div>
	</div>
</div>
