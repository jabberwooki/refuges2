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
    $sites = array(
      'arpont' => array('name' => 'arpont', 'title' => 'Refuge de l\'Arpont'),
      'bois' => array('name' => 'dubois', 'title' => 'Refuge du Bois'),
      'femma' => array('name' => 'femma', 'title' => 'Refuge de la Femma'),
      'fours' => array('name' => 'fonddesfours', 'title' => 'Refuge du Fond des Fours'),
      'lac' => array('name' => 'plandulac', 'title' => 'Refuge de Plan du Lac'),
      'leisse' => array('name' => 'leisse', 'title' => 'Refuge de la Leisse'),
      'martin' => array('name' => 'lamartin', 'title' => 'Refuge de la Martin'),
      'orgere' => array('name' => 'orgere', 'title' => 'Refuge de l\'Orgère'),
      'palet' => array('name' => 'coldupalet', 'title' => 'Refuge du Col du Palet'),
      'plaisance' => array('name' => 'plaisance', 'title' => 'Refuge de Plaisance'),
      'prariond' => array('name' => 'prariond', 'title' => 'Refuge de Prariond'),
      'rosuel' => array('name' => 'rosuel', 'title' => 'Refuge de Rosuel'),
      'turia' => array('name' => 'turia', 'title' => 'Refuge de Turia'),
      'valette' => array('name' => 'valette', 'title' => 'Refuge de la Valette'),
      'vallonbrun' => array('name' => 'vallonbrun', 'title' => 'Refuge de Vallonbrun'),
    );

    $domain_parts = explode('.',$_SERVER['HTTP_HOST']);

    $sub_domain = $domain_parts[0];
    $domain = $domain_parts[1];
    $domain_tld = $domain_parts[2];
    $current_site = str_replace('sites/', '', \Drupal::service('site.path'));

    unset($sites[$current_site]);

    $items = array();
    foreach ($sites as $key=>$site) {
      if ($domain_tld == 'localhost') {
        if ($domain == 'vanoise') {
          $url = 'recette-' . $sites[$key]['name'] . '.vanoise.localhost';
        }
        else {
          $url = 'www.' . $key . '2' . '.localhost';
        }
      }
      else {
        $parts = explode('-', $sub_domain);
        $url = $parts[0] . '-' . $sites[$key]['name'] . '.vanoise.com';
      }

      $items[] = [
        'url' => $url,
        'title' => $sites[$key]['title']
      ];
    }

    return [
      '#theme' => 'refuges_links__block',
      '#items' => $items,
      '#attached' => ['library' => ['refuges_links/refuges_links']],
    ];
  }
}
