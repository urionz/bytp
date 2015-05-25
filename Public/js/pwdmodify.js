$(function(){
   var yzm=$('#regyzm');
   var oldpwd=$('#oldpwd');
   var newpwd=$('#newpwd');
   var newpwd2=$('#newpwd2');
   var form=$('#form_login');
   
   $('input[name="verify"]').mouseover(function(){
      yzm.css('display','block');
   });

   $('input[name="verify"]').mouseout(function(){
      yzm.css('display','none');
   });

   form.submit(function(){
      if(oldpwd.val()=='')
      {
         alert('请填写旧密码!');
         return false;
      }
      if(newpwd.val()==''||newpwd2.val()=='')
      {
         alert('请填写新密码!');
         return false;
      }
      if(newpwd2.val()!=newpwd.val())
      {
         alert('两次输入的密码不一致!');
         return false;
      }
      return true;
   })

});