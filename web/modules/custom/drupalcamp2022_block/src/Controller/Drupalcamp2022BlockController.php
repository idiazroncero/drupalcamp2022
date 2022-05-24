<?php

namespace Drupal\drupalcamp2022_block\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for drupalcamp2022_block routes.
 */
class Drupalcamp2022BlockController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
