<?php

namespace App\Http\Controllers;

use App\Mail\MailTest;
use Illuminate\Http\Request;
use Mail;


class MailController extends Controller
{
	public function send() {
		$data = ['email' => 'liangz98@foxmail.com', 'name' => 'LiangZ',
				 'subject' => '从163来的测试邮件 by Laravel LiangZ！',
				 'content' => '内容其实只有一段文字'];

		// 方法一: 直接封装内容
		// Mail::send('emails.test', $data, function ($message) use ($data) {
		// 	$message->to($data['email'], $data['name'])->subject($data['subject']);
		// });

		// 方法二: 使用 mailables 对象
		Mail::to('liangz98@foxmail.com')->send(new MailTest($data['content']));

		echo "Email Sent with attachment. Check your inbox.";
    }
}
