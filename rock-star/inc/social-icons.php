<?php

/**
 * The template for displaying Social Icons
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

if (! function_exists('rock_star_get_social_icons')) :
	/**
	 * Generate social icons.
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_get_social_icons()
	{
		if ((!$output = get_transient('rock_star_social_icons'))) {
			$output	= '<ul class="social-icons">';

			$options 	= rock_star_get_theme_options(); // Get options

			//Pre defined Social Icons Link Start
			$pre_def_social_icons 	=	rock_star_get_social_icons_list();

			foreach ($pre_def_social_icons as $key => $item) {
				if (isset($options[$key]) && '' != $options[$key]) {
					$value = $options[$key];

					if ('email_link' == $key) {
						$output .= '<a class="font-awesome fa-solid fa-' . sanitize_key($item['fa_class']) . '" target="_blank" title="' . esc_attr($item['label']) . '" href="mailto:' . antispambot(sanitize_email($value)) . '"><span class="screen-reader-text">' . esc_attr($item['label']) . '</span> </a>';
					} else if ('phone_link' == $key || 'handset_link' == $key || 'mobile_link' == $key) {
						$output .= '<a class="font-awesome fa-solid fa-' . sanitize_key($item['fa_class']) . '" target="_blank" title="' . esc_attr($item['label']) . '" href="tel:' . preg_replace('/\s+/', '', esc_attr($value)) . '"><span class="screen-reader-text">' . esc_attr($item['label']) . '</span> </a>';
					} else if (
						'website_link' == $key
						|| 'feed_link' == $key
						|| 'cart_link' == $key
						|| 'cloud_link' == $key
						|| 'link_link' == $key
					) {
						$output .= '<a class="font-awesome fa-solid fa-' . sanitize_key($item['fa_class']) . '" target="_blank" title="' . esc_attr($item['label']) . '" href="' . esc_url($value) . '"><span class="screen-reader-text">' . esc_attr($item['label']) . '</span> </a>';
					} else {
						$output .= '<a class="font-awesome fa-brands fa-' . sanitize_key($item['fa_class']) . '" target="_blank" title="' . esc_attr($item['label']) . '" href="' . esc_url($value) . '"><span class="screen-reader-text">' . esc_attr($item['label']) . '</span> </a>';
					}
				}
			}
			//Pre defined Social Icons Link End
			set_transient('rock_star_social_icons', $output, 86940);
		}
		return $output;
	} // rock_star_get_social_icons
endif;
