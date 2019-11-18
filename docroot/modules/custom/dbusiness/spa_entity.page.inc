<?php

/**
 * @file
 * Contains spa_entity.page.inc.
 *
 * Page callback for Spa entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Spa entity templates.
 *
 * Default template: spa_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_spa_entity(array &$variables) {
  // Fetch SpaEntity Entity Object.
  $spa_entity = $variables['elements']['#spa_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}

function template_preprocess_page(array &$variables) {

}