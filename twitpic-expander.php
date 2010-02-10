<?php
/*
Plugin Name: Twitpic Expander
Plugin URI: http://wordpress.org/support/topic/304051
Description: Scans posts for twitpic URL's and automatically expands them and shows an image.  
Version: 1.1
Author: Jackson Laycock
Author URI: http://www.jacksonlaycock.com
*/
?>

<?php
function showtwitpic($text){
  $foo = $text;
  $tmp = strip_tags($text);

  // find a mention of twitpic
  if (preg_match_all('#twitpic.com/([\d\w]+)#', $tmp, $matches, PREG_PATTERN_ORDER) > 0) {
    foreach ($matches[1] as $match) {
      $images .= "<a href='http://twitpic.com/{$match}'><img src='http://twitpic.com/show/large/{$match}' class='aligncenter' /></a>";
    }
    $text = $foo . '<center>' . $images . '</center>';
  }

  return $text;
}

add_filter('the_content', 'showtwitpic', 21);
add_filter('the_excerpt', 'showtwitpic', 21);
?>