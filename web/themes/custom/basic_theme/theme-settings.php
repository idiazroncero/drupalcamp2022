<?php

/**
 * @file
 * Theme settings form for Basic Theme theme.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function basic_theme_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['basic_theme'] = [
    '#type' => 'details',
    '#title' => t('Basic Theme'),
    '#open' => TRUE,
  ];

  $form['basic_theme']['font_size'] = [
    '#type' => 'number',
    '#title' => t('Font size'),
    '#min' => 12,
    '#max' => 18,
    '#default_value' => theme_get_setting('font_size'),
  ];

}
