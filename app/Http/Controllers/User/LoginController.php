<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\UserModel;
class LoginController extends Controller
{
    public function login(){
        return view('user.login');
    }
    //登录执行
    public function loginDo()
    {
        $data = request()->except('_token');
        $validator = Validator::make($data, [
            'user_name' => 'required',
            'user_password' => 'required',
        ], [
            'user_name.required' => '用户名不能为空',
            'user_password.required' => '密码不能为空',
        ]);
        if ($validator->fails()) {
            return redirect('user/login')->withErrors($validator)->withInput();
        }
        $where = [
            ["user_name", "=", $data['user_name']],
        ];
        $res = UserModel::where($where)->first();
//        dd($res);
        if ($res) {
            $md=password_verify($data['user_password'],$res['user_password']);
            if(!$md){
                return redirect('user/login')->with("cuowu", "密码错误，请重新登陆");
            }
            session(['id'=>$res['id']]);
//            dd($session);
            return redirect('/admin/index');
        } else {
            return redirect('user/login')->with("cuowu", "没有查询到账号信息");
        }
    }
}
