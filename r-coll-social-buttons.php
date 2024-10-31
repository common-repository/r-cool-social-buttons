<?php 

/*
Plugin Name: R-Cool-Social-Buttons
Plugin URI: 
Description: Scroll Up plugin is Simple  wordpress plugin for share your content. 
Author: Rasel
Version: 1.0
Author URI: http://pristine-bd.com/
*/



// load jquery.scrollUp.js
 function rasel_rcsb_js_file() {
	
	wp_enqueue_style( 'rasel_rcsb_font_awesome', plugins_url( '/assets/font-awesome/css/font-awesome.min.css' , __FILE__ ), array(), '4.2.0', 'all');
	wp_enqueue_style( 'rasel_rcsb_plugin_css', plugins_url( '/assets/cool-share/plugin.css' , __FILE__ ), array(), '1.0', 'all');
	wp_enqueue_script('rasel_rcsb_plugin_js_file', plugins_url( '/assets/cool-share/plugin.js' , __FILE__ ), array( 'jquery' ), '', '');
	// wp_enqueue_script('rasel_rcsb_demo_js_file', plugins_url( '/assets/js/demo.js' , __FILE__ ), array( 'rasel_rcsb_plugin_js_file' ), '', '');

}
add_action( 'wp_enqueue_scripts', 'rasel_rcsb_js_file' );
 	

function rasel_rcsb_demo_js_file() {

?>

<script >
	jQuery(function ($){


	var url = '<?php echo "aaa"; ?>';

	var options = {

		twitter: {
			text: 'Check out this awesome jQuery Social Buttons Plugin! ',
			via: 'Tutorialzine'
		},

		facebook : true,
		googlePlus : true
	};

	$('.socialShare').shareButtons(url, options);

	// You can also share to pinterest and tumblr:

	var options = {

		// Pinterest requires a image to be "pinned"

		pinterest: {
			media: 'http://example.com/image.jpg',
			description: 'My lovely picture'
		},

		// Tumblr takes a name and a description

		tumblr: {
			name: 'jQuery Social Buttons Plugin!',
			description: 'There is a new article on tutorialzine.com page! Check out!'
		}
	};



});

</script>

<?php

}
add_action('wp_footer', 'rasel_rcsb_demo_js_file');

// 

function rasel_rcsb_single_post($content) {
   if(is_single()) {
      $content.= '<span class="socialShare">Share</span>';
  
   }
   return $content;
}
add_filter ('the_content', 'rasel_rcsb_single_post');

//

function rasel_rcsb_span_shortcode ($content = null) {
	return '<span class="socialShare">'.$content.'</span>';
}

add_shortcode('r-cool-social-buttons', 'rasel_rcsb_span_shortcode');

// [r-cool-social-buttons]

?>