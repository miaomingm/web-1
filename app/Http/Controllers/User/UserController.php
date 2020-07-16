<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\UserModel;
class UserController extends Controller
{
    public function reg(){
        return view('user.reg');
    }
    //注册执行
    public function regDo(){
        $data=request()->except("_token");
        $validator=Validator::make($data,[
            'user_name'=>'required|unique:user',
            'user_password'=>'required|min:6',
            'user_pwds'=>'required',
        ],[
            'user_name.required'=>'用户名不能为空',
            'user_name.unique'=>'用户名重复',
            'user_password.required'=>'密码不能为空',
            'user_password.min'=>'密码至少为六位',
            'user_pwds.required'=>'确认密码不能为空',
        ]);
        if($validator->fails()){
            return redirect('/user/reg')->withErrors($validator)->withInput();
        }
        if($data['user_pwds']!=$data['user_password']){
            return redirect('/user/reg')->with('a','确认密码和密码不一致');
        }
        array_pop($data);
        $data['user_time']=time();
        $options =[
            'cost' =>12,
        ];
//    array_pop($data);
        $data['user_password']=password_hash($data['user_password'],PASSWORD_BCRYPT,$options);
        $res = UserModel::insert($data);
//        dd($res);
        if($res){
            return redirect('/user/login');
        }else{
            return redirect("/user/reg")->with("reg","注册失败！");
        }
    }
}
