<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Support\Facades\DB;
class CreateTimingControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timing_control', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('定时阀控方案名称');
            $table->tinyInteger('switch_type')->default(1)->comment('控制类型 1送电 2断电');
            $table->tinyInteger('type')->default(1)->comment('方案类型 1按天 2按周 3单次');
            $table->tinyInteger('status')->default(1)->comment('方案状态1开启0关闭');
            $table->timestamps();
            $table->comment = '阀控方案表';
        });
//        DB::statement("ALTER TABLE 'timing_control' comment '阀控方案表'");//表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timing_control');
    }
}
