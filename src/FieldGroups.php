<?php

namespace Xzito\TrinityHomePageV2;

class FieldGroups {
  public static function register() {
    (new self())->add_field_groups();
  }

	public function __construct() { }

	public function add_field_groups() {
    foreach ($this->acf_exported_php() as $acf) {
      require_once $acf;
    }
  }

  private function acf_exported_php() {
    return glob("{$this->acf_path()}/**/*.php");
  }

  private function acf_path() {
    return dirname(__DIR__) . '/acf';
  }
}
