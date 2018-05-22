<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('pretty_url')->unique();
            $table->text('body');
            $table->integer('user_id');
            $table->boolean('published')->default(false);
            $table->timestamps();
        });

        // Test data.
        \App\News::insert([
            'title' => 'How To Blog',
            'pretty_url' => 'how-to-blog',
            'body' => 'This is totally how you do it.',
            'user_id' => 1,
            'published' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
