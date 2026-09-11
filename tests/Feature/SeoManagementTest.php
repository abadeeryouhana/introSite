<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\SeoSetting;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SeoManagementTest extends TestCase
{
    use DatabaseTransactions;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::first() ?? User::factory()->create();
    }

    public function test_guest_cannot_access_seo_settings(): void
    {
        $response = $this->get(route('admin.seo.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_view_seo_settings_page(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.seo.index'));
        $response->assertStatus(200);
        $response->assertSee('SEO Management');
        $response->assertSee('Home Page');
        $response->assertSee('Meta Keywords');
    }

    public function test_admin_can_update_page_seo(): void
    {
        $response = $this->actingAs($this->admin)->post(route('admin.seo.update', 'home'), [
            'meta_title'       => 'Custom Tested Title For Bayan Group',
            'meta_description' => 'Custom Tested Description for SEO verification.',
            'meta_keywords'    => 'test_keyword1, test_keyword2, bayangroup_test',
            'robots'           => 'index, follow',
        ]);

        $response->assertRedirect(route('admin.seo.index', ['page' => 'home']));

        $this->assertDatabaseHas('seo_settings', [
            'page_key'         => 'home',
            'meta_title'       => 'Custom Tested Title For Bayan Group',
            'meta_keywords'    => 'test_keyword1, test_keyword2, bayangroup_test',
        ]);
    }

    public function test_frontend_renders_dynamic_seo_meta_tags(): void
    {
        SeoSetting::updateOrCreate(
            ['page_key' => 'home'],
            [
                'page_name'        => 'Home Page',
                'meta_title'       => 'Super Unique Home Title',
                'meta_description' => 'Super Unique Meta Description for testing.',
                'meta_keywords'    => 'unique_kw_1, unique_kw_2',
                'robots'           => 'index, follow',
            ]
        );

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('<title>Super Unique Home Title</title>', false);
        $response->assertSee('name="description" content="Super Unique Meta Description for testing."', false);
        $response->assertSee('name="keywords" content="unique_kw_1, unique_kw_2"', false);
        $response->assertSee('name="robots" content="index, follow"', false);
        $response->assertSee('application/ld+json', false);
    }

    public function test_sitemap_xml_returns_valid_xml(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $response->assertSee('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', false);
        $response->assertSee('<loc>' . url('/') . '</loc>', false);
        $response->assertSee('<loc>' . route('about') . '</loc>', false);
        $response->assertSee('<loc>' . route('services.page') . '</loc>', false);
    }
}
