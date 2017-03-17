<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Storage;

class MailTest extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
	 * 创建一个新消息实例。
     * 构造函数
     * @return void
     */
    public function __construct($data)
    {
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

		// $attachment = Storage::get('/storage/app/public/files/test.txt');
		// $attachment = Storage::get('files/test.txt');

		/*
		 * filesystems中配置的本地驱动默认路径在 public 中,
		 * 此处不确定是否因为使用命令才导致可以访问
		 * php artisan storage:link
		 * 创建 public/storage 到 storage/app/public 的符号链接。
		*/
		return $this->view('emails.test')
			// ->attach('files/test2.txt');
			->attach('files/Profiles.xlsx');
	}
}
