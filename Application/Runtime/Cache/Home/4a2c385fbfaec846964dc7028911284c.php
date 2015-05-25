<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>文化学院校友登陆</title>

<script type="text/javascript" src="/bytp_/Public/js/jquery.min.js"></script>

<script type="text/javascript" src="/bytp_/Public/js/Login_index.js"></script>

<link rel="stylesheet" href="/bytp_/Public/css/font-awesome.min.css">

<link rel='stylesheet prefetch' href='/bytp_/Public/bootstrap/css/bootstrap.min.css'>

<link rel="stylesheet" href="/bytp_/Public/css/Login_index.css" media="screen" type="text/css" />

</head>

<body class="login-page">

<div class="login-form">

    <div class="login-content">
      <div>
        <h3 style="color:yellow;">文化学院校友录</h3>
      </div>

      <form method="post" action="<?php echo U('Login/login');?>" role="form" id="form_login">

        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <input type="text" onClick="this.value='';" onFocus="this.select()" onBlur="this.value=!this.value?'用户名':this.value;" class="form-control" name="username" id="username" placeholder="用户名" autocomplete="off" />
          </div>

        </div>

        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-lock"></i>
            </div>

            <input type="password" onClick="this.value='';" onFocus="this.select()" onBlur="this.value=!this.value?'密码':this.value;" class="form-control" name="password"  id="password" placeholder="密码" autocomplete="off" />
          </div>

        </div>


        

        
        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-lock"></i>
            </div>

            <input type="text" onClick="this.value='';"   class="form-control" name="verify" placeholder="验证码" autocomplete="off" />
          </div>
          <img src="<?php echo U(verify,'','');?>" id="loginyzm" />
        </div>


        <div class="form-group pull-left" style="width:50%;">
          <button type="submit" id="login" class="btn btn-primary btn-block btn-login">
            <i class="glyphicon glyphicon-circle-arrow-right"></i>
            登陆
          </button>
        </div>
        <div class="form-group pull-right regbutton">
          <a class="btn btn-primary btn-block btn-login" href="<?php echo U('Login/register','','');?>">
            <i class="glyphicon glyphicon-circle-arrow-right"></i>
            注册
          </a>
        </div>
      </form>

    </div>

  </div>
 </div>
</body>
</html>