<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function(Blueprint $table)
        {
            $table->id();
            $table->timestamps();
            $table->string('username');
            $table->enum('faction', ['alliance', 'horde']);
            $table->integer('achievement_points');
            $table->string('guild'); //many to one relationship to implement
            $table->enum('class', [
                'Paladin',
                'Warrior',
                'Hunter',
                'Rogue',
                'Priest',
                'Shaman',
                'Mage',
                'Druid',
                'Monk',
                'Warlock',
                'Death Knight',
                'Demon Hunter',
            ]);
            $table->string('avatar');

            $table->bigInteger('server_id')->unsigned()->default(1);
            $table->foreign('server_id')
                ->references('id')
                ->on('servers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
