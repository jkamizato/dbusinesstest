<?php

namespace Drupal\dbusiness\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Spa entity entity.
 *
 * @ingroup dbusiness
 *
 * @ContentEntityType(
 *   id = "spa_entity",
 *   label = @Translation("Spa entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\dbusiness\SpaEntityListBuilder",
 *     "views_data" = "Drupal\dbusiness\Entity\SpaEntityViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\dbusiness\Form\SpaEntityForm",
 *       "add" = "Drupal\dbusiness\Form\SpaEntityForm",
 *       "edit" = "Drupal\dbusiness\Form\SpaEntityForm",
 *       "delete" = "Drupal\dbusiness\Form\SpaEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\dbusiness\SpaEntityHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\dbusiness\SpaEntityAccessControlHandler",
 *   },
 *   base_table = "spa_entity",
 *   translatable = FALSE,
 *   admin_permission = "administer spa entity entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
 *   links = {
 *     "canonical" = "/spa/{spa_entity}",
 *     "add-form" = "/admin/structure/spa_entity/add",
 *     "edit-form" = "/admin/structure/spa_entity/{spa_entity}/edit",
 *     "delete-form" = "/admin/structure/spa_entity/{spa_entity}/delete",
 *     "collection" = "/admin/structure/spa_entity",
 *   },
 *   field_ui_base_route = "spa_entity.settings"
 * )
 */
class SpaEntity extends ContentEntityBase implements SpaEntityInterface {

  use EntityChangedTrait;
  use EntityPublishedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add the published field.
    $fields += static::publishedBaseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Spa entity entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['status']->setDescription(t('A boolean indicating whether the Spa entity is published.'))
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => -3,
      ]);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    $fields['url'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Url'))
      ->setDescription(t('Url'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['slider'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Slider'))
      ->setDescription(t('Slider'))
      ->setSetting('target_type', 'node')
      ->setSetting('handler_settings', ['target_bundles' => ['slider' => 'slider']])
      ->setSetting('handler', 'default:node')
      ->setRequired(TRUE)
      ->setRevisionable(FALSE)
      ->setCardinality(6)
      ->setDisplayOptions('form', [
        'type' => 'inline_entity_form_complex',
        'weight' => -4,
        'settings' => [
          'form_mode' => 'default',
          'collapsible' => true,
          'allow_new' => true,
          'allow_existing' => true,
          'collapsed' => false,
          'match_operator' => 'CONTAINS',
        ],
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'weight' => -4,
        'type' => 'entity_reference_entity_view'
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['blocks'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Blocks'))
      ->setDescription(t('Blocks'))
      ->setSetting('target_type', 'block_content')
      ->setRequired(FALSE)
      ->setRevisionable(FALSE)
      ->setCardinality(-1)
      ->setDisplayOptions('form', [
        'type' => 'inline_entity_form_complex',
        'weight' => -4,
        'settings' => [
          'form_mode' => 'default',
          'collapsible' => true,
          'allow_new' => true,
          'allow_existing' => true,
          'collapsed' => false,
          'match_operator' => 'CONTAINS',
        ],
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'weight' => -4,
        'type' => 'entity_reference_entity_view'
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);


      $fields['contato'] = BaseFieldDefinition::create('entity_reference')
          ->setLabel(t('Contato'))
          ->setDescription(t('Contato'))
          ->setSetting('target_type', 'node')
          ->setSetting('handler_settings', ['target_bundles' => ['contact_form' => 'contact_form']])
          ->setSetting('handler', 'default:node')
          ->setRequired(TRUE)
          ->setDefaultValue('Contato')
          ->setRevisionable(FALSE)
          ->setCardinality(6)
          ->setDisplayOptions('view', [
              'label' => 'hidden',
              'weight' => -4,
              'type' => 'contact_field_formatter'
          ])
          ->setDisplayConfigurable('form', TRUE)
          ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
