<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class BlueskyInit extends Migration
{
    public function up()
    {
        $capsule = new Capsule();
        $capsule::schema()->create('bluesky', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number');
            $table->string('version')->nullable();

            $table->unique('serial_number');
            $table->index('version');

        });
    }
    
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->dropIfExists('bluesky');
    }
}
