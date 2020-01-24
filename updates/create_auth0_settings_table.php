<?php namespace Sehan\Auth0\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAuth0SettingsTable extends Migration
{
    public function up()
    {
        Schema::create('sehan_auth0_auth0_settings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sehan_auth0_auth0_settings');
    }
}
