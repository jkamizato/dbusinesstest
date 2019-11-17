<?php

namespace Drupal\dbusiness\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form controller for Spa entity edit forms.
 *
 * @ingroup dbusiness
 */
class SpaEntityForm extends ContentEntityForm {

  /**
   * The current user account.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $account;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Instantiates this form class.
    $instance = parent::create($container);
    $instance->account = $container->get('current_user');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    /** @var \Drupal\dbusiness\Entity\SpaEntity $entity */
    $entity = $this->entity;
    parent::save($form, $form_state);
    if (!$entity->get('url')->isEmpty()) {
      $url = $entity->get('url')->getValue();
      \Drupal::service('path.alias_storage')
        ->save('/spa/' . $entity->id(), '/' . $url[0]['value']);

    }

    $form_state->setRedirect('entity.spa_entity.canonical', ['spa_entity' => $entity->id()]);
  }
}
