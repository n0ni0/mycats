<?php

namespace AppBundle\Tests\Form\Frontend\Type\ContactTypeTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactTypeTest extends webTestCase
{
  public function testContactForm()
  {
    $client  = static::createClient();
    $crawler = $client->request('GET', '/front/es/contact');

    $form = $crawler->selectButton('Enviar')->form();
    $form['contact[name]']    = 'test';
    $form['contact[mail]']    = 'test@localhost.com';
    $form['contact[content]'] = 'test message';

    $client->submit($form);
    $this->assertTrue($client->getResponse()->isRedirect());
  }
}
