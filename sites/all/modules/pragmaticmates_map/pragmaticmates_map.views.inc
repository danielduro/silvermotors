<?php

require_once 'pragmaticmates_map_plugin_style_gmap.inc';

/**
 * Implements hook_views_plugins().
 */
function pragmaticmates_map_views_plugins() {
  return array(
    'module' => 'pragmaticmates_map',
    'style' => array(
      'pragmaticmates_map' => array(
        'title' => t('pragmaticmates Gmap'),
        'help' => t('Display the results as a gmap.'),
        'handler' => 'pragmaticmates_map_plugin_style_gmap',
        'uses options' => TRUE,
        'uses row plugin' => TRUE,
        'uses grouping' => FALSE,
        'uses row class' => TRUE,
        'type' => 'normal',
        'parent' => 'list',
        'path' => drupal_get_path('module', 'pragmaticmates_map'),
        'theme' => 'pragmaticmates_map_view',
        'theme path' => drupal_get_path('module', 'pragmaticmates_map'),
      ),
    ),
  );
}

