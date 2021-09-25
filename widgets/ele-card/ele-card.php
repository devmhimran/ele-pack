<?php


class Ele_Card extends \Elementor\Widget_Base{
    public function get_name() {
        return 'ele-card';
    }

	public function get_title() {
        return 'Ele Card';
    }

	public function get_icon() {
        return 'fa fa-code';
    }

	public function get_categories() {
        return [ 'basic' ];
    }

	public function get_script_depends() {
        return [ 'main_js','ele_pack' ];
    }

	public function get_style_depends() {
        return [ 'main_css','ele_pack' ];
    }

	protected function _register_controls() {
        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'widget_title',
			[
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Default title', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo '<h2 class="ele-heading">' . $settings['widget_title'] . '</h2>';
    }

	protected function _content_template() {}
}