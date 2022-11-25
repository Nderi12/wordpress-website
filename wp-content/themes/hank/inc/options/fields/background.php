<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an colorpicker control
 */
class Hank_Options_Background extends Hank_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'background';

	public $default = array(
		'image' => array(
			'id'  => -1,
			'url' => false
		),
		'color'      => '#fff',
		'repeat'     => 'repeat',
		'attachment' => 'scroll',
		'position'   => 'top left',
		'x'          => 'auto',
		'y'          => 'auto',
		'size'       => 'auto',
		'width'      => 'auto',
		'height'     => 'auto'
	);
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		$name = '_options-control-background-' . $this->id;
		?>
			<input type="checkbox" class="options-control-toggle" id="<?php echo esc_attr( $name ) ?>-toggler" />
			<label class="button" for="<?php echo esc_attr( $name ) ?>-toggler"><?php _ex( 'Edit Background Settings', 'options', 'hank' ) ?></label>
			<div class="options-control-inputs">
				<background v-bind:value="data" v-on:change="triggerChange"></background>
			</div>
		<?php
	}
}
