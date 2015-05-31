<?php

namespace AppBundle\Tests\Controller\StaticController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
class StaticControllerTest extends webTestCase
{
  /**
   * @dataProvider localeProvider
   */
  public function testPrivacyLanguage($locale)
  {
    $client = self::createClient();
    $client->request('GET', '/front/'.$locale.'/privacy');

    $this->assertTrue($client->getResponse()->isSuccessful());
  }

  public function localeProvider()
  {
    return array(
      array('es'),
      array('en'),
    );
  }
}
