<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 11/12/18
 * Time: 18:38
 */

/**
 * @file
 * Contains \Drupal\refuges_links\Plugin\Block\RefugesLinksBlock.
 */

namespace Drupal\refuges_links\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * @Block(
 *   id = "refuges_links_block",
 *   admin_label = @Translation("Other refuges links"),
 *   category = @Translation("Custom")
 * )
 */
class RefugesLinksBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    switch($language) {
      case 'en':
        $title = 'Other refuges';
        $langcode = 'en';
        break;
      default:
        $title = 'Les autres refuges';
        $langcode = '';
    }

    $subsites = array(
      'arpont' => array('localhost' => 'arpont2', 'remote' => 'arpont', 'title' => 'Refuge de l\'Arpont'),
      'bois' => array('localhost' => 'bois2', 'remote' => 'dubois', 'title' => 'Refuge du Bois'),
      'femma' => array('localhost' => 'femma2', 'remote' => 'femma', 'title' => 'Refuge de la Femma'),
      'fours' => array('localhost' => 'fours2', 'remote' => 'fonddesfours', 'title' => 'Refuge du Fond des Fours'),
      'lac' => array('localhost' => 'lac2', 'remote' => 'plandulac', 'title' => 'Refuge de Plan du Lac'),
      'leisse' => array('localhost' => 'leisse2', 'remote' => 'leisse', 'title' => 'Refuge de la Leisse'),
      'martin' => array('localhost' => 'martin2', 'remote' => 'lamartin', 'title' => 'Refuge de la Martin'),
      'orgere' => array('localhost' => 'orgere2', 'remote' => 'orgere', 'title' => 'Refuge de l\'Orgère'),
      'palet' => array('localhost' => 'palet2', 'remote' => 'coldupalet', 'title' => 'Refuge du Col du Palet'),
      'plaisance' => array('localhost' => 'plaisance2', 'remote' => 'plaisance', 'title' => 'Refuge de Plaisance'),
      'prariond' => array('localhost' => 'prariond2', 'remote' => 'prariond', 'title' => 'Refuge de Prariond'),
      'rosuel' => array('localhost' => 'rosuel2', 'remote' => 'rosuel', 'title' => 'Refuge de Rosuel'),
      'turia' => array('localhost' => 'turia2', 'remote' => 'turia', 'title' => 'Refuge de Turia'),
      'valette' => array('localhost' => 'valette2', 'remote' => 'valette', 'title' => 'Refuge de la Valette'),
      'vallonbrun' => array('localhost' => 'vallonbrun2', 'remote' => 'vallonbrun', 'title' => 'Refuge de Vallonbrun'),
    );

    $delivered_sites = [
      'arpont','bois','femma','fours','lac',
      'leisse','martin','orgere','palet','plaisance',
      'prariond','rosuel','turia','valette','vallonbrun'
    ];

    $domain_parts = explode('.',$_SERVER['HTTP_HOST']);
    $domain_tld = array_pop($domain_parts);

    $current_subsite = str_replace('sites/', '', \Drupal::service('site.path'));
    unset($subsites[$current_subsite]);

    $items = array();
    foreach ($subsites as $key=>$subsite) {
      if ($domain_tld == 'localhost') {
        $items[] = [
          'url' => 'www.' . $subsites[$key]['localhost'] . '.localhost/' . $langcode,
          'title' => $subsites[$key]['title']
        ];
      }
      elseif ($domain_tld == 'fr') {
        $items[] = [
          'url' => 'pnv-refuge-' . $subsites[$key]['remote'] . '.brgm-rec.fr/' . $langcode,
          'title' => $subsites[$key]['title']
        ];
      }
      else {
        if (in_array($key, $delivered_sites)) {
          $items[] = [
            'url' => 'refuge-' . $subsites[$key]['remote'] . '.vanoise.com/' . $langcode,
            'title' => $subsites[$key]['title']
          ];
        }
      }
    }

    return [
      '#theme' => 'refuges_links__block',
      '#items' => $items,
      '#block_title' => $title,
      '#attached' => ['library' => ['refuges_links/refuges_links']],
    ];
  }
}
