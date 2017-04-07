<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 25/02/2017
 * Time: 10:47 CH
 */

function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function button_func( $atts, $content = "Click here" ) {
    $atts = shortcode_atts( array(
        'color' => 'green',
        'link' => 'javascript:void(0);',
        'target' => '',
        'sm' => ''
    ), $atts, 'button' );
    if($atts['sm']){
        $icon = 'fa fa-' . $atts['sm'];
        if($atts['target']){ } else {
            $atts['target'] = '_blank';
        }
        if($atts['sm'] === 'email'){
            $icon = 'fa fa-envelope-o';
            $atts['target'] = '_self';
        }
        if($atts['sm'] === 'facebook' || $atts['sm'] === 'twitter'){
            $icon .= '-square';
        }
        $html = '<a target="' . $atts['target'] . '" class="button button--' . $atts['sm'] . '" href="' . $atts['link'] . '"><i class="' . $icon . '"></i>' . $content . '</a>';
    } else {
        if($atts['target']){ } else {
            $atts['target'] = '_self';
        }
        $html = '<a target="' . $atts['target'] . '" class="button button--' . $atts['color'] . '" href="' . $atts['link'] . '">' . $content . '</a>';
    }

    return $html;
}
add_shortcode( 'button', 'button_func' );


add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'featured-thumb', 160, 160, true );
    add_image_size( 'header-image', 1900, 600, true );


    add_theme_support( 'post-formats', array( 'image' ) );

}

define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);
