<?php

/* 以下のコマンドで生成したマイグレーションファイル
 * sail artisan make:migration create_teams_table --create=teams
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            /* coaches テーブルとの関連付けをするための外部キーを設定する */
            $table->foreignId('coach_id') // coach_id というカラムを作成する
                ->nullable() // 外部キーにnull を設定できるようにする
                ->default(null) // 外部キーのデフォルト値をnullに設定する
                ->constrained('coaches');  // 関連づけるテーブル名を指定する(※先にcoaches テーブルを作成しておく必要がある)

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
        Schema::dropIfExists('teams');
    }
};
