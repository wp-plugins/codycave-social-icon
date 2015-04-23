<?php
/**
 * @package CodyCave Social Icon
 */
/*
Plugin Name: CodyCave Social Icon
Plugin URI: http://www.codycave.com/Plugins/social-icon/
Description: Codycave Social Icon is the most simplest and easy to use social icon ever. With some cool styles and beautiful color variations. 
Version: 1.0.0
Author: Codycave
Author URI: http://codycave.com
License: GPLv2 or later
Text Domain: Codycave Social Icon
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

//Load codycave Social style
function codycave_social_css() 
{
    wp_enqueue_style( 'codycave-social-css', plugins_url( '/css/codycaveSocial.css', __FILE__ ) );
}

add_action('init', 'codycave_social_css');

/*
....................................................................................
....................................................................................
@@@@@@@@@@@@@@@@@@@@ Font Awesome @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
....................................................................................
....................................................................................
*/

//Load fontawesome style
function codycave_fa_css() {
  global $wp_styles;
  $srcs = array_map('basename', (array) wp_list_pluck($wp_styles->registered, 'src') );
  if ( in_array('font-awesome.css', $srcs) || in_array('font-awesome.min.css', $srcs)  ) {
    /* echo 'font-awesome.css registered'; */
  } else {
    wp_enqueue_style('codycave_fa_css', plugins_url( '/assets/font-awesome/css/font-awesome.min.css', __FILE__ ) );
  }
}
add_action('init', 'codycave_fa_css', 99999);

//Main function of codycave_fa_shortcode
function codycave_fa_shortcode($atts) {
	extract(shortcode_atts(array(
      'name' => 'facebook',
     // 'size' => '2x',
      'url' => '',
      'style' => 'codycave_round',
 	), $atts));

	$value = '<a class="codycave-link" href="'.$url.'"><i id="'.$style.'" class="fa fa-'.$name.' fa-2x"></i></a>';

	return $value;

}
add_shortcode('codycave_fa', 'codycave_fa_shortcode');

//shortcode pattern:: [codycave_fa name="" url="" style=""]
//for widget support use this [add_filter('widget_text', 'do_shortcode');] code in to your theme's functions.php (if not exists)

/*
....................................................................................
....................................................................................
@@@@@@@@@@@@@@@@@@@@ Font Awesome Ends @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
....................................................................................
....................................................................................
*/