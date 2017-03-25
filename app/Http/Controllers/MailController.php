<?php

namespace App\Http\Controllers;

use App\Mail\MailTest;
use App\Mail\MailTestMarkdown;
use Mail;


class MailController extends Controller {
	public function send() {
		$data = ['email'   => 'liangz98@foxmail.com',
				 'name'    => 'LiangZ',
				 'subject' => 'Mail test from 163 SMPT - Sea Land！',
				 'content' => '内容其实只有一段文字！',
				 'imgURL'  => 'files/testimage.png',
		];

		// 方法一: 直接封装内容
		// Mail::send('emails.test', $data, function ($message) use ($data) {
		// 	$message->to($data['email'], $data['name'])->subject($data['subject']);
		// });

		/*
		 * 方法二: 使用 mailables 对象
		 * 该方法带附件
		 */
		Mail::to('liangz98@foxmail.com')->send(new MailTest($data));

		/*
		 * 方法三: 使用 mailables 对象
		 * 该方法在邮件中呈现图片
		 */
		// Mail::to('liangz98@foxmail.com')->send(new MailTest4IMG($data));

		echo "Email Sent with attachment. Check your inbox.";
	}

	public function sendMarkdown() {
		$data = ['email'       => 'liangz98@foxmail.com',
				 'name'        => 'LiangZ',
				 'subject'     => 'Mail test from 163 SMPT - Sea Land！',
				 'toName'      => 'Tony',
				 'content'     => '内容其实只有一段文字！',
				 'logoUrl'     => 'files/testimage.png',
				 'attachments' => [
					 'files/test2.txt',
					 'files/testimg.jpg',
				 ],
        ];
		Mail::to('liangz98@foxmail.com')->send(new MailTestMarkdown($data));

		echo "Markdown Email Sent success! Check your inbox.";
	}
}
