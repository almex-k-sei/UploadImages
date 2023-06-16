<?php

/* 以下のコマンドで生成したマイグレーションファイル
 * sail artisan make:migration create_players_table --create=players
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            /* teams テーブルとの関連付けをするための外部キーを設定する */
            $table->foreignId('team_id') // team_id というカラムを作成する
                ->nullable() // 外部キーにnull を設定できるようにする
                ->default(null) // 外部キーのデフォルト値をnullに設定する
                ->constrained('teams');  // 関連づけるテーブル名を指定する(※先にteams テーブルを作成しておく必要がある)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
};
