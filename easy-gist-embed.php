<?php
/*
	Plugin Name: Easy Gist Embed Updated
	Plugin URI: http://wordpress.org/extend/plugins/easy-gist-embed/
	Description: Automatically embeds GitHub Gists just by posting a link to that Gist
	Author: Captain Theme
	Version: 1.0
	Author URI: http://captaintheme.com/
 */
 
// Auto-embed GitHub Gists
wp_embed_register_handler( 'gist_updated', '/https:\/\/gist\.github\.com\/?([a-z0-9-]+)?\/([0-9a-z]+)/', 'ege_embed_gist_updated' );
function ege_embed_gist_updated( $matches, $attr, $url, $rawattr ){
	$string = ($matches[2])? '<script src="https://gist.github.com/%2$s/%1$s.js"></script>' : '<script src="https://gist.github.com/%1$s.js"></script>';
	$embed = sprintf(
        $string,
        esc_attr($matches[2]),
        esc_attr($matches[1])
    );
    return apply_filters( 'embed_gist_updated', $embed, $matches, $attr, $url, $rawattr );
}
?>