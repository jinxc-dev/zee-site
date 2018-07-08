	<div class="tab-inner">

	<?php if($module['enable_development_mode'] && $warning_development_files_permission ) {  ?>
		<?php foreach( $warning_development_files_permission as $warning ) { ?>
			<div class="warning"><?php echo $warning; ?></div>
		<?php } ?>

	<?php } ?>	
	<table class="form">
		<tr>
			<td><?php echo $this->language->get('text_default_theme'); ?></td>
			<td>
				<div class="group-options theme-skins clear">
					<select name="themecontrol[skin]">
						<option value="">default</option>
					<?php foreach( $skins as $skin ): ?>
						<option value="<?php echo $skin;?>" <?php if( $skin==$module['skin']){ ?> selected="selected" <?php } ?>><?php echo $skin;?></option>
					<?php endforeach;?>
					</select>
					
					<div class="clear"></div>
				</div>
	
			</td>
		</tr>
	
		<tr>
			<td><?php echo $this->getLang('entry_theme_width');?></td>
			<td>
				<input  name="themecontrol[theme_width]" value="<?php echo $module['theme_width'];?>">
				<p><i><?php echo $this->language->get('text_explain_theme_width');?></i></p>
			</td>
		</tr>
		<tr class="highlight">
		<td><?php echo $this->getLang('entry_enable_copyright');?></td>
		<td>
			<select name="themecontrol[enable_custom_copyright]">
			
			<?php foreach( $yesno as $v=>$op ): ?>
				<option value="<?php echo $v;?>" <?php if( $v==$module['enable_custom_copyright']){ ?> selected="selected" <?php } ?>><?php echo $op;?></option>
			<?php endforeach;?>
			</select>
		</td>
	</tr>
		<tr>
			<td><?php echo $this->getLang('copyright');?></td>
			<td>
				<textarea cols="40" rows="3" name="themecontrol[copyright]"><?php echo $module['copyright'];?></textarea>
			</td>
		</tr>
		<tr>
			<td><?php echo $this->getLang('entry_responsive');?></td>
			<td>
				<select name="themecontrol[responsive]">
					<option value="0" <?php if( $module['responsive'] == 0 ){ echo 'selected="selected"';} ;?>><?php echo $this->getLang('no');?></option>
					<option value="1" <?php if( $module['responsive'] == 1 ){ echo 'selected="selected"';} ;?>><?php echo $this->getLang('yes');?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo $this->getLang('entry_enable_footer_center');?></td>
			<td>
				<select name="themecontrol[enable_footer_center]">
					<option value="0" <?php if( $module['enable_footer_center'] == 0 ){ echo 'selected="selected"';} ;?>><?php echo $this->getLang('no');?></option>
					<option value="1" <?php if( $module['enable_footer_center'] == 1 ){ echo 'selected="selected"';} ;?>><?php echo $this->getLang('yes');?></option>
				</select>

			</td>
		</tr>
		
		<tr>
			<td><?php echo $this->getLang('entry_enable_paneltool');?></td>
			<td>
				<select name="themecontrol[enable_paneltool]">
					<option value="0" <?php if( $module['enable_paneltool'] == 0 ){ echo 'selected="selected"';} ;?>><?php echo $this->getLang('no');?></option>
					<option value="1" <?php if( $module['enable_paneltool'] == 1 ){ echo 'selected="selected"';} ;?>><?php echo $this->getLang('yes');?></option>
				</select>
				<p><i><?php echo $this->language->get('enable_paneltool_explain'); ?></i></p>
			</td>
		</tr>
		 
	
	</table>
</div>