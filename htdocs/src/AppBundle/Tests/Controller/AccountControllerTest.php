<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AccountControllerTest extends webTestCase
{
  /**
   * @dataProvider urlProvider
   */
  public function testHomeAndStaticPages($url)
  {
    $client = self::createClient();
    $client->request('GET', $url);

    $this->assertTrue($client->getResponse()->isSuccessful());
  }

  public function urlProvider()
  {
    return array(
      array('/front/es/login'),
      array('front/es/contact'),
      array('front/es/privacy'),
      array('front/es/register'),
    );
  }

  /**
   * @dataProvider linkProvider
   */
  public function testIfExistsHomeLinks($links)
  {
    $client  = self::createClient();
    $crawler = $client->request('GET', '/front/es/login');
    $link=$crawler
      ->filter('a:contains('.$links.')')
      ->eq(0)
      ->link();
    $crawler = $client->click($link);
  }

  public function linkProvider()
  {
    return array(
      array('Contacto'),
      array('Privacidad'),
      array('mycats'),
      array('Regístrate'),
    );
  }
}
