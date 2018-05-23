<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->timestamps();
        });

        // Test data
        if (env('APP_ENV') == 'local') {
            $cat = new \App\Categories;
            $cat->title = 'Linux';
            $cat->save();

            $cat = new \App\Categories;
            $cat->title = 'Tutorial';
            $cat->save();


            // Attach news_id 1 with category_id 1.
            $post = \App\News::first();
            $category = \App\Categories::first();
            $post->categories()->attach($category);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
