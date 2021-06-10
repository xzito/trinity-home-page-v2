<?php

namespace Xzito\TrinityHomePageV2;

use Xzito\TrinityHomePageV2\FieldGroups;
use Xzito\TrinityHomePageV2\Template;

class TrinityHomePageV2 {
  public function __construct() {
    add_action('acf/init', [$this, 'add_field_groups']);

    add_filter('theme_page_templates', [$this, 'register_template']);
    add_filter('template_include', [$this, 'include_template']);
  }

  public function add_field_groups() {
    new FieldGroups();
  }

  public function register_template($page_templates) {
    return Template::register($page_templates);
  }

  public function include_template($template) {
    return Template::include($template);
  }
}
