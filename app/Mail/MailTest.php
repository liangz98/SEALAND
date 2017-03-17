<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Storage;

class MailTest extends Mailable {
	use Queueable, SerializesModels;

	public $data;

	/**
	 * Create a new message instance.
	 * 创建一个新消息实例。
	 * 构造函数
	 * @return void
	 */
	public function __construct($data) {
		$this->data = $data;
	}

	/**
	 * Build the message.
	 * 构建消息。
	 * 指定邮件的模板
	 *
	 * @return $this
	 */
	public function build() {
		/*
		 * =========== start ================
		 * 显示文件路径, 并将返回的目录结构数组打印
		 * $filePath = 'files';
		 * $files = Storage::Files($filePath);
		 * dd($files);	// 打印数组
		 * =========== end ================
		 */

		/*
		 * 当使用 local 驱动时所有的操作都是相对于你在配置文件中定义的 root 目录进行的
		 * 该目录默认是 storage/app
		 * Storage::disk('local')
		 * Storage::get()
		 * Storage::put()
		 */
		// $image = Storage::get('public/testimage.png');

		/*
		 * filesystems中配置的本地驱动默认路径在 public 中,
		 * 此处不确定是否因为使用命令才导致可以访问
		 * php artisan storage:link
		 * 创建 public/storage 到 storage/app/public 的符号链接。
		 *
		 * 正常写法
		 * ['as' => '测试文档.txt']
		 * 出现乱码的情况
		 * ['as'=>"=?UTF-8?B?".base64_encode('测试文档')."?=.txt"]
		*/
		$email = $this->view('emails.test')
			->subject($this->data['subject'])
			->with([
				'image' => 'files/testimage.png',
				// 	'name'    => $this->data['name'],
				// 	'content' => $this->data['content'],
			]);
		/*
		 * 单个附件的时候,直接写
		 * ->attach('files/test2.txt');
		 * 多个的时候可以放进数组里遍历！
		 */
		$attachments = [
			// first attachment
			'files/test2.txt',

			// second attachment
			'files/testimg.jpg',
		];
		foreach ($attachments as $filePath) {
			$email->attach($filePath);
		}

		return $email;
	}
}
