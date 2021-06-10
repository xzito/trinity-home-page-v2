<?php

namespace Xzito\TrinityHomePageV2;

class Template {
  public const TEMPLATE_DIR = 'templates';
  public const TEMPLATE_FILENAME = 'home-page-v2.php';

  public static function register($page_templates) {
    return (new self())->register_template($page_templates);
  }

  public static function include($template) {
    return (new self())->include_template($template);
  }

  public function __construct() { }

  public function register_template($page_templates) {
    return array_merge($page_templates, $this->templates());
  }

  public function include_template($template) {
    if (get_page_template_slug() == $this->path()) {
      $template = $this->path();
    }

    return $template;
  }

  private function templates() {
    return [$this->path() => $this->name()];
  }

  private function path() {
    return plugin_dir_path(__DIR__) . $this->slug();
  }

  private function name() {
    return $this->data()['Template Name'];
  }

  private function data() {
    return get_file_data($this->path(), ['Template Name' => 'Template Name']);
  }

  private function slug() {
    return self::TEMPLATE_DIR . '/' . self::TEMPLATE_FILENAME;
  }
}
