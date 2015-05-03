<?php

namespace AppBundle\Util;


class Util
{
  static public function getSlug($string, $separator= '-')
  {
    //http://cubiq.org/the-perfect-php-clean-url-generator
    $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    $slug = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $slug);
    $slug = strtolower(trim($slug, $separator));
    $slug = preg_replace("/[\/_|+ -]+/", $separator, $slug);

    return $slug;
  }
}
