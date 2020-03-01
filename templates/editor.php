<fieldset class="wsuwp-plugin-campus-update__update-editor__wrapper">
	<?php wp_nonce_field( 'wsuwp_update_save', 'wsuwp_update' ); ?>
	<div class="wsuwp-plugin-campus-update__update-editor__field__wrapper">
		<div class="wsuwp-plugin-campus-update__update-editor__field__header">
			<h2 class="wsuwp-plugin-campus-update__update-editor__field__title">Update Status <span>(required)</span></h2>
			<div class="wsuwp-plugin-campus-update__update-editor__field__description">
				Update Status must be set to <strong>ON</strong> for the update to appear on the site. A status of <strong>OFF</strong> will remove it from display.   
			</div>
		</div>
		<label class="wsuwp-plugin-campus-update__update-editor__field--toggle">
			<input type="radio" value="on" name="wsu_update_status" class="wsuwp-plugin-campus-update__update-editor__field" <?php checked( 'on', $update->get( 'status' ) ); ?> />
			<span class="wsuwp-plugin-campus-update__update-editor__field__toggle-button">ON</span>
		</label><label class="wsuwp-plugin-campus-update__update-editor__field--toggle">
			<input type="radio" value="off"  name="wsu_update_status" class="wsuwp-plugin-campus-update__update-editor__field" <?php checked( 'off', $update->get( 'status' ) ); ?> />
			<span class="wsuwp-plugin-campus-update__update-editor__field__toggle-button">OFF</span>
		</label>
	</div>
	<div class="wsuwp-plugin-campus-update__update-editor__field__wrapper">
		<div class="wsuwp-plugin-campus-update__update-editor__field__header">
			<h2 class="wsuwp-plugin-campus-update__update-editor__field__title">Impacting: <span>(optional)</span></h2>
			<div class="wsuwp-plugin-campus-update__update-editor__field__description">
				Selected campuses will display as a list on the update notice.
			</div>
		</div>
		<label class="wsuwp-plugin-campus-update__update-editor__field--check-set">
			<input type="checkbox" name="wsu_update_impact[]" value="all" class="wsuwp-plugin-campus-update__update-editor__field" <?php if ( in_array( 'all', $update->get('impact') ) ) : ?>checked="checked"<?php endif; ?> /> All
		</label>
		<label class="wsuwp-plugin-campus-update__update-editor__field--check-set">
			<input type="checkbox" name="wsu_update_impact[]" value="pullman" class="wsuwp-plugin-campus-update__update-editor__field" <?php if ( in_array( 'pullman', $update->get('impact') ) ) : ?>checked="checked"<?php endif; ?> /> Pullman
		</label>
		<label class="wsuwp-plugin-campus-update__update-editor__field--check-set">
			<input type="checkbox" name="wsu_update_impact[]" value="spokane" class="wsuwp-plugin-campus-update__update-editor__field" <?php if ( in_array( 'spokane', $update->get('impact') ) ) : ?>checked="checked"<?php endif; ?> /> Spokane
		</label>
		<label class="wsuwp-plugin-campus-update__update-editor__field--check-set">
			<input type="checkbox" name="wsu_update_impact[]" value="tri-cities" class="wsuwp-plugin-campus-update__update-editor__field" <?php if ( in_array( 'tri-cities', $update->get('impact') ) ) : ?>checked="checked"<?php endif; ?> /> Tri-Cities
		</label>
		<label class="wsuwp-plugin-campus-update__update-editor__field--check-set">
			<input type="checkbox" name="wsu_update_impact[]" value="vancouver" class="wsuwp-plugin-campus-update__update-editor__field" <?php if ( in_array( 'vancouver', $update->get('impact') ) ) : ?>checked="checked"<?php endif; ?> /> Vancouver
		</label>
		<label class="wsuwp-plugin-campus-update__update-editor__field--check-set">
			<input type="checkbox" name="wsu_update_impact[]" value="everett" class="wsuwp-plugin-campus-update__update-editor__field" <?php if ( in_array( 'everett', $update->get('impact') ) ) : ?>checked="checked"<?php endif; ?> /> Everett
		</label>
		<label class="wsuwp-plugin-campus-update__update-editor__field--check-set">
			<input type="checkbox" name="wsu_update_impact[]" value="global-campus" class="wsuwp-plugin-campus-update__update-editor__field" <?php if ( in_array( 'global-campus', $update->get('impact') ) ) : ?>checked="checked"<?php endif; ?> /> Global Campus
		</label>
	</div>
	<div class="wsuwp-plugin-campus-update__update-editor__field__wrapper">
		<div class="wsuwp-plugin-campus-update__update-editor__field__header">
			<h2 class="wsuwp-plugin-campus-update__update-editor__field__title">Update Caption <span>(optional)</span></h2>
			<div class="wsuwp-plugin-campus-update__update-editor__field__description">
				Short <strong>5-15 word</strong> summary. Use only if no additional details are available (link field below) and not posted elsewhere.
			</div>
		</div>
		<?php wp_editor( $update->get( 'content' ), 'wsu_update_caption', array( 'editor_height' => 100 ) ); ?>
	</div>
	<div class="wsuwp-plugin-campus-update__update-editor__field__wrapper">
		<div class="wsuwp-plugin-campus-update__update-editor__field__header">
			<h2 class="wsuwp-plugin-campus-update__update-editor__field__title">Link To: <span>(optional)</span></h2>
			<div class="wsuwp-plugin-campus-update__update-editor__field__description">
				Link to additional information.
			</div>
		</div>
		<input type="text" name="wsu_update_link" class="wsuwp-plugin-campus-update__update-editor__field" value="<?php echo esc_url( $update->get( 'link' ) ); ?>" placeholder="URL" />
	</div>
