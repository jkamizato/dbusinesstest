<?php

namespace Drupal\dbusiness;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Spa entity entity.
 *
 * @see \Drupal\dbusiness\Entity\SpaEntity.
 */
class SpaEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\dbusiness\Entity\SpaEntityInterface $entity */

    switch ($operation) {

      case 'view':
        return AccessResult::allowed();
      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit spa entity entities');
      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete spa entity entities');
    }
    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add spa entity entities');
  }


}
