<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_news_create_successful_page()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertViewIs('admin.news.create')
            ->assertStatus(200);
    }

    public function test_news_edit_successful_page()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertViewIs('admin.news.index')
            ->assertStatus(200);
    }

    public function test_news_category_page()
    {
        $response = $this->get(route('sitePage.categoryNewsPage'));

        $response->assertViewIs('sitePage.categoryNewsPage')
            ->assertStatus(200);

    }

    public function test_homePage_page()
    {
        $response = $this->get(route('sitePage.homePage'));
        $response->assertSee('Написать комментарий');
        $response->assertSee('Заказать новость');
    }

}
