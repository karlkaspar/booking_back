<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Helpers\AuthenticationHelper;



class ClientTest extends TestCase
{

  public function testStore()
  {
    $token = 'Bearer ' . AuthenticationHelper::generateAuthToken(1);
    $client = json_decode(file_get_contents('tests/Assertations/client.json'), true);

    $response = $this->post('/api/clients', [
      'fn' => $client['fn'],
      'ln' => $client['ln'],
      'phone' => $client['phone'],
      'workspot' => $client['workspot'],
      'notes' => $client['notes'],
      'animals' => [$client['animals'][0]]
    ], [
      'Authorization' => $token
    ]);
    $response->assertStatus(201);
  }

  public function testUpdate()
  {
    $token = 'Bearer ' . AuthenticationHelper::generateAuthToken(1);
    $client = json_decode(file_get_contents('tests/Assertations/client.json'), true);

    $response = $this->post('/api/clients/1', [
      'fn' => $client['fn'],
      'ln' => $client['ln'],
      'phone' => $client['phone'],
      'workspot' => $client['workspot'],
      'notes' => $client['notes'],
      'animals' => [$client['animals'][0]]
    ], [
      'Authorization' => $token
    ]);
    $response->assertStatus(200);
  }

  public function testSearch()
  {
    $token = 'Bearer ' . AuthenticationHelper::generateAuthToken(1);
    $client = json_decode(file_get_contents('tests/Assertations/client.json'), true);

    $response = $this->post('/api/clients/search', [
      'searchValue' => $client['fn']
    ], [
      'Authorization' => $token
    ]);
    $response->assertStatus(200);
  }

  public function testDestroy()
  {
    $token = 'Bearer ' . AuthenticationHelper::generateAuthToken(1);

    $response = $this->delete('/api/clients/1', [], [
      'Authorization' => $token
    ]);
    $response->assertStatus(200);
  }

  public function testList()
  {
    $token = 'Bearer ' . AuthenticationHelper::generateAuthToken(1);

    $response = $this->get('/api/clients', [
      'Authorization' => $token
    ]);
    $response->assertStatus(200);
  }
}
