<?php

namespace Xzito\TrinityHomePageV2;

class Assets {
  public const DIST_DIR = 'dist';
  public const SCRIPTS_FILENAME = 'main.js';
  public const SCRIPTS_ID = 'trinity-home-page-v2/main.js';
  public const STYLES_FILENAME = 'main.css';
  public const STYLES_ID = 'trinity-home-page-v2/main.css';

  public static function enqueue() {
    (new self())->enqueue_styles();
    (new self())->enqueue_scripts();
  }

  public function __construct() { }

  public function enqueue_styles() {
    wp_enqueue_style(
      self::STYLES_ID,
      $this->asset_path(self::STYLES_FILENAME),
      false,
      null,
    );
  }

  public function enqueue_scripts() {
    wp_enqueue_script(
      self::SCRIPTS_ID,
      $this->asset_path(self::SCRIPTS_FILENAME),
      ['jQuery'],
      null,
      true,
    );
  }

  private function asset_path($filename) {
    $path = content_url() . '/mu-plugins/' . plugin_basename(dirname(__DIR__));

    return $path . '/' . self::DIST_DIR . '/' . $filename;
  }
}
