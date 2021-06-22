<?php

namespace Xzito\TrinityHomePageV2;

class Card {
  private $heading;
  private $post_id;

  public static function all($post_id = '') {
    $fields = get_field('home_page_v2_card', $post_id)['cards'];

    return array_map(function ($card_fields) {
      return new self($card_fields);
    }, $fields);
  }

  public static function section_heading($post_id = '') {
    return get_field('home_page_v2_card', $post_id)['section_heading'];
  }

  public function __construct($fields) {
    $this->heading = $fields['heading'];
    $this->image = $fields['image'];
    $this->post_id = $fields['post'];
  }

  public function heading() {
    return $this->heading;
  }

  public function link() {
    return get_page_link($this->post_id);
  }

  public function image() {
    return $this->image['url'];
  }
}
