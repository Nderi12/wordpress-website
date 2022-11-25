<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an colorpicker control
 */
class Hank_Options_Color extends Hank_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'color-picker';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>
			<div class="options-control-inputs">
				<color v-bind:value="data" v-on:change="triggerChange"></color>
			</div>
		<?php
	}
}
