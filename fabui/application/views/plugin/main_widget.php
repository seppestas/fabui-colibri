<div class="tab-content padding-10">
			
	<div class="tab-pane fade in" id="installed-tab">
	
	<?php if(count($installed_plugins) > 0): ?>

	<table class="table table-striped table-forum">
		<thead>
			<tr>
				<th><?php echo _("Plugin");?></th>
				<th class="text-center hidden-xs"><?php echo _("Version");?></th>
				<th class="text-center hidden-xs"><?php echo _("Author");?></th>
			</tr>
		</thead>
		
		<tbody>
		
		<?php foreach($installed_plugins as $plugin => $plugin_info): ?>
		
			<tr>
				<td>
					<h4>
						<?php echo $plugin_info['name'] ?>
						<small><?php echo $plugin_info['description'] ?> | <a class="no-ajax" target="_blank" href="<?php echo $plugin_info['plugin_uri'] ?>"> <?php echo _("visit plugin site");?></a></small>
					</h4>
					<p class="margin-top-10">
						<?php if(isPluginActive($plugin)):  ?>
						<button class="btn btn-xs btn-warning action-button" data-action="deactivate" data-title="<?php echo $plugin ?>" title="Deactivate"><?php echo _("Deactivate");?></button>	
					<?php else: ?>
						<button class="btn btn-xs btn-success action-button" data-action="activate" data-title="<?php echo $plugin ?>" " title="Activate"><?php echo _("Activate");?></button>&nbsp;
						<button class="btn btn-xs btn-danger remove action-button" data-name="<?php echo $plugin_info['name'] ?>" data-action="remove" data-title="<?php echo $plugin ?>" title="Remove"><?php echo _("Remove"); ?></button>
					<?php endif; ?>
					</p>
				</td>
				<td class="text-center hidden-xs"><?php echo $plugin_info['version']; ?></td>
				<td class="text-center hidden-xs">
					<a class="no-ajax" target="_blank" href="<?php echo $plugin_info['author_uri'] ?>"><?php echo $plugin_info['author'] ?></a>
				</td>
			</tr>
		<?php endforeach; ?>
				
		</tbody>
	
	</table>
	
	<?php else: ?>
		
		<h2 class="text-center"><i class="fa fa-plug"></i> <?php echo _('No plugin installed');?></h2>
		<h6 class="text-center"><?php echo _('Click "Upload" button to upload a new plugin');?></h6>
		<h6 class="text-center"><?php echo _('Or check the "Online" plugin repository');?></h6>
		
	<?php endif; ?>
	
	</div>
	
	<div class="tab-pane fade in" id="online-tab">
		
		<div id="online-table">
			<h2 class="text-center"><i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i> Checking online repository...</h2>
		</div>
	</div>
	
	<div class="tab-pane fade in" id="add-new-tab">
		<?php if(isset($error)): ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="alert alert-warning">
						<i class="fa fa-warning"></i> <?php echo $error; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="well">
					<?php if(isset($installed)): ?>
						<h2>Installing Plugin: <?php echo $file_name; ?></h2>
						<p>Unpacking the package... </p>
						<p>Installing the plugin...</p>
						<p>Plugin installed successfully...</p>
						<a href="<?php echo "plugin"; ?>">Return to Plugins page</a>
					<?php else: ?>
					<form class="form-inline" enctype="multipart/form-data">

						<fieldset>
							<legend>
								If you have a plugin in .zip format, you may install it by uploading it here.
							</legend>
							<div class="form-group">
								<input type="file" class="btn btn-default" id="plugin-file" name="plugin-file" accept=".zip">
							</div>
							<button type="button" id="install-button" class="btn btn-primary disabled" style="margin-left:5px;">Install now</button>
							
						</fieldset>
					</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="tab-pane fade in active" id="create-new-tab">
		
		<div class="smart-form">
			<form action="" class="new-plugin-meta" id="plugin-meta-form">
			
			<header>New Plugin Creator</header>
			<fieldset>
				<div class="row">
					<section class="col col-6">
						<label class="label">Name</label>
						<label class="input">
							<input type="text" class="plugin-adaptive-meta" id="plugin-name" name="plugin_name" placeholder="My New Plugin">
						</label>
					</section>
					
					<section class="col col-6">
						<label class="label">Short name</label>
						<label class="input">
							<input type="text" class="plugin-adaptive-meta" id="plugin-slug" name="plugin_slug" placeholder="my_new_plugin">
						</label>
					</section>
					
					
				</div>
				<div class="row">
					<section class="col col-6">
						<label class="label">Description</label>
						<label class="input">
							<input type="text" id="plugin-description" name="plugin_description" placeholder="Some description">
						</label>
					</section>
					
					<section class="col col-6">
						<label class="label">Version</label>
						<label class="input">
							<input type="text" id="plugin-version" name="plugin_version" placeholder="0.10.0">
						</label>
					</section>
				</div>
				
				<div class="row">
					<section class="col col-6">
						<label class="label">Author name</label>
						<label class="input">
							<input type="text" id="plugin-author" name="author_name" placeholder="Name Surname">
						</label>
					</section>
					
					<section class="col col-6">
						<label class="label">Author URL</label>
						<label class="input">
							<input type="text" id="plugin-author_url" name="author_url" placeholder="http://your.contact.url/">
						</label>
					</section>
				</div>
				
				<div class="row">
					<section class="col col-6">
						<label class="label">Menu Title</label>
						<label class="input">
							<input type="text" id="plugin-menu-0-title" name="menu_title" placeholder="My New plugin">
						</label>
					</section>
					
					<section class="col col-6">
						<label class="label">Menu Location</label>
						<label class="input">
							<input type="text" id="plugin-menu-0-url" name="menu_location" placeholder="/my_new_plugin">
						</label>
					</section>
				</div>
				
				<div class="row">
					<section class="col col-6">
						<label class="label">Github Repository</label>
						<label class="input">
							<input type="text" id="plugin-url" name="plugin_url"placeholder="https://github.com/MyUserName/my_new_plugin">
						</label>
					</section>
				</div>
				
				<div class="row">
					<section>&nbsp;</section>
				</div>
				
				<div class="text-center row">
					<section>
						<button class="btn btn-lg btn-primary" type="submit" id="create-new-plugin">Generate Plugin</button>
					</section>
				</div>
			</fieldset>
		</div>
		
		</form>
	</div>
		
</div>

