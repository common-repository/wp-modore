<?php
/*
Plugin Name: wp-modore
Plugin URI: http://wp.mmrt-jp.net/2007/03/12/2423/
Description: This plugin displays an allow with a gBack to Toph link on the right side of your blog.
Author: Hiromasa <a href="http://wp.mmrt-jp.net/">&amp; Masayan</a>
Version: 1.01
Author URI: http://hiromasa.zone.ne.jp/blog/
*/

/*  Copyright 2007 Masayan  (email : mmrt1983@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
/******************************************************************************
 * WpModore
 * 
 * @author		Masayan
 * @version		1.01
 * 
 *****************************************************************************/
class WpModore {
	
	var $path_css;
	var $path_js;
	var $path_img;
	
	function WpModore() {
		
		$site_url = get_settings('siteurl');
		$plugin_root = "/wp-content/plugins/wp-modore/";
		$this->path_url = $site_url;
		$this->path_css = $site_url . $plugin_root . "wp-modore.css";
		$this->path_js  = $site_url . $plugin_root . "wp-modore.js";
		$this->path_img = $site_url . $plugin_root . "modore.png";
		
	}
	
	function echoHeader() {
		
		echo "\t";
		echo "<script type=\"text/javascript\" src=\"$this->path_js\">";
		echo "</script>\n";
		echo "\t";
		echo "<link rel=\"stylesheet\" href=\"$this->path_css\" ";
		echo 'type="text/css" media="screen" />' . "\n";
		
	}
	
	function echoFooter() {
		
		echo "\t" . '<div id="back-to-top">' . "\n";
		echo "<a href=\"$this->path_url\" onclick=\"backToTop(); ";
		echo 'return false" onkeypress="up">' . "\n";
		echo '<img height="26" title="back to top" alt="back to top" ';
		echo "src=\"$this->path_img\" width=\"26\" /></a>\n";
		echo "\t</div>\n";
		
	}
	
}

/******************************************************************************
 * WpModore - WordPress Interface Define
 *****************************************************************************/

$wpmodore = & new WpModore();

add_action('wp_head', array(&$wpmodore, 'echoHeader'));
add_action('wp_footer', array(&$wpmodore, 'echoFooter'));
?>
