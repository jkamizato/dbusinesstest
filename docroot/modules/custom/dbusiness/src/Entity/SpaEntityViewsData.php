<?php

namespace Drupal\dbusiness\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Spa entity entities.
 */
class SpaEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
