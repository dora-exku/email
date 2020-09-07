<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use utils\Email;

class EmailController
{
    public function send(Request $request)
    {
        $option = [
            'smtp' => $request->param('smtp'),
            'user' => $request->param('user'),
            'pass' => $request->param('pass'),
            'port' => $request->param('port'),
            'from' => $request->param('from')
        ];
        $email = new Email($option);
        $email->subject($request->param('subject'));
        $email->addAddress($request->param('to'));
        $res = $email->body($request->param('body'))->send();
        if ($res) {
            return json(['code' => 200]);
        } else {
            return json(['code' => 402]);
        }
    }
}
