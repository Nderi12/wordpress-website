<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an mediapicker control
 */
class Hank_Options_ImagePicker extends Hank_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'image-picker';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>
			<div class="options-control-inputs">
				<image-upload v-bind:value="value" v-on:change="triggerChange" />
			</div>
		<?php
	}
}
