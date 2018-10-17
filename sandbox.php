<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 17/10/18
 * Time: 15:51
 */

$icon_data = array(
'Accès handicapé' => array('symbol_id' =>'handicap', 'svg' => ''),
'Balise radio' => array('symbol_id' =>'radio', 'svg' => ''),
'Bar' => array('symbol_id' =>'bar', 'svg' => ''),
'Bivouac' => array('symbol_id' =>'bivouac', 'svg' => ''),
'CB' => array('symbol_id' =>'cb', 'svg' => ''),
'Chauffage' => array('symbol_id' =>'chauffage', 'svg' => ''),
'Couverture' => array('symbol_id' =>'couverture', 'svg' => ''),
'Defebrilateur' => array('symbol_id' =>'defibrillateur', 'svg' => ''),
'Dortoirs' => array('symbol_id' =>'dortoir', 'svg' => ''),
'Douche' => array('symbol_id' =>'douche', 'svg' => ''),
'Eau potable' => array('symbol_id' =>'eau', 'svg' => ''),
'Lumière' => array('symbol_id' =>'lumiere', 'svg' => ''),
'Nombre de couchage' => array('symbol_id' =>'couchage', 'svg' => ''),
'Pharmacie' => array('symbol_id' => 'pharma', 'svg' => ''),
'Plaque de cuisson' => array('symbol_id' =>'cuisson', 'svg' => ''),
'Prise electrique' => array('symbol_id' =>'prise', 'svg' => ''),
'Restauration' => array('symbol_id' =>'restauration', 'svg' => ''),
'Salle hors sac' => array('symbol_id' =>'horssac', 'svg' => ''),
'Toilettes' => array('symbol_id' =>'toilettes', 'svg' => ''),
'Vaisselle' => array('symbol_id' =>'vaisselle', 'svg' => ''),
'Wifi' => array('symbol_id' =>'wifi', 'svg' => '')
);

$vid = 'icons';
$terms =\Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid);

use Drupal\taxonomy\Entity\Term;
$vid = 'icons';
$terms =\Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid);

foreach ($terms as $term) {
  $term = \Drupal\taxonomy\Entity\Term::load($term->tid);
  $term_name = ($term->name->getValue()[0]['value']);
  $symbol_id = ($icon_data[$term_name]['symbol_id']);
  $term->field_symbol_id->setValue($symbol_id);
  $term->save();
}



