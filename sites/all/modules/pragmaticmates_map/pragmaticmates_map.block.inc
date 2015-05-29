<?php

// @todo add support for map styles -- http://snazzymaps.com/

/**
 * Implements hook_block_info().
 */
function pragmaticmates_map_block_info() {
  /** Should be statical map */
  $block['pragmaticmates_map'] = array(
    'info' => t('Pragmaticmates: Map'),
    'cache' => DRUPAL_CACHE_GLOBAL,
  );

  return $block;
}


/**
 * Implements hook_block_view().
 */
function pragmaticmates_map_block_view($delta) {
  $block = array();

  switch ($delta) {
    case 'pragmaticmates_map':
      module_load_include('inc', 'gmap3_tools');

      $markers = array();
      $settings = pragmaticmates_map_get_settings();

      $markers[0] = gmap3_tools_create_marker($settings['latitude'], $settings['longitude']);

      // unique identifier
      $block_id = drupal_html_id($delta);

      $controlNames = array(
        'pan_control_position' => 'panControl',
        'scale_control_position' => 'scaleControl',
        'zoom_control_position' => 'zoomControl',
        'streetview_control_position' => 'streetViewControl',
      );

      foreach ($controlNames as $index => $controlName) {
        $controls[$controlName] = FALSE;
        if ($settings[$index]) {
          $controls[$controlName . 'Options'] = array(
            'position' => $settings[$index]
          );
          $controls[$controlName] = TRUE;
        };
      }

      $mapOptions = array_merge(
        array(
          'centerX' => $settings['latitude'],
          'centerY' => $settings['longitude'],
          'zoom' => (int) $settings['zoom'],
          'mapTypeId' => GMAP3_TOOLS_MAP_TYPE_ID_ROADMAP,
          'scrollwheel' => FALSE,
        ),
        $controls
      );

      // generate map settings
      gmap3_tools_add_map(
        array(
          'clustering' => array(
            'enable' => FALSE,
            'gridSize' => 60,
          ),
          'mapId' => $block_id,
          'mapOptions' => $mapOptions,
          'markers' => $markers,
        )
      );

      drupal_add_js(drupal_get_path('module', 'pragmaticmates_map') . '/infobox.js');
      drupal_add_js(drupal_get_path('module', 'pragmaticmates_map') . '/styledMarker.js');
      drupal_add_js(drupal_get_path('module', 'pragmaticmates_map') . '/clusterer.js');


      $block['subject'] = t('Map');
      $block['content'] = theme('pragmaticmates_map_block',
        array(
          'block_id' => $block_id,
          'height' => $settings['height'],
          'width' => $settings['width'])
      );
      break;
  }

  return $block;
}

/**
 * Implements hook_block_configure()
 * @param $delta
 * @return array
 */
function pragmaticmates_map_block_configure($delta) {
  $form = array();

  $settings = pragmaticmates_map_get_settings();

  if ($delta == 'pragmaticmates_map') {

    $form['pragmaticmates_map'] = array(
      '#type' => 'fieldset',
      '#tree' => TRUE,
      '#title' => t('Map Options'),
    );

    $form['pragmaticmates_map']['zoom'] = array(
      '#title' => t('Zoom'),
      '#type' => 'select',
      '#options' => array(
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        11 => 11,
        12 => 12,
        13 => 13,
        14 => 14,
        15 => 15,
        16 => 16,
        17 => 17,
      ),
      '#default_value' => $settings['zoom'],
    );

    $form['pragmaticmates_map']['width'] = array(
      '#type' => 'textfield',
      '#title' => t('Width'),
      '#default_value' => $settings['width'],
    );

    $form['pragmaticmates_map']['height'] = array(
      '#type' => 'textfield',
      '#title' => t('Height'),
      '#default_value' => $settings['height'],
    );

    $form['pragmaticmates_map']['longitude'] = array(
      '#type' => 'textfield',
      '#title' => t('Longitude'),
      '#default_value' => $settings['longitude'],
    );

    $form['pragmaticmates_map']['latitude'] = array(
      '#type' => 'textfield',
      '#title' => t('Latitude'),
      '#default_value' => $settings['latitude'],
    );


    $form['pragmaticmates_map']['overview_map_control'] = array(
      '#type' => 'checkbox',
      '#title' => t('Enable map controls'),
      '#default_value' => $settings['overview_map_control'],
    );

    $controls_position_options = array(
      0 => t('Don\'t display'),
      1 => t('TL - Top left'),
      2 => t('TC - Top center'),
      3 => t('TR - Top right'),
      4 => t('LT - Left top'),
      5 => t('RT - Right top'),
      6 => t('LC - Left center'),
      7 => t('RC - Right center'),
      8 => t('LB - Left bottom'),
      9 => t('RB - Right bottom'),
      10 => t('BL - Bottom left'),
      11 => t('BC - Bottom center'),
      12 => t('BR - Bottom right'),
    );

    $form['pragmaticmates_map']['pan_control_position'] = array(
      '#type' => 'select',
      '#title' => t('Pan controls position'),
      '#options' => $controls_position_options,
      '#default_value' => $settings['pan_control_position'],
    );


    $form['pragmaticmates_map']['scale_control_position'] = array(
      '#type' => 'select',
      '#title' => t('Scale controls position'),
      '#options' => $controls_position_options,
      '#default_value' => $settings['scale_control_position']
    );

    $form['pragmaticmates_map']['rotate_control_position'] = array(
      '#type' => 'select',
      '#title' => t('Rotate controls position'),
      '#options' => $controls_position_options,
      '#default_value' => $settings['rotate_control_position']
    );

    $form['pragmaticmates_map']['zoom_control_position'] = array(
      '#type' => 'select',
      '#title' => t('Zoom controls position'),
      '#options' => $controls_position_options,
      '#default_value' => $settings['zoom_control_position']
    );

    $form['pragmaticmates_map']['streetview_control_position'] = array(
      '#type' => 'select',
      '#title' => t('StreetView controls position'),
      '#options' => $controls_position_options,
      '#default_value' => $settings['streetview_control_position']
    );

    $form['pragmaticmates_map']['control_position_desc']['#markup'] = "
    <pre>
    +________________+
    + TL    TC    TR +
    + LT          RT +
    +                +
    + LC          RC +
    +                +
    + LB          RB +
    + BL    BC    BR +
    +________________+
    </pre>";


  }

  return $form;
}

/**
 * Implements hook_block_save()
 * @param $delta
 * @param $edit
 */
function pragmaticmates_map_block_save($delta, $edit) {
  if($delta == 'pragmaticmates_map') {
    variable_set('pragmaticmates_map', $edit['pragmaticmates_map']);
  }
}

/**
 * Utility function, settings defaults form map settings
 * @return null
 */
function pragmaticmates_map_get_settings() {
  $settings = variable_get('pragmaticmates_map', array(
    'zoom' => 12,
    'width' => "400px",
    'height' => "400px",
    'latitude' => NULL,
    'longitude' => NULL,
    'overview_map_control' => TRUE,
    'pan_control_position' => 1,
    'scale_control_position' => 1,
    'rotate_control_position' => 1,
    'zoom_control_position' => 1,
    'streetview_control_position' => 1,
  ));

  return $settings;
}

