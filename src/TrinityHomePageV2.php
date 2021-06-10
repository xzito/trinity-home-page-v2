<?php

namespace Xzito\TrinityHomePageV2;

use Xzito\TrinityHomePageV2\Assets;
use Xzito\TrinityHomePageV2\Editor;
use Xzito\TrinityHomePageV2\FieldGroups;
use Xzito\TrinityHomePageV2\Template;

class TrinityHomePageV2 {
  public function __construct() {
    add_action('acf/init', [$this, 'add_field_groups']);
    add_action('admin_head', [$this, 'remove_editor']);
    add_action('wp_enqueue_scripts', [$this, 'enqueue_assets'], 100);

    add_filter('theme_page_templates', [$this, 'register_template']);
    add_filter('template_include', [$this, 'include_template']);
    add_filter(
      'gutenberg_can_edit_post_type',
      [$this, 'remove_gutenberg'],
      10,
      2,
    );
    add_filter(
      'use_block_editor_for_post_type',
      [$this, 'remove_block_editor'],
      10,
      2,
    );
  }

  public function add_field_groups() {
    new FieldGroups();
  }

  public function remove_editor() {
    Editor::remove_support();
  }

  public function enqueue_assets() {
    Assets::enqueue();
  }

  public function register_template($page_templates) {
    return Template::register($page_templates);
  }

  public function include_template($template) {
    return Template::include($template);
  }

  public function remove_gutenberg($can_edit, $post_type) {
    return Editor::remove_gutenberg($can_edit, $post_type);
  }

  public function remove_block_editor($can_edit, $post_type) {
    return Editor::remove_gutenberg($can_edit, $post_type);
  }
}
