'use strict';
const $ = jQuery.noConflict();

$(function () {
  $('.drawer_trigger').on('click', function () {
    $('.drawer_trigger_span,.modal_nav').toggleClass('active');
  });
});
