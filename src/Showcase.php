<?php

namespace Xzito\TrinityHomePageV2;

class Showcase {
  private $heading;
  private $subheading;
  private $text;
  private $image;

  public static function all($post_id = '') {
    $fields = get_field('home_page_v2_showcase', $post_id);

    return array_map(function ($showcase_fields) {
      return new self($showcase_fields);
    }, $fields);
  }

  public function __construct($fields) {
    $this->heading = $fields['heading'];
    $this->subheading = $fields['subheading'];
    $this->link = $fields['link'];
    $this->image = $fields['image'];
  }

  public function heading() {
    return $this->heading;
  }

  public function subheading() {
    return $this->subheading;
  }

  public function link() {
    return $this->link;
  }

  public function image() {
    return $this->image['url'];
  }
}
