<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $scheduled_date = new DateTime();
        for ($i = 0; $i < 100; $i++)
        {
            factory(App\Article::class, 1)
            // createに配列でカラム名、値をセットするとfactoryファイルの内容を上書きできる
            ->create([
                'post_date' => $scheduled_date->modify('+1day')->format('Y-m-d')
            ]);
        }
        
    }
}