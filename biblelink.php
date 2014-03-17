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
    function __construct() {
       add_shortcode( 'bible', array( $this, 'wp_biblelink_shortcode' ) );
    }
    public function wp_biblelink_shortcode( $atts, $content = null ) {
		$book = strtolower( strtok($content, " ") );
		$book_length = strlen($book);
		$chapter = trim( substr(strtok($content, ":"), $book_length ) );
		$chapter_length = strlen($chapter);
		$verse = substr($content, $book_length + $chapter_length + 2);
		echo "<a href='http://bible.com/bible/esv/" . $book . ".". $chapter . "." . $verse . "." . "esv" .  " '>" . $content . "</a>";
	}
}
$cel_bible_link = new CEL_Bible_Link();


?>