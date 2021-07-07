import 'jquery';
import '../node_modules/bootstrap/js/src/util';
import '../node_modules/bootstrap/js/src/modal.js';

import home from './scripts/pages/home';

const pages = [home];

jQuery(document).on('ready', () => {
  pages.forEach(page => {
    page.whenReady();
  });
});

jQuery(window).on('load', () => {
  pages.forEach(page => {
    page.whenLoaded();
  });
});
