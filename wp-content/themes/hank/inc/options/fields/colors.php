<?php
defined( 'ABSPATH' ) or die();


class Hank_Options_Colors extends Hank_Options_Control
{
	public $type = 'colors';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>
		
			<div class="options-control-inputs">
				<colors v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></colors>
			</div>

		<?php
	}
}
