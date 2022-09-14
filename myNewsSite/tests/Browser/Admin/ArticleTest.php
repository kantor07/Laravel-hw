<?php

namespace Tests\Browser\Admin;


use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends DuskTestCase
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
            $browser->visit('/admin/articles')
                    ->assertSee('Список новостей');
        });
    }

    public function testEditForm(): void
    {
        $article = Article::factory()->create();

        $this->browse(static function (Browser $browser) use ($article) {
            $browser->visit('/admin/articles/1/edit')
                    ->select('category_id', $article->category->title)
                    ->type('title', $article->title)
                    ->type('author', $article->author)
                    ->select('status', $article->status)
                    ->select('source_id', $article->source->title)
                    ->type('description', $article->description)
                    ->press('Сохранить')
                    ->assertPathBeginsWith('/admin/articles');
        });
    }

    public function testCreateForm(): void
    {
        $article = Article::factory()->create();

        $this->browse(static function (Browser $browser) use ($article) {
            $browser->visit('/admin/articles/create')
                    ->select('category_id', $article->category->title)
                    ->type('title', $article->title)
                    ->type('author', $article->author)
                    ->select('status', $article->status)
                    ->select('source_id', $article->source->title)
                    ->type('description', $article->description)
                    ->press('Сохранить')
                    ->assertPathBeginsWith('/admin/articles');
        });
    }
}
