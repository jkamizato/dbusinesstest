<?php

namespace Drupal\dbusiness\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Spa entity entities.
 *
 * @ingroup dbusiness
 */
interface SpaEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Spa entity name.
   *
   * @return string
   *   Name of the Spa entity.
   */
  public function getName();

  /**
   * Sets the Spa entity name.
   *
   * @param string $name
   *   The Spa entity name.
   *
   * @return \Drupal\dbusiness\Entity\SpaEntityInterface
   *   The called Spa entity entity.
   */
  public function setName($name);

  /**
   * Gets the Spa entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Spa entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Spa entity creation timestamp.
   *
   * @param int $timestamp
   *   The Spa entity creation timestamp.
   *
   * @return \Drupal\dbusiness\Entity\SpaEntityInterface
   *   The called Spa entity entity.
   */
  public function setCreatedTime($timestamp);

}
