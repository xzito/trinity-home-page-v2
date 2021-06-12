<?php

namespace Xzito\TrinityHomePageV2;

class Banner {
  private $id;
  private $title;
  private $subtitle;
  private $background_type;
  private $background_video_mp4;
  private $background_video_webm;
  private $background_video_poster;
  private $background_image;
  private $background_tinted;
  private $button_action;
  private $button_video_label;
  private $button_video_source;
  private $button_video_upload;
  private $button_video_embed;
  private $button_link;

  public function __construct($post_id = '') {
    $this->id = $post_id;
    $this->set_title();
    $this->set_subtitle();
    $this->set_background_type();
    $this->set_background_video_mp4();
    $this->set_background_video_webm();
    $this->set_background_video_poster();
    $this->set_background_image();
    $this->set_background_tinted();
    $this->set_button_action();
    $this->set_button_video_label();
    $this->set_button_video_source();
    $this->set_button_video_upload();
    $this->set_button_video_embed();
    $this->set_button_link();
  }

  public function title() {
    return $this->title;
  }

  public function subtitle() {
    return $this->subtitle;
  }

  public function background_type() {
    return $this->background_type;
  }

  public function background_video_mp4() {
    return $this->background_video_mp4['url'];
  }

  public function background_video_webm() {
    return $this->background_video_webm['url'];
  }

  public function background_video_poster() {
    return $this->background_video_poster['url'];
  }

  public function background_image() {
    return $this->background_image['url'];
  }

  public function background_tinted() {
    return $this->background_tinted;
  }

  public function button_action() {
    return $this->button_action;
  }

  public function button_video_label() {
    return $this->button_video_label;
  }

  public function button_video_source() {
    return $this->button_video_source;
  }

  public function button_video_upload() {
    return $this->button_video_upload['url'];
  }

  public function button_video_embed() {
    return $this->button_video_embed;
  }

  public function button_link() {
    return $this->button_link;
  }

  private function set_title() {
    $this->title = $this->field()['title'];
  }

  private function set_subtitle() {
    $this->subtitle = $this->field()['subtitle'];
  }

  private function set_background_type() {
    $this->background_type = $this->field()['background_type'];
  }

  private function set_background_video_poster() {
    $this->background_video_poster =
      $this->field()['background_video_upload']['poster'];
  }

  private function set_background_video_webm() {
    $this->background_video_webm =
      $this->field()['background_video_upload']['webm'];
  }

  private function set_background_video_mp4() {
    $this->background_video_mp4 =
      $this->field()['background_video_upload']['mp4'];
  }

  private function set_background_tinted() {
    $this->background_tinted = ($this->field()['background_tint'] == 'tinted');
  }

  private function set_background_image() {
    $this->background_image = $this->field()['background_image'];
  }

  private function set_button_action() {
    $this->button_action = $this->field()['button_action'];
  }

  private function set_button_video_label() {
    $this->button_video_label = $this->field()['button_video_label'];
  }

  private function set_button_video_source() {
    $this->button_video_source = $this->field()['button_video_source'];
  }

  private function set_button_video_upload() {
    $this->button_video_upload = $this->field()['button_video_upload'];
  }

  private function set_button_video_embed() {
    $this->button_video_embed = $this->field()['button_video_embed'];
  }

  private function set_button_link() {
    $this->button_link = $this->field()['button_link'];
  }

  private function field() {
    return get_field('home_page_v2_banner', $this->id);
  }
}
