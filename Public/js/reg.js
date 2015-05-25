$(function(){
   var yzm=$('#regyzm');
   var username=$('#username');
   var password=$('#password');
   var password2=$('#password2');
   var phone=$('#phone');
   var realname=$('#realname');
   var Url=$('input[name="url"]').val();
   
   $('input[name="verify"]').mouseover(function(){
      yzm.css('display','block');
   });

   $('input[name="verify"]').mouseout(function(){
      yzm.css('display','none');
   });

   $('#regButtom').click(function(){
      // alert(yzm.val());
      if(username.val()=='')
      {
         alert('用户名不可为空!');
         return false;
      }
      if(phone.val()=='')
      {
         alert('手机号码不可为空!');
         return false;
      }
      if(realname.val()=='')
      {
         alert('请填写真实姓名!');
         return false;
      }
      if(password.val()==''||password2.val()=='')
      {
         alert('密码不可为空!');
         return false;
      }
      if($('input[name="verify"]').val()=='')
      {
         alert('请填写验证码!');
         return false;
      }
      if(password.val()!==password2.val())
      {
         alert('两次密码不一致!');
         return false;
      }

      $.post(Url,{username:username.val(),password:password.val(),password2:password2.val(),phone:phone.val(),realname:realname.val(),yzm:$('input[name="verify"]').val()},function(status){
         if(status==1)
         {
            alert('存在同名用户!');
            return false;
         }
         if(status==2)
         {
            alert('两次密码不一致!');
            return false;
         }
         if(status==3)
         {
            alert('验证码错误!');
            return false;
         }
         if(status==4)
         {
            alert('注册成功!');
            location.href="/bytp_/Home/Login/index";
         }
      });
   });

});