<?php

/* 以下のコマンドで生成したマイグレーションファイル
 * sail artisan make:seeder InitializePositionsTableSeeder
 *
 * このファイルで設定した内容を実行するのは以下のコマンド
 * sail artisan db:seed --class=InitializePositionsTableSeeder
 */

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/* データベースへのレコード追加のために、DBファサードを利用する */
use Illuminate\Support\Facades\DB;

class InitializePositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert(
            [
                ['name' => 'フォワード'],
                ['name' => 'ミッドフィルダー'],
                ['name' => 'ボランチ'],
                ['name' => 'ディフェンダー'],
                ['name' => 'キーパー'],
            ]
        );
    }
}
