 $(function(){
  var yzm=$('#loginyzm');
  $('input[name="verify"]').mouseover(function(){
    yzm.css('display','block');
  });
  $('input[name="verify"]').mouseout(function(){
    yzm.css('display','none');
  });
  $('#login').click(function(){
    if($('#username').val()=='')
    {
        alert('用户名不能为空!');
        return false;
    }
    if($('#password').val()=='')
    {
        alert('密码不能为空!');
        return false;
    }
    if($('input[name="verify"]').val()=='')
    {
        alert('验证码不能为空!');
        return false;
    }
    return true;
  });
 });