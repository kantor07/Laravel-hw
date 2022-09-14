<?php

namespace Tests\Browser\Admin;

use App\Models\Category;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends DuskTestCase
{
    use DatabaseTransactions;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                    ->assertSee('Список категорий');
        });
    }

    public function testCreateForm(): void
    {
        $category = Category::factory()->create();

        $this->browse(static function (Browser $browser) use ($category) {
            $browser->visit('/admin/categories/create')
                    ->type('title', $category->title)
                    ->type('description', $category->description)
                    ->press('Сохранить')
                    ->assertPathIs('/admin/categories');
        });
    }
}
