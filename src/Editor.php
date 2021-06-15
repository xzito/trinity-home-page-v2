<?php

namespace Xzito\TrinityHomePageV2;

use Xzito\TrinityHomePageV2\Template;

class Editor {
  public static function remove_support() {
    global $post;
    global $pagenow;

    if (!($pagenow == 'post.php')) {
      return;
    }

    if (is_admin() && Template::used_by($post)) {
      remove_post_type_support('page', 'editor');
    }
  }

  public static function remove_gutenberg($can_edit, $post_type) {
    $post_id = ($_GET['post'] ?? '');
    $using_template = (new Template())->using_template($post_id);

    if (is_admin() && $using_template) {
      $can_edit = false;
    }

    return $can_edit;
  }
}
