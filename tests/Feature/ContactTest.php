<?php

use function Pest\Laravel\{post};

it('Can create a contact if all fields are filled', function () {
  $response = post('/contacts', [
      'email' => 'john.doe@example.com',
      'content' => 'This is a test message',
      'subject' => 'This is a test message',
      'noEmail' => 'true',
  ]);

  expect($response->getSession()->get('success'))->toBe('Votre message a été envoyé');
});

it('Cannot create a contact if message is not filled', function () {
  $response = post('/contacts', [
      'email' => 'john.doe@example.com',
      'content' => '',
      'subject' => '',
      'noEmail' => 'true',
  ]);

  $this->assertNotNull($response->getSession()->get('errors'));
});


it('Check create field validation', function () {
  $response = post('/contacts', [
      'email' => '',
      'content' => '',
      'subject' => '',
      'noEmail' => 'true',
  ]);

  $response->assertSessionHasErrors(['email']);
  $response->assertSessionHasErrors(['content']);
  $response->assertSessionHasErrors(['subject']);
});
