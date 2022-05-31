<?php

namespace Drupal\marquee_sina\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'Marquee' formatter.
 *
 * @FieldFormatter(
 *   id = "marquee_sina_marquee",
 *   label = @Translation("Marquee"),
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class MarqueeFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#type' => 'html_tag',
        '#tag' => 'marquee',
        '#value' => $item->value,
      ];
    }

    return $element;
  }

}
