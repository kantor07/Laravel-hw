<?php

namespace Tests\Browser\Admin;

use App\Models\Source;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SourceTest extends DuskTestCase
{
    use DatabaseTransactions;
    
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/sources')
                    ->assertSee('Добавить источник новостей')
                    ->clickLink('Ред.')
                    ->assertPathBeginsWith('/admin');
        });
    }

    public function testCreateForm(): void
    {
        $source = Source::factory()->create();

        $this->browse(static function (Browser $browser) use ($source) {
            $browser->visit('/admin/sources/create')
                    ->type('title', $source->title)
                    ->type('url', $source->url)
                    ->press('Сохранить')
                    ->assertPathIs('/admin/sources');
        });
    }
}
