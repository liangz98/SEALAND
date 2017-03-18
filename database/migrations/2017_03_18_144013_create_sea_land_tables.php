<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeaLandTables extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		// 完善用户表
		Schema::table('users', function (Blueprint $table) {
			$table->integer('member_id')->default(0);			// 会员ID
			$table->string('activation_token')->nullable();		// 激活令牌,允许空
			$table->boolean('activated')->default(false);		// 是否激活,default: false
			$table->softDeletes();								// 是否删除,default: false
			$table->boolean('is_valid')->default(true);			// 是否有效,default: true
			$table->integer('last_updated_by')->default(0);		// 最后更新人
			$table->string('last_updated_type');				// 最后更新人的类型,[01: 用户, 02: 管理员]
		});

		// 新闻

		// 培训

		// 认证

		// 会员
		Schema::create('Members', function (Blueprint $table) {
			$table->bigIncrements('id');				// 会员ID
			$table->string('member_number', 128);		// 档案编号
			$table->string('name', 128);				// 名称
			$table->string('en_name')->nullable();		// 英文名
			$table->string('sex', 6);
			$table->timestamp('valid_on');				// 续费会员 开始日期
			$table->timestamp('invalid_on');			// 续费会员 结束日期
			$table->string('email', 64)->nullable();		// 邮箱
			$table->string('oth_email', 64)->nullable();	// 其他邮箱
			$table->string('mobile_phone', 64)->nullable();	// 手机号码
			$table->string('oth_mobile_phone', 64)->nullable();		// 其他手机号码
			$table->string('country', 64)->nullable();		// 国家
			$table->string('en_country', 64)->nullable();	// 国家英文名
			$table->string('country_code', 8)->nullable();	// 国家代码
			$table->string('state', 64)->nullable();		// 省份
			$table->string('en_state', 64)->nullable();		// 省份英文
			$table->string('state_code', 8)->nullable();	// 省份代码
			$table->string('city', 64)->nullable();			// 城市
			$table->string('en_city', 64)->nullable();		// 城市英文
			$table->string('city_code', 8)->nullable();		// 城市代码
			$table->text('street')->nullable();				// 街道
			$table->text('en_street')->nullable();			// 街道英文
			$table->text('address')->nullable();			// 地址
			$table->text('en_address')->nullable();			// 地址英文
			$table->text('company_name')->nullable();		// 公司名
			$table->text('en_company_name')->nullable();	// 公司英文名
			$table->string('title', 64)->nullable();		// 职位
			$table->text('company_address')->nullable();		// 公司地址
			$table->text('en_company_address')->nullable();		// 公司英文地址
			$table->text('mailing_address')->nullable();		// 邮寄地址
			$table->text('en_mailing_address')->nullable();		// 邮寄英文地址
			$table->string('mailing_name', 128)->nullable();	// 收件人
			$table->string('mailing_mobile', 32)->nullable();	// 收件人电话
			$table->string('certification_id')->nullable();		// 认证
			$table->softDeletes();
			$table->timestamps();
		});

		// 产品
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('member_id');
			$table->dropColumn('activation_token');
			$table->dropColumn('activated');
			// $table->dropColumn('is_deleted');
			$table->dropColumn('is_valid');
			$table->dropColumn('last_updated_by');
			$table->dropColumn('last_updated_type');
		});
	}
}
