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
      href: '/img/auto/instagramm/Infiniti/EX35/1.jpg'
    },
    {
      href: '/img/auto/instagramm/Infiniti/EX35/4.jpg'
    },
    {
      href: '/img/auto/instagramm/Infiniti/EX35/5.jpg'
    },
    {
      href: '/img/auto/instagramm/Infiniti/EX35/6.jpg'
    },
    {
      href: '/img/auto/instagramm/Infiniti/EX35/7.jpg'
    },
    {
      href: '/img/auto/instagramm/Infiniti/EX35/8.jpg'
    },
    {
      href: '/img/auto/instagramm/Infiniti/EX35/9.jpg'
    },
    {
      href: '/img/auto/instagramm/Infiniti/EX35/10.jpg'
    },
    {
      href: '/img/auto/instagramm/Infiniti/EX35/11.jpg'
    },
    {
      href: '/img/auto/instagramm/Infiniti/EX35/12.jpg'
    }
  ], {
    container: '#blueimp-image-carousel',
      carousel: true
  })
})
