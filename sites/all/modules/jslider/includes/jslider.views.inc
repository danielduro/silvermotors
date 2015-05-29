<?php
/**
 * @file
 * Defines Views Between dates filter
 *
 */

require_once 'jslider.inc';
/**
 * Implements hook_views_data()
 */
function jslider_views_data() {
  $data = array();
  $tables = date_views_base_tables();

  foreach ($tables as $base_table => $entity) {
    // Range slider
    $data[$base_table]['jslider'] = array(
      'group' => t('Range'),
      'title' => t('Slider selector (!base_table)', array('!base_table' => $base_table)),
      'help' => t('Slider select !base_table.', array('!base_table' => $base_table)),
      'filter' => array(
        'handler' => 'jslider_filter_handler',
        'empty field name' => t('Undated'),
      ),
    );
  }

  return $data;
}
