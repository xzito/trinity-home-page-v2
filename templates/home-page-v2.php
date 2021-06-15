<?php

/**
 * Template Name: Home Page v2
 */

use Xzito\TrinityHomePageV2\Partial;

get_header();

while (have_posts()) {
  the_post();

  require Partial::load('banner');
  require Partial::load('showcase');
  require Partial::load('cards');
  require Partial::load('cards_with_headings');
}

get_footer();
