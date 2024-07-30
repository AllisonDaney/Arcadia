<?php

use function Pest\Laravel\{post};

it('Can create a feedback if all fields are filled', function () {
    $response = post('/feedbacks', [
        'pseudo' => 'John Doe',
        'content' => 'This is a test message',
        'rating' => 5,
    ]);

    expect($response->getSession()->get('success'))->toBe('Votre avis a été envoyé');
});

it('Cannot create a feedback if content is not filled', function () {
    $response = post('/feedbacks', [
        'pseudo' => 'John Doe',
        'content' => '',
        
        'rating' => 5,
    ]);

    $this->assertNotNull($response->getSession()->get('errors'));
});

it('Check create field validation', function () {
  $response = post('/feedbacks', [
      'pseudo' => '',
      'content' => '',
      'rating' => 5,
  ]);

  $response->assertSessionHasErrors(['content']);
  $response->assertSessionHasErrors(['pseudo']);
});
