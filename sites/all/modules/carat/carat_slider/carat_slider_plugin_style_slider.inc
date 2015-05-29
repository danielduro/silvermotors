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
class carat_slider_plugin_style_slider extends views_plugin_style {
  /**
   * Set default options
   */
  function option_definition() {
    $options = parent::option_definition();

    $options['image_field'] = array('default' => 0);
    $options['title_field'] = array('default' => 0);
    $options['subtitle_field'] = array('default' => 0);
    $options['price_field'] = array('default' => 0);

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

    $form['title_field'] = array(
      '#type' => 'select',
      '#title' => t('Title Field'),
      '#options' => $field_names,
      '#default_value' => $this->options['title_field']
    );

    $form['subtitle_field'] = array(
      '#type' => 'select',
      '#title' => t('Subtitle Field'),
      '#options' => $field_names,
      '#default_value' => $this->options['subtitle_field']
    );

    $form['price_field'] = array(
      '#type' => 'select',
      '#title' => t('Price Field'),
      '#options' => $field_names,
      '#default_value' => $this->options['price_field']
    );
  }
}
