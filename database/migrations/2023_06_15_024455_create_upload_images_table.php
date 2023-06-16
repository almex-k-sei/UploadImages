<?php

/* 以下のコマンドで生成されたファイル
 * sail artisan make:migration create_upload_images_table --create=upload_images
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
        Schema::create('upload_images', function (Blueprint $table) {
            $table->id();
            $table->string('filename')->comment('ユーザーがアップロードしたファイルの名前');
            $table->string('filepath')->comment('ストレージに保存されている実際のファイルの名前');
            $table->text('memo')->comment('ファイルの備考');
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
        Schema::dropIfExists('upload_images');
    }
};
