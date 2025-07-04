<?php
/**
 * Template functions that can help in creating custom templates.
 *
 * @package feedzy-rss-feeds-pro
 * @subpackage feedzy-rss-feeds-pro/includes/public
 */


if ( ! function_exists( 'feedzy_feed_class' ) ) {
	/**
	 * Get the feed class.
	 */
	function feedzy_feed_class() {
		global $_custom_feedzy_feed_title;
		$classes = isset( $_custom_feedzy_feed_title['rss_classes'] ) ? $_custom_feedzy_feed_title['rss_classes'] : array();
		if ( empty( $_custom_feedzy_feed_title['disable_default_style'] ) ) {
			$classes[] = 'feedzy-rss';
		}
		return implode( ' ', array_filter( $classes ) );
	}
}

if ( ! function_exists( 'feedzy_feed_title' ) ) {
	/**
	 * Get the feed title.
	 */
	function feedzy_feed_title() {
		global $_custom_feedzy_feed_title;
		return $_custom_feedzy_feed_title['rss_title'];
	}
}

if ( ! function_exists( 'feedzy_feed_link' ) ) {
	/**
	 * Get the feed url.
	 */
	function feedzy_feed_link() {
		global $_custom_feedzy_feed_title;
		return $_custom_feedzy_feed_title['rss_url'];
	}
}

if ( ! function_exists( 'feedzy_feed_desc' ) ) {
	/**
	 * Get the feed description.
	 */
	function feedzy_feed_desc() {
		global $_custom_feedzy_feed_title;
		return $_custom_feedzy_feed_title['rss_description'];
	}
}

if ( ! function_exists( 'feedzy_feed_item_image' ) ) {
	/**
	 * Get the item image.
	 */
	function feedzy_feed_item_image( $item ) {
		return $item['item_img'];
	}
}

if ( ! function_exists( 'feedzy_feed_item_title' ) ) {
	/**
	 * Get the item title.
	 */
	function feedzy_feed_item_title( $item ) {
		return $item['item_title'];
	}
}

if ( ! function_exists( 'feedzy_feed_item_link' ) ) {
	/**
	 * Get the item url.
	 */
	function feedzy_feed_item_link( $item ) {
		return $item['item_url'];
	}
}

if ( ! function_exists( 'feedzy_feed_item_meta' ) ) {
	/**
	 * Get the item meta.
	 */
	function feedzy_feed_item_meta( $item ) {
		return $item['item_meta'];
	}
}

if ( ! function_exists( 'feedzy_feed_item_desc' ) ) {
	/**
	 * Get the item description.
	 */
	function feedzy_feed_item_desc( $item ) {
		return $item['item_description'];
	}
}

if ( ! function_exists( 'feedzy_feed_item_media' ) ) {
	/**
	 * Get the item media, with or without the HTML5 controls..
	 */
	function feedzy_feed_item_media( $item, $with_controls = true ) {
		if ( ! empty( $item['item_media'] ) && isset( $item['item_media']['src'] ) ) {
			if ( ! $with_controls ) {
				return array(
					'src'  => $item['item_media']['src'],
					'type' => $item['item_media']['type'],
				);
			}

			$audio_fallback_text = sprintf(
				// translators: %s is the URL of the audio source.
				__( 'Your browser does not support the audio element. But you can check this for the original link: %s', 'feedzy-rss-feeds-pro' ),
				'<a href="' . esc_url( $item['item_media']['src'] ) . '">' . esc_html( $item['item_media']['src'] ) . '</a>'
			);

			return '
			<audio controls controlsList="nodownload">
			  <source src="' . esc_url( $item['item_media']['src'] ) . '" type="' . esc_attr( $item['item_media']['type'] ) . '">
			  ' . $audio_fallback_text . '
			</audio>
			';
		}

	}
}

if ( ! function_exists( 'feedzy_feed_item_price' ) ) {
	/**
	 * Get the item price.
	 */
	function feedzy_feed_item_price( $item ) {
		return $item['item_price'];
	}
}


if ( ! function_exists( 'feedzy_feed_get' ) ) {
	/**
	 * Get the value of a key from the feed array.
	 */
	function feedzy_feed_get( $key ) {
		global $_custom_feedzy_feed_title;
		return array_key_exists( $key, $_custom_feedzy_feed_title ) ? $_custom_feedzy_feed_title[ $key ] : '';
	}
}
if ( ! function_exists( 'feedzy_feed_item_get' ) ) {
	/**
	 * Get the value of a key from the item array.
	 */
	function feedzy_feed_item_get( $item, $key ) {
		return array_key_exists( $key, $item ) ? $item[ $key ] : '';
	}
}
