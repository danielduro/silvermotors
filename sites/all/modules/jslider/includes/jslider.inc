<?php
/**
 * @file
 * A filter similar to separate filters for start and end date, but exposed in
 * a single field.
 */

class jslider_filter_handler extends views_handler_filter_numeric {

  function init(&$view, &$options) {
    parent::init($view, $options);
  }

  function option_definition() {
    $options = parent::option_definition();

    $options['range_field'] = array('default' => NULL);
    $options['step'] = array('default' => 100);
    $options['sign'] = array('default' => NULL);
    $options['value_max'] = array('default' => NULL);
    $options['value_min'] = array('default' => NULL);
    $options['default_val'] = array('default' => NULL);
    return $options;
  }

  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);

    $fields = array();
    $all_fields = views_fetch_fields($this->view->base_table, 'filter');
    foreach ($all_fields as $name => $value) {
      $tmp = explode('.', $name);
      $field_name = $tmp[1];
      $table_name = $tmp[0];

      // If we don't have a filter handler, we don't need to do anything more.
      if (!$handler = views_get_handler($table_name, $field_name, 'filter')) {
        continue;
      }
      $handler = views_get_handler($table_name, $field_name, 'filter');

      // We don't care about anything but date handlers
      if ($handler->definition['handler'] == 'views_handler_filter_numeric') {
        $fields[$name] = $value['title'];
      }
    }

    $form['range_field'] = array(
      '#title' => t('Range Field'),
      '#type' => 'select',
      '#options' => $fields,
      '#default_value' => $this->options['range_field'],
      '#description' => t('Select field to build range upon.'),
      '#required' => TRUE,
    );

    $form['value_min'] = array(
      '#title' => t('Min. Value'),
      '#type' => 'textfield',
      '#default_value' => $this->options['value_min'],
      '#required' => TRUE,
    );

    $form['value_max'] = array(
      '#title' => t('Max. Value'),
      '#type' => 'textfield',
      '#default_value' => $this->options['value_max'],
      '#required' => TRUE,
    );

    $form['step'] = array(
      '#title' => t('Step'),
      '#type' => 'textfield',
      '#default_value' => $this->options['step'],
      '#required' => TRUE,
    );

    $form['sign'] = array(
      '#title' => t('Sign'),
      '#type' => 'textfield',
      '#default_value' => $this->options['sign'],
      '#required' => TRUE,
    );

    $form['default_val'] = array(
      '#title' => t('Default'),
      '#type' => 'textfield',
      '#default_value' => $this->options['default_val'],
      '#required' => TRUE,
    );
  }


  function operators() {
    $operators = array(
      '=' => array(
        'title' => t('Is in range'),
        'method' => 'op_in_range',
        'short' => t('in_range'),
        'values' => 1,
      ),
      '!=' => array(
        'title' => t('Is not in range'),
        'method' => 'op_not_in_range',
        'short' => t('not_in_range'),
        'values' => 1,
      ),
    );
    return $operators;
  }

  /**
   * Overwrite value form
   * @param $form
   * @param $form_state
   */
  function value_form(&$form, &$form_state) {
    $form['value']['#tree'] = TRUE;

    $form['value'] = array(
      '#type' => 'textfield',
      '#title' => empty($form_state['exposed']) ? t('Value') : '',
      '#size' => 30,
      '#id' =>  'edit-' . drupal_html_id($this->options['range_field'] . 'slider'),
      '#attributes' => array(
        'class' => array('jslider-element'),
        'data-min' => $this->options['value_min'],
        'data-max' => $this->options['value_max'],
        'data-step' => $this->options['step'],
        'data-sign' => $this->options['sign'],
      ),
      '#default_value' => !empty($this->value['value']) ? $this->value['value'] : $this->options['default_val'],
    );
  }

  function admin_summary() {
    if (empty($this->options['range_field'])) {
      return t('Missing range field!');
    }
    return;
  }


  /**
   * Operation callback
   * @param $field
   */
  function op_in_range($field) {
    $this->ensure_on_slider_table($field);
    if ($this->operator == '=') {
      list($min, $max) = explode(';', $this->value['value']);
      $this->query->add_where($this->options['group'], $this->options['range_field'], array($min, $max), 'BETWEEN');
    }
  }

  /**
   * Operation callback
   * @param $field
   */
  function op_not_in_range($field) {
    $this->ensure_on_slider_table($field);
    if ($this->operator == '!=') {
      list($min, $max) = explode(';', $this->value['value']);
      $this->query->add_where($this->options['group'], $this->options['range_field'], array($min, $max), 'NOT BETWEEN');
    }
  }

  function ensure_on_slider_table($field) {
    // well we are not working on our imaginary field, as it was set by option
    list($table_name, $field_name) = explode('.', $this->options['range_field']);
    $handler = views_get_handler($table_name, $field_name, 'filter');

    if ($table_name != $this->table || !empty($handler->relationship)) {
      $this->related_table_alias = $this->query->ensure_table($table_name, $handler->relationship);
    }
  }
}