</fieldset>
<style>

	.wsuwp-plugin-campus-update__update-editor__field[type=text],
	select.wsuwp-plugin-campus-update__update-editor__field {
		font-size: 1.25rem;
		padding: 0.5rem 0.75rem;
		height: auto !important;
		width: auto !important;
	}

	.wsuwp-plugin-campus-update__update-editor__field--check-set {
		margin-right: 1rem;
	}

	.wsuwp-plugin-campus-update__update-editor__field__title {
		font-size: 1.25rem !important;
		font-weight: 400  !important;
    	padding: 0 0 0.1rem !important;
	}

	.wsuwp-plugin-campus-update__update-editor__field__header {
		padding-bottom: 1rem;
	}

	.wsuwp-plugin-campus-update__update-editor__field__header span {
		font-size: 0.7rem;
	}

	.wsuwp-plugin-campus-update__update-editor__field__wrapper {
		padding-bottom: 2rem;
	}

	.wsuwp-plugin-campus-update__update-editor__separator {
		margin-bottom: 2rem;
	}

	.wsuwp-plugin-campus-update__update-editor__field--toggle--active,
	.wsuwp-plugin-campus-update__update-editor__field--toggle {
		display: inline-block;
		vertical-align: top;
	}

	.wsuwp-plugin-campus-update__update-editor__field__toggle-button {
		padding: 1.5rem 2rem;
		font-size: 1.5rem;
		font-weight: 600;
		border-radius: 3px 0 0 3px;
		background-color: #b5babe;
		color: #fff;
		display: inline-block;
	}

	.wsuwp-plugin-campus-update__update-editor__field:checked~span {
		background-color: #3f6b72;
	}

	.wsuwp-plugin-campus-update__update-editor__field--toggle:last-child .wsuwp-plugin-campus-update__update-editor__field__toggle-button {
		border-radius: 0 3px 3px 0;
	}

	.wsuwp-plugin-campus-update__update-editor__field--toggle input {
		display: none;
	}
</style>