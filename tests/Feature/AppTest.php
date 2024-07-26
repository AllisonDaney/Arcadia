<?php

uses(Tests\TestCase::class)->in('Feature');
use function Pest\Laravel\{get, actingAs};
use App\Models\User;
use App\Models\Role;


it('Can access to not logged in page', function () {
    get('/')->assertStatus(200);
    get('/homes')->assertStatus(200);
    get('/animals')->assertStatus(200);
    get('/services')->assertStatus(200);
    get('/contacts')->assertStatus(200);
    get('/infos')->assertStatus(200);
});

it('Can access to logged in page as administrator', function () {
    $user = User::factory()->make([
        'role_id' => Role::where('label', 'ADMINISTRATOR')->first()->id
    ]);

    actingAs($user)->get('/administration/homes_comments')->assertStatus(200);
    actingAs($user)->get('/administration/animals_reports')->assertStatus(200);
    actingAs($user)->get('/administration/users')->assertStatus(200);
    actingAs($user)->get('/administration/hours')->assertStatus(200);
    actingAs($user)->get('/administration/homes')->assertStatus(200);
    actingAs($user)->get('/administration/animals')->assertStatus(200);
    actingAs($user)->get('/administration/services')->assertStatus(200);
    actingAs($user)->get('/administration/feedbacks')->assertStatus(200);
    actingAs($user)->get('/administration/veterinarians_reports')->assertStatus(200);
    actingAs($user)->get('/administration/administrator')->assertStatus(200);
    actingAs($user)->get('/administration/employee')->assertStatus(302);
    actingAs($user)->get('/administration/veterinary')->assertStatus(302);
});

it('Can access to logged in page as employee', function () {
    $user = User::factory()->make([
        'role_id' => Role::where('label', 'EMPLOYEE')->first()->id
    ]);

    actingAs($user)->get('/administration/homes_comments')->assertStatus(200);
    actingAs($user)->get('/administration/animals_reports')->assertStatus(200);
    actingAs($user)->get('/administration/users')->assertStatus(302);
    actingAs($user)->get('/administration/hours')->assertStatus(302);
    actingAs($user)->get('/administration/homes')->assertStatus(302);
    actingAs($user)->get('/administration/animals')->assertStatus(302);
    actingAs($user)->get('/administration/veterinarians_reports')->assertStatus(302);
    actingAs($user)->get('/administration/services')->assertStatus(200);
    actingAs($user)->get('/administration/feedbacks')->assertStatus(200);
    actingAs($user)->get('/administration/administrator')->assertStatus(302);
    actingAs($user)->get('/administration/employee')->assertStatus(200);
    actingAs($user)->get('/administration/veterinary')->assertStatus(302);
});

it('Can access to logged in page as veterinarian', function () {
    $user = User::factory()->make([
        'role_id' => Role::where('label', 'VETERINARY')->first()->id
    ]);

    actingAs($user)->get('/administration/homes_comments')->assertStatus(200);
    actingAs($user)->get('/administration/animals_reports')->assertStatus(200);
    actingAs($user)->get('/administration/users')->assertStatus(302);
    actingAs($user)->get('/administration/hours')->assertStatus(302);
    actingAs($user)->get('/administration/homes')->assertStatus(302);
    actingAs($user)->get('/administration/animals')->assertStatus(302);
    actingAs($user)->get('/administration/services')->assertStatus(302);
    actingAs($user)->get('/administration/veterinarians_reports')->assertStatus(200);
    actingAs($user)->get('/administration/feedbacks')->assertStatus(302);
    actingAs($user)->get('/administration/administrator')->assertStatus(302);
    actingAs($user)->get('/administration/employee')->assertStatus(302);
    actingAs($user)->get('/administration/veterinary')->assertStatus(200);
});