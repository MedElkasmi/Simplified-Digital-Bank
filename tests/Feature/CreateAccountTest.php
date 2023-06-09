<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\AccountType;

class CreateAccountTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_account()
    {
        $this->withoutExceptionHandling();

        // Arrange
        // First, we need a user who will create the account
        $user = User::factory()->create();

        // And an account type for the account
        $accountType = AccountType::factory()->create();

        // We also need to simulate that the user is logged in
        $this->actingAs($user);

        // Create account data
        $attributes = [
            'user_id' => $user->id,
            'account_name' => 'My Account',
            'account_type' => $accountType->type_name,
            'account_number' => '012345678999',
            'currency_type' => 'USD',
            'initial_deposit' => 1000,
            'question' => 'Security Question?',
            'answer' => 'Security Answer',
            'tax_id' => '1234567890'
        ];

        // Act
        // Submit the POST request to create an account
        $response = $this->post('/account', $attributes);

        // Assert
        // Check that the account was created in the database
        $this->assertDatabaseHas('accounts', ['account_name' => 'My Account']);


        // Check the response
        $response->assertSessionHas('success', 'Account created successfully');

    }
}
