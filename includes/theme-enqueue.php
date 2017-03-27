<?php

class my_theme_enqueue {
	
	function theme_scripts() {

		wp_enqueue_script( 'my-theme-main-js', MY_THEME_BUILD_URI. '/js/scripts.js', array( 'jquery' ), MY_THEME_VERSION, false );
		wp_enqueue_style( 'my-theme-main-css', MY_THEME_BUILD_URI. '/css/styles.css', array(), MY_THEME_VERSION, 'all' );
		wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), MY_THEME_VERSION, 'all' );

		$local_object = array(
			'api_url'            => rest_get_url_prefix() . '/wp/v2/',
			'template_directory' => get_template_directory_uri() . '/',
			'nonce'              => wp_create_nonce( 'wp_rest' ),
			'is_admin'           => current_user_can( 'administrator' ),
			'site_title'         => get_bloginfo( 'name' ),
		);

		wp_localize_script( 'my-theme-main-js', 'wp_config', $local_object );
	}

}
	
?>
