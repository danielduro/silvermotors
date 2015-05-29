<?php

require_once 'carat_slider_plugin_style_slider.inc';

function carat_slider_views_plugins() {

  return array(
    'module' => 'carat_slider',
    'style' => array(
      'carat_slider' => array(
        'title' => t('Carat Slider'),
        'help' => t('Display the view formatted for specific Carat Slider.'),
        'handler' => 'carat_slider_plugin_style_slider',
        'uses options' => TRUE,
        'uses row plugin' => TRUE,
        'uses grouping' => FALSE,
        'uses row class' => TRUE,
        'type' => 'normal',
        'parent' => 'list',
        'path' => drupal_get_path('module', 'carat_slider'),
        'theme' => 'carat_slider_view',
        'theme path' => drupal_get_path('module', 'carat_slider'),
      ),
    ),
  );
}

