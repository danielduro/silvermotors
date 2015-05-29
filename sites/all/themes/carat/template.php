<?php


/**
 * Preprocess page theme
 * @param $variables
 */
function carat_preprocess_page(&$variables) {
  drupal_add_css('http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,400,700,400italic,700italic');
  // creating custom 404 template
  $status = drupal_get_http_header("status");

  $settings = variable_get('site_404', NULL);
  $node = menu_get_object();


  if ($node) {
    $node_uri = node_uri($node);
    $path = reset($node_uri);

    $variables['theme_hook_suggestions'][] = 'page__' . $node->type;

    if ($path == $settings) {
      $variables['theme_hook_suggestions'][] = 'page__404';
    }
    $variables['theme_hook_suggestions'][] = 'page__' . drupal_get_path_alias('node/' . $node->nid);
  }


  if ($status == "404 Not Found") {
    $variables['theme_hook_suggestions'][] = 'page__404';
  }


}


/**
 * Preprocess node theme
 * @param $variables
 */
function carat_preprocess_node(&$variables) {
  $node = $variables['node'];
  $variables['theme_hook_suggestions'][] = 'node__' . $node->type . '__' . str_replace(
      '-', '_', $variables['view_mode']
    );

  $settings = variable_get('site_404', NULL);
  $node = menu_get_object();

  if ($node) {
    $node_uri = node_uri($node);
    $path = reset($node_uri);

    if ($path == $settings) {
      $variables['theme_hook_suggestions'][] = 'node__404';
    }
  }

  if(isset($node->type)) {
    $function = 'carat_preprocess_node_' . $node->type;

    if (function_exists($function)) {
      $function($variables);
    }
  }
}

/**
 * @param $variables
 */
function carat_preprocess_node_article(&$variables) {
  $node = $variables['node'];

  $variables['author'] = $node->name;
  $variables['created'] = date('d.m.y', $node->created);
}

function carat_preprocess_node_car(&$variables) {
  if($variables['view_mode'] == 'full') {
    $block = module_invoke('webform', 'block_view', 'client-block-30');
    $variables['contact'] = $block['content'];
  }
}

/**
 * Preprocess
 * @param $variables
 */
function carat_preprocess_comment(&$variables) {
  $comment = $variables['comment'];
  $variables['author'] = $comment->name;
  $variables['created'] = date('d.m.y', $comment->created);
}


/**
 * Implements hook_form_alter
 * @param $form
 * @param $form_state
 * @param $form_id
 */
function carat_form_alter(&$form, &$form_state, $form_id) {

  if($form_id == 'webform_client_form_26') {
    $form['submitted']['full_name']['#prefix'] = "<div class=row><div class=\"col-sm-4 col-md-4\"><div class=form-group>";
    $form['submitted']['full_name']['#suffix'] = "</div></div>";
    $form['submitted']['full_name']['#attributes']['class'][] = 'form-control';

    $form['submitted']['e_mail']['#prefix'] = "<div class=\"col-sm-4 col-md-4\"><div class=form-group>";
    $form['submitted']['e_mail']['#suffix'] = "</div></div>";
    $form['submitted']['e_mail']['#attributes']['class'][] = 'form-control';

    $form['submitted']['subject']['#prefix'] = "<div class=\"col-sm-4 col-md-4\"><div class=form-group>";
    $form['submitted']['subject']['#suffix'] = "</div></div></div>";
    $form['submitted']['subject']['#attributes']['class'][] = 'form-control';

    $form['submitted']['message']['#prefix'] = "<div class=row><div class=col-md-12><div class=form-group>";
    $form['submitted']['message']['#suffix'] = "</div></div></div>";
    $form['submitted']['message']['#attributes']['class'][] = 'form-control';


    $form['actions']['submit']['#prefix']= "<div class=\"row\"><div class=\"form-group col-sm-3 col-md-3\"><div class=form-group>";
    $form['actions']['submit']['#suffix']= "</div></div></div>";
  }

  if($form_id == 'webform_client_form_30') {
    $form['submitted']['e_mail']['#prefix'] = "<div class=row><div class=col-md-6><div class=form-group>";
    $form['submitted']['e_mail']['#suffix'] = "</div></div>";
    $form['submitted']['e_mail']['#attributes']['class'][] = 'form-control';

    $form['submitted']['name']['#prefix'] = "<div class=col-md-6><div class=form-group>";
    $form['submitted']['name']['#suffix'] = "</div></div></div>";
    $form['submitted']['name']['#attributes']['class'][] = 'form-control';

    $form['actions']['submit']['#prefix']= "<div class=\"row\"><div class=\"col-sm-3 col-md-3\">";
    $form['actions']['submit']['#suffix']= "</div></div>";
  }
}