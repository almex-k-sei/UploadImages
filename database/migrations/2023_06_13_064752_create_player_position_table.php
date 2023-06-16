<?php

/* 以下のコマンドで生成したマイグレーションファイル
 * sail artisan make:migration create_player_position_table --create=player_position
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
        /* players モデルと positions モデルの中間テーブルとして利用する
         * 関連付けるテーブルの単数形をアンダースコアでつなげた形にするのがデフォルト
         * テーブル名はアルファベット順で並べる(今回はplayerの方がアルファベット順で早いので先に記述)
         */
        Schema::create('player_position', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('player_id'); /* players テーブルのidを指定するカラム */
            $table->bigInteger('position_id'); /* positions テーブルのidを指定するカラム */
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
        Schema::dropIfExists('player_position');
    }
};
