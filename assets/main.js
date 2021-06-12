import 'jquery';
import 'bootstrap';

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
