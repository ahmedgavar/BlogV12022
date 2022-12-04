<?php
declare (strict_types = 1);

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->mediumText('body');
            $table->text('description')->nullable();
            $table->boolean('published')->default(false);

            $table->timestamps();
            $table->softDeletes();
            //------------------------- begin relations---------
            $table->foreignId('user_id')->index()->constrained()->onDelete('CASCADE');
            //------------------------- end relations---------

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
