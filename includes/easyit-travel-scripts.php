<?php



function easyit_travel_scripts(){ 

		wp_enqueue_style('easyit-travel-style',plugins_url().'/easyit-travel-plugin/css/style.css'); 

		// wp_enqueue_script('easyit-travel-script',

		//  plugins_url().'/easyit-travel-plugin/js/script.js', __FILE__ );	 

   		wp_enqueue_style('jquery-ui-style', 'https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css');

   		wp_deregister_script( 'jquery' );

   		wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', null, '3.3.1', true);

   		wp_enqueue_script('jquery'); 

   		wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', 'jquery', '1.12.1', true);

   		wp_enqueue_script( 'script.js',

   		 plugins_url( ) . '/easyit-travel-plugin/js/script.js',

   		 array('jquery', 'jquery-ui'), '1.0', true );



   

	}



add_action('wp_enqueue_scripts','easyit_travel_scripts');



 

