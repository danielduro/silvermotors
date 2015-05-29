<?php

/**
 * @file
 * Contains the grid style plugin.
 */


/**
 * Style plugin to render each item in a grid cell.
 *
 * @ingroup views_style_plugins
 */
class carat_magazine_slider_plugin_style_slider extends views_plugin_style {
  /**
   * Set default options
   */
  function option_definition() {
    $options = parent::option_definition();

    $options['image_field'] = array('default' => 0);
    $options['pager_fields'] = array('default' => array());
    $options['content_fields'] = array('default' => array());

    return $options;
  }

  /**
   * Render the given style.
   */
  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);

    $field_names[0] = t('Not used');
    $field_names += $this->display->handler->get_field_labels();

    $form['image_field'] = array(
      '#type' => 'select',
      '#title' => t('Image Field'),
      '#options' => $field_names,
      '#default_value' => $this->options['image_field']
    );

    $form['pager_fields'] = array(
      '#type' => 'select',
      '#multiple' => TRUE,
      '#title' => t('Pager Fields'),
      '#options' => $field_names,
      '#default_value' => $this->options['pager_fields']
    );

    $form['content_fields'] = array(
      '#type' => 'select',
      '#multiple' => TRUE,
      '#title' => t('Content Fields'),
      '#options' => $field_names,
      '#default_value' => $this->options['content_fields']
    );
  }
}
