<?php

namespace Xzito\TrinityHomePageV2;

use Xzito\TrinityHomePageV2\Template;

class Asset {
  public const DIST_DIR = 'dist';
  public const SCRIPTS_FILENAME = 'main.js';
  public const SCRIPTS_ID = 'trinity-home-page-v2/main.js';
  public const STYLES_FILENAME = 'main.css';
  public const STYLES_ID = 'trinity-home-page-v2/main.css';

  public static function enqueue() {
    global $post;

    if (Template::used_by($post)) {
      (new self())->enqueue_styles();
      (new self())->enqueue_scripts();
    }
  }

  public static function path($asset) {
    return (new self())->asset_path($asset);
  }

  public function __construct() { }

  public function enqueue_styles() {
    wp_enqueue_style(
      self::STYLES_ID,
      $this->asset_url(self::STYLES_FILENAME),
      false,
      null,
    );
  }

  public function enqueue_scripts() {
    wp_enqueue_script(
      self::SCRIPTS_ID,
      $this->asset_url(self::SCRIPTS_FILENAME),
      [],
      null,
      true,
    );
  }

  public function asset_path($asset) {
    return plugin_dir_path(__DIR__) . self::DIST_DIR . "/{$asset}";
  }

  private function asset_url($filename) {
    $path = content_url() . '/mu-plugins/' . plugin_basename(dirname(__DIR__));

    return "{$path}/" . self::DIST_DIR . "/{$filename}";
  }
}
