<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateUserCharacterDetailsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('user_character_details', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->integer('user_character_type_id');
                $table->string('telephone')->nullable();
                $table->string('name')->nullable();

                $table->string('website')->nullable();
                $table->string('location')->nullable();
                $table->string('logo')->nullable();
                $table->text('description')->nullable();
                $table->string('experience')->nullable();

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
            Schema::dropIfExists('user_character_details');
        }
    }
