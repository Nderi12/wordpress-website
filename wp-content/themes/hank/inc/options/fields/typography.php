<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an colorpicker control
 */
class Hank_Options_Typography extends Hank_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'typography';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>

			<div class="options-control-inputs">
				<typography v-bind:value="data" v-bind:fonts="_hankfonts" v-on:change="triggerChange"></typography>
			</div>
		
		<?php
	}
}
