<?php
/*
Plugin Name: Twitpic Expander
Plugin URI: http://www.jacksonlaycock.com/
Description: Scans posts for twitpic URL's and automatically expands them and shows an image.  
Version: 1.0
Author: Jackson Laycock
Author URI: http://www.jacksonlaycock.com
*/
?>
<?php
// borrowed code from http://code.google.com/p/dabr/source/browse/trunk/common/twitter.php?spec=svn116&r=116

function showtwitpic($text){ 
	$foo = $text;
	$tmp = strip_tags($text);
	// find a mention of twitpic
	if (preg_match_all('#twitpic.com/([\d\w]+)#', $tmp, $matches, PREG_PATTERN_ORDER) > 0) {
		foreach ($matches[1] as $match) {
	     $text = "<a href='http://twitpic.com/{$match}'><img src='http://twitpic.com/show/large/{$match}' class='aligncenter' /></a>";
	  	}
		$text = $foo . $text;
	}	
	
	return 	$text;
}		

add_filter('the_content', 'showtwitpic', 21);
add_filter('the_excerpt', 'showtwitpic', 21);		
?>