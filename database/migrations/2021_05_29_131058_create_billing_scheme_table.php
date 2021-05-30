<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Jialeo\LaravelSchemaExtend\Schema;
class CreateBillingSchemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_scheme', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('方案名称');
            $table->tinyInteger('type')->default(1)->comment('仪表类型 1电表 2水表');
            $table->tinyInteger('status')->default(1)->comment('方案状态1开启0关闭');
            $table->timestamps();
            $table->comment = '计费方案表';
        });
//        DB::statement("ALTER TABLE 'billing_scheme' comment '计费方案表'");//表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_scheme');
    }
}
