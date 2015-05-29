<?php

require_once 'carat_magazine_slider_plugin_style_slider.inc';

function carat_magazine_slider_views_plugins() {

  return array(
    'module' => 'carat_magazine_slider',
    'style' => array(
      'carat_magazine_slider' => array(
        'title' => t('Carat Magazine Slider'),
        'help' => t('Display the view formatted for specific Carat Slider.'),
        'handler' => 'carat_magazine_slider_plugin_style_slider',
        'uses options' => TRUE,
        'uses row plugin' => TRUE,
        'uses grouping' => FALSE,
        'uses row class' => TRUE,
        'type' => 'normal',
        'parent' => 'list',
        'path' => drupal_get_path('module', 'carat_magazine_slider'),
        'theme' => 'carat_magazine_slider_view',
        'theme path' => drupal_get_path('module', 'carat_magazine_slider'),
      ),
    ),
  );
}

