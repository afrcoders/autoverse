<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('pages.home');
    }

    public function test_products_page_loads_successfully(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertViewIs('pages.products');
    }

    public function test_contact_page_loads_successfully(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertViewIs('pages.contact');
    }

    public function test_privacy_page_loads_successfully(): void
    {
        $response = $this->get('/privacy');

        $response->assertStatus(200);
        $response->assertViewIs('pages.privacy');
    }

    public function test_products_page_accepts_search_query(): void
    {
        $response = $this->get('/products?q=toyota');

        $response->assertStatus(200);
        $response->assertViewHas('filters');
    }

    public function test_products_page_accepts_type_filter(): void
    {
        $response = $this->get('/products?type=sedan');

        $response->assertStatus(200);
    }

    public function test_home_page_has_featured_slides(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewHas('featuredSlides');
    }

    public function test_home_page_has_latest_products(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewHas('latestProducts');
    }

    public function test_home_page_has_categories(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewHas('categories');
    }

    public function test_products_page_has_pagination(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertViewHas('products');
    }

    public function test_404_for_nonexistent_page(): void
    {
        $response = $this->get('/nonexistent-page');

        $response->assertStatus(404);
    }
}
