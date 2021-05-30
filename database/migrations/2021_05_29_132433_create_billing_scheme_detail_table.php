<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Support\Facades\DB;
class CreateBillingSchemeDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_scheme_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('billing_id')->index('billing_id')->comment('计费方案关联id');
            $table->tinyInteger('billing_type')->default(1)->comment('方案类型 1单一 2月周期 3年周期 4费率');
            $table->timestamp('start_time')->nullable()->comment('开始时间');
            $table->timestamp('end_time')->nullable()->comment('结束时间');
            $table->json('detail')->comment('计费详细信息');
            $table->timestamps();
            $table->foreign('billing_id')->references('id')->on('billing_scheme')->onDelete('cascade');
            $table->comment = '计费方案详情表';
        });
//        DB::statement("ALTER TABLE 'billing_scheme_detail' comment '计费方案详情表'");//表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_scheme_detail');
    }
}
