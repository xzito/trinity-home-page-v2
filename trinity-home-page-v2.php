<?php

/**
 * Plugin Name: Trinity Home Page v2
 * Plugin URI: https://github.com/xzito/trinity-home-page-v2
 * Description: Full-width home page design featuring a video banner.
 * Version: 1.0.0
 * Author: James Boynton
 */

namespace Xzito\TrinityHomePageV2;

$autoload_path = __DIR__ . '/vendor/autoload.php';

if (file_exists($autoload_path)) {
  require_once($autoload_path);
}

new TrinityHomePageV2();
