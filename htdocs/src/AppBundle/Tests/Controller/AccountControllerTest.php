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
      array('/front/en/login'),
      array('front/es/contact'),
      array('front/en/contact'),
      array('front/es/privacy'),
      array('front/en/privacy'),
      array('front/es/register'),
      array('front/en/register'),
    );
  }
}
