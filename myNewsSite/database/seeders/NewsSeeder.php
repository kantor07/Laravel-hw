<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Models\News;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    protected function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        for($i=0;$i<10; $i++) {
            $data[] = [
                'category_id'   =>$faker->numberBetween(1,10),
                'source_id'     =>$faker->numberBetween(1,10),
                'title'         => $faker->jobTitle(),
                'author'        => $faker->userName(),
                'status'        => News::DRAFT,
                'image'         => $faker->imageUrl(),                
                'description'   => $faker->text(100),
                'created_at'    => now('Europe/Moscow')
            ];
        }

        return $data;
    }
}
