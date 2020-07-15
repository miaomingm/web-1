
<form action="{{url('user/regDo')}}" method="post">
    @csrf
    用户名<input type="text" name="user_name"><font color="red">{{$errors->first('user_name')}}</font><br>
    密码<input type="password" name="user_password"><font color="red">{{$errors->first('user_password')}}</font><br>
    确认密码<input type="password" name="user_pwds"><font color="red">{{$errors->first('user_pwds')}}</font><br>
    <input type="submit" value="点击注册">
</form>
