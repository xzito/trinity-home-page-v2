<?php

namespace Xzito\TrinityHomePageV2;

class Partial {
  public const PARTIAL_DIR = 'partials';

  private $partial;

  public static function load($partial) {
    return (new self($partial))->load_partial();
  }

  public function __construct($partial) {
    $this->partial = $partial;
  }

  public function load_partial() {
    return "{$this->directory_path()}/{$this->partial}.php";
  }

  private function directory_path() {
    return plugin_dir_path(__DIR__) . self::PARTIAL_DIR;
  }
}
