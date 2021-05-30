<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Support\Facades\DB;
class CreateReminderSchemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminder_scheme', function (Blueprint $table) {
            $table->id();
            $table->string('remind_name')->comment('催缴方案名称');
            $table->decimal('remind_price')->default(0)->comment('催缴金额');
            $table->tinyInteger('remind_status')->default(1)->comment('催缴方案状态1开启0关闭');
            $table->decimal('switch_price')->default(0)->comment('关阀金额');
            $table->tinyInteger('switch_status')->default(1)->comment('关阀方案状态1开启0关闭');
            $table->timestamps();
            $table->comment = '催缴方案详情表';
        });
//        DB::statement("ALTER TABLE 'reminder_scheme' comment '催缴方案详情表'");//表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reminder_scheme');
    }
}
