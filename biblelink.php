<?php
/*
Plugin Name: Bible Link
Plugin URI:
Description: This plugin uses a shortcode to automatically link to verses on http://bible.com
Author: chaselivingston
Version: 0.1
Author URI: http://chaselivingston.me
License: GPL2
*/

class CEL_Bible_Link {
	public function __construct() {
		 add_shortcode( 'bible', array( $this, 'wp_biblelink_shortcode' ) );
	}

	public function wp_biblelink_shortcode( $atts, $content = null ) {
		$book = strtolower( strtok( $content, ' ' ) );
		$book_length = strlen( $book );
		$chapter = trim( substr( strtok( $content, ' ' ), $book_length ) );
		$chapter_length = strlen( $chapter) ;
		$verse = substr( $content, $book_length + $chapter_length + 2 );

		if ( $book === '1samuel' ) {
			$book = '1sam';
		} elseif ( $book === '2samuel' ) {
			$book = '2sam';
		} elseif ( $book === '1kings' ) {
			$book = '1ki';
		} elseif ( $book === '2kings' ) {
			$book = '2ki';
		} elseif ( $book === '1chronicles' ) {
			$book = '1ch';
		} elseif ( $book === '2chronicles' ) {
			$book = '2ch';
		} elseif ( $book === '1corinthians' ) {
			$book = '1co';
		} elseif ( $book === '2corinthians' ) {
			$book = '2co';
		} elseif ( $book === '1thessalonians' ) {
			$book = '1th';
		} elseif ( $book === '2thessalonians' ) {
			$book = '2th';
		} elseif ( $book === '1timothy' ) {
			$book = '1ti';
		} elseif ( $book === '2timothy' ) {
			$book = '2ti';
		}

		echo '<a href="http://bible.com/bible/esv/' . $book . '.' . $chapter . '.' . $verse . '.' . 'esv' .  ' ">' . $content . '</a>';
	}
}

$cel_bible_link = new CEL_Bible_Link();
?>