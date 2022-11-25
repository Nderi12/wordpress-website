<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an dimension control
 */
class Hank_Options_Dimension extends Hank_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'dimension';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>

			<div class="options-control-inputs">
				<dimension v-bind:value="data" v-bind:choices="choices" v-on:change="triggerChange"></dimension>
			</div>
		
		<?php
	}
}
