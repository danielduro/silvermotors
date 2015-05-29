<?php

/**
 * Implements hook_field_formatter_info()
 * @return array
 */
function carat_utils_field_formatter_info() {
  return array(
    'carat_appliances' => array(
      'label' => t('Carat Appliances'),
      'field types' => array('text'),
      'settings' => array(),
    )
  );
}

/**
 * Implements hook_field_formatter_settings_form()
 * @param $field
 * @param $instance
 * @param $view_mode
 * @param $form
 * @param $form_state
 * @return array
 */
function carat_utils_field_formatter_settings_form($field, $instance, $view_mode, $form, &$form_state) {
  $display = $instance['display'][$view_mode];
  $settings = $display['settings'];

  // no settings for this naughty formatter !
  $element = array();
  return $element;
}


/**
 * Implements hook_field_formatter_settings_summary()
 * @param $field
 * @param $instance
 * @param $view_mode
 * @return string
 */
function carat_utils_field_formatter_settings_summary($field, $instance, $view_mode) {
  $settings = $instance['display'][$view_mode]['settings'];
  $lines[] = t('Appliances');
  return implode('<br />', $lines);
}

/**
 * Implements hook_field_formatter_view()
 * @param $entity_type
 * @param $entities
 * @param $field
 * @param $instances
 * @param $langcode
 * @param $items
 * @param $displays
 * @return mixed
 */
function carat_utils_field_formatter_view($entity_type, $entities, $field, $instances, $langcode, &$items, $displays) {
  $build[0] = array(
    '#markup' => theme('carat_appliances', array('items' => $items)),
  );

  return $build;
}