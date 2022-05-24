<?php

namespace Drupal\drupalcamp2022_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Theme Hook Block as an example for more advanced techniques.
 *
 * The markup is rendered as a theme hook.
 *
 * @Block(
 *   id = "drupalcamp2022_themehook_block",
 *   admin_label = @Translation("Theme Hook Block"),
 *   category = @Translation("drupalcamp2022")
 * )
 */
class ThemeHookBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#description' => $this->t('Your name'),
      '#default_value' => isset($this->configuration['name']) ? $this->configuration['name'] : 'Write your name here',
      '#maxlength' => 64,
      '#size' => 64,
    ];

    $form['border'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable border'),
      '#default_value' => isset($this->configuration['border']) ? $this->configuration['border'] : FALSE,
    ];

    $form['icon'] = [
      '#type' => 'radios',
      '#title' => $this->t('Icon type'),
      '#options' => [
        'male' => 'Male',
        'female' => 'Female',
        'other' => $this->t('Other / Non-binary / Prefer not to say')
      ],
      '#default_value' => isset($this->configuration['icon']) ? $this->configuration['icon'] : 'female',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['name'] = $form_state->getValue('name');
    $this->configuration['border'] = $form_state->getValue('border');
    $this->configuration['icon'] = $form_state->getValue('icon');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'drupalcamp2022_card',
      '#name' => $this->configuration['name'],
      '#border' => $this->configuration['border'],
      '#icon' => $this->configuration['icon'],
    ];
  }

}
