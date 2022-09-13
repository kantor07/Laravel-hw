<?php

namespace Tests\Browser\Admin;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/myNewsSite/public/admin/categories')
                    ->assertSee('Список категорий');
        });
    }

    public function testCreateForm(): void
    {
        $category = Category::factory()->create();

        $this->browse(static function (Browser $browser) use ($category) {
            $browser->visit('myNewsSite/public/admin/categories/create')
                    ->type('title', $category->title)
                    ->type('description', $category->description)
                    ->press('Сохранить')
                    ->assertPathIs('myNewsSite/public/admin/categories');
        });
    }
}
