<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateSocialLoginTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('social_login', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('social_id')->nullable(true);
                $table->string('token')->nullable(true);
                $table->string('social_site_name');
                $table->string('user_name');
                $table->string('email');
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
            Schema::dropIfExists('social_login');
        }
    }
