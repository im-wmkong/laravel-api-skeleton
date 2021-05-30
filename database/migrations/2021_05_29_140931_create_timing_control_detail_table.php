<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Jialeo\LaravelSchemaExtend\Schema;

class CreateTimingControlDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timing_control_detail', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('timing_id')->index('billing_id')->comment('阀控方案关联ID');
            $table->string('open_week')->nullable()->comment('送电周');
            $table->string('close_week')->nullable()->comment('断电周');
            $table->string('open_time')->comment('送电时间');
            $table->string('close_time')->comment('断电时间');
            $table->timestamps();
            $table->comment = '阀控方案详情表';
        });
//        DB::statement("ALTER TABLE 'timing_control_detail' comment '阀控方案详情表'");//表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timing_control_detail');
    }
}
