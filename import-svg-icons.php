<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 17/10/18
 * Time: 15:51
 */

$icon_data = array(
  'Accès handicapé' => array('symbol_id' =>'handicap', 'svg' => 'access-handicape.svg'),
  'Balise radio' => array('symbol_id' =>'radio', 'svg' => 'balise-radio.svg'),
  'Bar' => array('symbol_id' =>'bar', 'svg' => 'bar.svg'),
  'Bivouac' => array('symbol_id' =>'bivouac', 'svg' => 'bivouac.svg'),
  'CB' => array('symbol_id' =>'cb', 'svg' => 'cb.svg'),
  'Chauffage' => array('symbol_id' =>'chauffage', 'svg' => 'chauffage.svg'),
  'Couverture' => array('symbol_id' =>'couverture', 'svg' => 'couverture.svg'),
  'Defebrilateur' => array('symbol_id' =>'defibrillateur', 'svg' => 'defebrillateur.svg'),
  'Dortoirs' => array('symbol_id' =>'dortoir', 'svg' => 'dortoirs.svg'),
  'Douche' => array('symbol_id' =>'douche', 'svg' => 'douche.svg'),
  'Eau potable' => array('symbol_id' =>'eau', 'svg' => 'eau-potable.svg'),
  'Lumière' => array('symbol_id' =>'lumiere', 'svg' => 'lumiere.svg'),
  'Nombre de couchage' => array('symbol_id' =>'couchage', 'svg' => 'nb-couchages.svg'),
  'Pharmacie' => array('symbol_id' => 'pharma', 'svg' => 'pharmacie.svg'),
  'Plaque de cuisson' => array('symbol_id' =>'cuisson', 'svg' => 'plaque-cuisson.svg'),
  'Prise electrique' => array('symbol_id' =>'prise', 'svg' => 'prise-electrique.svg'),
  'Restauration' => array('symbol_id' =>'restauration', 'svg' => 'restauration.svg'),
  'Salle hors sac' => array('symbol_id' =>'horssac', 'svg' => 'salle-hors-sac.svg'),
  'Toilettes' => array('symbol_id' =>'toilettes', 'svg' => 'toilettes.svg'),
  'Vaisselle' => array('symbol_id' =>'vaisselle', 'svg' => 'vaisselle.svg'),
  'Wifi' => array('symbol_id' =>'wifi', 'svg' => 'wifi.svg')
);

// Chemin sur le poste de dev
//$path = '/home/ubuntu/icones/';

// Chemin sur le serveur de recette
$path = '/home/admin_user/icones-svg/';

// Récupération de tous les termes du vocabulaire Icones
use Drupal\taxonomy\Entity\Term;
$vid = 'icons';
$terms =\Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid);

// Pour chaque terme
foreach ($terms as $term) {
  // On charge chaque entité Terme correspondante
  $term = \Drupal\taxonomy\Entity\Term::load($term->tid);
  $term_name = $term->name->getValue()[0]['value'];

  // On donne au champ field_symbol_id la valeur stockée dans $icon_data
  $symbol_id = $icon_data[$term_name]['symbol_id'];
  $term->field_symbol_id->setValue($symbol_id);

  // On récupère le fichier svg correspondant stocké dans $path.
  $svg_file = $icon_data[$term_name]['svg'];
  $file_content = file_get_contents($path . $svg_file);

  // On enregistre ce fichier dans public://icons/svgs/
  $directory = 'public://icons/svgs/';
  file_prepare_directory($directory, FILE_CREATE_DIRECTORY);
  $file = file_save_data($file_content, $directory . $svg_file, FILE_EXISTS_REPLACE);

  // On donne l'identifiant de ce fichier au champ field_svg_file du terme.
  $term->field_svg_file->setValue(['target_id' => $file->id()]);

  // On finit en enregistrant le terme.
  $term->save();
}
