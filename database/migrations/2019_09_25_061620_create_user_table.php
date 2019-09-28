<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateUserTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('user', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('full_name', 100);
                $table->bigInteger('mobile')->nullable(true);
                $table->string('email', 100);
                $table->string('password');
                $table->boolean('is_active');
                $table->bigInteger('last_logged_in')->nullable(true);
                $table->bigInteger('social_login_id')->nullable(true);
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
            Schema::dropIfExists('user');
        }
    }
