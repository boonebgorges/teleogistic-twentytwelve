<?php

/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'Categories: %1$s &middot; Tags: %2$s<br />Date: %3$s &middot; Author: %4$s.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'Categories: %1$s<br />Date: %3$s &middot; Author: %4$s.', 'twentytwelve' );
	} else {
		$utility_text = __( 'Date: %3$s &middot; Author: %4$s.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}

function teleogistic_title_meta() {

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	echo $date;
}

function teleogistic_fonts() {
	wp_dequeue_style( 'twentytwelve-fonts' );
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'teleogistic-fonts', "$protocol://fonts.googleapis.com/css?family=Quando", array(), null );
}
add_action( 'wp_enqueue_scripts', 'teleogistic_fonts', 11 );
