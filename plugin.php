<?php
namespace Ele_Pack;

class Ele_Pack_Plugin{

    private static $_instance = null;
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

    public function ele_pack_widget_scripts(){
        wp_register_script( 'main_js', plugins_url( '/widgets/assets/js/main.js', __FILE__ ), [ 'jquery' ], false, true );
    }

    public function ele_pack_widget_styles(){
        wp_register_style( 'main_css', plugins_url( '/widgets/assets/css/main.css', __FILE__ ));
    }

    private function ele_pack_widgets_files() {
		require_once( __DIR__ . '/widgets/ele-card/ele-card.php' );
	}

    public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->ele_pack_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ele_Card() );

	}

    public function __construct(){
        add_action( 'elementor/frontend/after_register_scripts', [ $this, 'ele_pack_widget_scripts' ] );
        add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_styles' ] );
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
    }
}

Ele_Pack_Plugin::instance();