<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an social icons control
 */
class Hank_Options_Icons extends Hank_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'icons';
	public $default = array();

	public function render_content() {
		?>
			<div class="options-control-inputs">
				<icons v-bind:value="data" v-bind:icons="_hankicons" v-on:change="triggerChange"></icons>
			</div>
		<?php
	}
}
