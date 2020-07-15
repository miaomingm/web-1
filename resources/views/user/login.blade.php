
<form action="{{url('user/loginDo')}}" method="post">
    @csrf
    用户名<input type="text" name="user_name"><font color="red">{{$errors->first('user_name')}}</font><br>

    密码<input type="password" name="user_password"><font color="red">{{$errors->first('user_password')}}</font><br>
    <input type="submit" value="点击登录">
</form>
