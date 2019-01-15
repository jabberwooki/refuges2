<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 02/12/18
 * Time: 18:13
 */

namespace Drupal\refuges_meteo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a meteo Block.
 *
 * @Block(
 *   id = "meteo_block",
 *   admin_label = @Translation("Meteo block")
 * )
 */

class MeteoBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $markup = "<div id=\"weather\"></div>";
    $markup .= "<script src='https://cdn.rawgit.com/monkeecreate/jquery.simpleWeather/master/jquery.simpleWeather.min.js'></script>";
    $markup .= "<script  src=\"js/index.js\"></script>";

      return [
        '#type' => 'markup',
        '#markup' => '<h2>Foo Bar</h2>',
      ];
  }
}

