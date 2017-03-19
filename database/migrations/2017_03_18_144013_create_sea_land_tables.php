<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSeaLandTables
 */
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
			$table->boolean('deleted')->default(false);			// 是否删除,default: false
			$table->string('state', 2)->default('01');			// 状态,[01: 有效, 02: 禁用]
			$table->integer('last_updated_by')->default(0);		// 最后更新人
			$table->string('last_updated_type', 2);				// 最后更新人的类型,[01: 用户, 02: 管理员]
		});

		// 新闻
		Schema::create('news', function (Blueprint $table) {
			$table->increments('id');
			$table->string('subject');
			$table->text('content');
			$table->boolean('deleted')->default(false);			// 是否删除,default: false
			$table->string('state', 2)->default('01');			// 状态,[01: 有效, 02: 禁用]
			$table->integer('created_by')->default(0);			// 创建人
			$table->integer('last_updated_by')->default(0);		// 最后更新人
			$table->timestamps();
		});

		// 培训类型
		Schema::create('training_type', function (Blueprint $table) {
			$table->increments('id');
			$table->string('type_name');			// 分类名称
			$table->boolean('deleted')->default(false);			// 是否删除,default: false
			$table->string('state', 2)->default('01');			// 状态,[01: 有效, 02: 禁用]
			$table->integer('created_by')->default(0);			// 创建人
			$table->integer('last_updated_by')->default(0);		// 最后更新人
			$table->timestamps();
		});

		// 培训课程
		Schema::create('training', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('training_type_id');	// 分类ID
			$table->string('name', 128);			// 课程名称
			$table->timestamp('start_date')->nullable();		// 开始时间
			$table->timestamp('end_date')->nullable();			// 结束时间
			$table->boolean('deleted')->default(false);			// 是否删除,default: false
			$table->string('state', 2)->default('01');			// 状态,[01: 有效, 02: 禁用]
			$table->integer('created_by')->default(0);			// 创建人
			$table->integer('last_updated_by')->default(0);		// 最后更新人
			$table->timestamps();
		});

		// 会员培训申请 Register for a Course
		Schema::create('register_course', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('training_id');
			$table->boolean('deleted')->default(false);			// 是否删除,default: false
			$table->string('state', 2)->default('01');			// 状态,[01: 有效, 02: 禁用]
			$table->integer('created_by')->default(0);			// 创建人
			$table->integer('last_updated_by')->default(0);		// 最后更新人
			$table->timestamps();
		});

		// 认证
		Schema::create('certification', function (Blueprint $table) {

		});

		// 会员认证/续订认证
		Schema::create('renew_certification', function (Blueprint $table) {

		});

		// 会员
		Schema::create('members', function (Blueprint $table) {
			$table->bigIncrements('id');				// 会员ID
			$table->string('member_number', 128);		// 档案编号
			$table->string('name', 128);				// 名称
			$table->string('en_name')->nullable();		// 英文名
			$table->string('sex', 6);
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
			$table->boolean('deleted')->default(false);			// 是否删除,default: false
			$table->string('state', 2)->default('01');			// 状态,[01: 有效, 02: 禁用]
			$table->integer('created_by')->default(0);			// 创建人
			$table->integer('last_updated_by')->default(0);		// 最后更新人
			$table->timestamps();
		});

		// 会员资格
		Schema::create('membership', function (Blueprint $table){
			$table->increments('id');
			$table->integer('member_id')->default(0);
			$table->timestamp('start_date')->nullable();
			$table->timestamp('expiry_date')->nullable();
			$table->boolean('deleted')->default(false);			// 是否删除,default: false
			$table->string('state', 2);
			$table->integer('created_by')->default(0);			// 创建人
			$table->integer('last_updated_by')->default(0);		// 最后更新人
			$table->timestamps();
		});

		// 产品
		Schema::create('product', function (Blueprint $table) {

		});
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
			$table->dropColumn('deleted');
			$table->dropColumn('state');
			$table->dropColumn('last_updated_by');
			$table->dropColumn('last_updated_type');
		});

		// Schema::dropIfExists('users');
		Schema::dropIfExists('news');
		Schema::dropIfExists('training_type');
		Schema::dropIfExists('training');
		Schema::dropIfExists('register_course');
		Schema::dropIfExists('certification');
		Schema::dropIfExists('renew_certification');
		Schema::dropIfExists('members');
		Schema::dropIfExists('membership');
		Schema::dropIfExists('product');
	}
}
