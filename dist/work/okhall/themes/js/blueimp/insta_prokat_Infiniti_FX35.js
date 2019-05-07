/*
 * blueimp Gallery Demo JS
 * https://github.com/blueimp/Gallery
 *
 * Copyright 2013, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

/* global blueimp, $ */

$(function () {
  'use strict'

  

  // Initialize the Gallery as video carousel:
  blueimp.Gallery([
    {
      href: '/img/auto/instagramm/Infiniti/FX35/1.jpg'
    },
    {
      href: '/img/auto/instagramm/Infiniti/FX35/2.jpg'
    },
    {
      href: '/img/auto/instagramm/Infiniti/FX35/3.jpg'
    }
  ], {
    container: '#blueimp-image-carousel',
      carousel: true
  })
})
