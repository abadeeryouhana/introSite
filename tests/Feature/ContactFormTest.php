<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Country;
use App\Models\ContactMessage;

class ContactFormTest extends TestCase
{
    public function test_contact_page_loads_with_countries(): void
    {
        $response = $this->get('/contact-us');

        $response->assertStatus(200);
        $response->assertSee('COUNTRY');
        $response->assertSee('country_select');
        $response->assertSee('country_code_select');
        $response->assertSee('service_select');
        $response->assertSee('tom-select');
        $response->assertSee('Egypt');
        $response->assertSee('+20');
        $response->assertSee('United States');
        $response->assertSee('+1');
    }

    public function test_contact_form_submission_with_country(): void
    {
        $payload = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.test',
            'country' => 'Egypt',
            'country_code' => '+20',
            'phone' => '1012345678',
            'company' => 'Acme Corp',
            'title' => 'Director',
            'service' => 'Other',
            'message' => 'Testing country and phone code submission.'
        ];

        $response = $this->post('/contact-us', $payload);

        $response->assertRedirect(route('contact'));
        $this->assertDatabaseHas('contact_messages', [
            'first_name' => 'John',
            'email' => 'johndoe@example.test',
            'country' => 'Egypt',
            'country_code' => '+20',
            'phone' => '1012345678',
        ]);
    }
}
