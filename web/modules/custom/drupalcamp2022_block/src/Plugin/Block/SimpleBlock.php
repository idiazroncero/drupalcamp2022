<?php

namespace Drupal\drupalcamp2022_block\Plugin\Block;

use Drupal\Component\Utility\Html;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Simple Block as an example for front-end development.
 *
 * The markup is rendered as a render array, all the logic is inside the
 * build method, no theme hooks are invoked.
 *
 * @Block(
 *   id = "drupalcamp2022_simple_block",
 *   admin_label = @Translation("Simple Block"),
 *   category = @Translation("drupalcamp2022")
 * )
 */
class SimpleBlock extends BlockBase {

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

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['name'] = $form_state->getValue('name');
    $this->configuration['border'] = $form_state->getValue('border');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $name = $this->configuration['name'];
    $border = (bool) $this->configuration['border'];

    $build = [
      'simpleblock' => [
        '#type' => 'html_tag',
        '#tag' => 'section',
        '#attributes' => [
          'id' => Html::getUniqueId('simpleblock'),
          'class' => [
            'simple-block'
          ],
          'data-type' => 'simple-block'
        ],
        'image' => [
          '#type' => 'html_tag',
          '#tag' => 'img',
          '#attributes' => [
            'src' => 'modules/custom/drupalcamp2022_block/img/profile-male.svg',
            'loading' => 'lazy',
            'class' => [
              'simple-block__image'
            ]
          ],
        ],
        'name' => [
          '#type' => 'html_tag',
          '#tag' => 'h1',
          '#attributes' => [
            'class' => [
              'simple-block__name'
            ]
          ],
        ],
      ]
    ];

    // Conditionally add the border class.
    if ($border) {
      $build['simpleblock']['#attributes']['class'][] = "simple-block--bordered";
    };

    // Split the name and generate a <span> wrapper around each one.
    $split_name = explode(' ', $name);

    foreach($split_name as $key => $value) {
      $build['simpleblock']['name']["part-$key"] = [
        '#type' => 'html_tag',
        '#tag' => 'span',
        '#value' => $value,
        '#attributes' => [
          'class' => [
            'simple-block__name__part',
            'simple-block__name__part--' . $key
          ]
        ]
      ];
    }

    return $build;
  }

}
