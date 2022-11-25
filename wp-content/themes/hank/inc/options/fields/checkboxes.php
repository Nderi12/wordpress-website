<?php
defined( 'ABSPATH' ) or die();


/**
 * Radio buttons control
 */
class Hank_Options_Checkboxes extends Hank_Options_Control
{
	public $type = 'checkboxes';
	public $default = array();

	public function render_content() {
		?>

			<div class="options-control-inputs">
				<checkboxes v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></checkboxes>
			</div>
		
		<?php
	}
}
