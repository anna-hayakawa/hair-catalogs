<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags_names = [
            '結婚式',
            'イベント',
            'ライヴ',
            'コンサート',
            'お出かけ',
            '卒業式',
            'パーティー',
            'お食事会',
            'その他'
        ];

        foreach ($tags_names as $tags_name) {

            $tag = new \App\Tag();
            $tag->tag_name = $tags_name;
            $tag->save();
        }
    }
}
