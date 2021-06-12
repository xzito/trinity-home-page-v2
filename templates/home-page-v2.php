<?php
/**
 * Template Name: Home Page v2
 */

use Xzito\TrinityHomePageV2\Banner;
use Xzito\TrinityHomePageV2\Partial;

get_header();


while (have_posts()) {
  the_post();

  $banner = new Banner($post->ID);

  require Partial::load('banner');
}

get_footer();
