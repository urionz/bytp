<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>文化学院校友录注册</title>

<link rel="stylesheet" href="/bytp_/Public/css/font-awesome.min.css">

<script type="text/javascript" src="/bytp_/Public/js/jquery.min.js"></script>

<script type="text/javascript" src="/bytp_/Public/js/reg.js"></script>

<link rel='stylesheet prefetch' href='/bytp_/Public/bootstrap/css/bootstrap.min.css'>

<link rel="stylesheet" href="/bytp_/Public/css/Login_index.css" media="screen" type="text/css" />

</head>

<body class="login-page">

<div class="login-form">

    <div class="login-content">
      <div>
        <h3 style="color:yellow;">文化学院校友录注册</h3>
      </div>

      <form method="post" action="" role="form" id="form_login">

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <input type="hidden" name="url" value="<?php echo U('Login/regAction','','');?>">
            <input type="text" class="form-control" name="username" id="username" placeholder="用户名" autocomplete="off" />
          </div>
        </div>
        
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-earphone"></i>
            </div>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="手机号码" autocomplete="off" />
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <input type="text" class="form-control" name="realname" id="realname" placeholder="真实姓名" autocomplete="off" />
          </div>
        </div>

        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-lock"></i>
            </div>

            <input type="password" class="form-control" name="password"  id="password" placeholder="密码" autocomplete="off" />
          </div>

        </div>


        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-lock"></i>
            </div>

            <input type="password" class="form-control" name="password2"  id="password2" placeholder="在输入一次" autocomplete="off" />
          </div>

        </div>

        
        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-lock"></i>
            </div>

            <input type="text" class="form-control" name="verify" placeholder="验证码" autocomplete="off" />
          </div>
          <img src="<?php echo U(verify,'','');?>" id="regyzm" />
        </div>


        <div class="form-group">
          <button type="buttom" id="regButtom" class="btn btn-primary btn-block btn-login">
            <i class="glyphicon glyphicon-circle-arrow-right"></i>
            注册
          </button>
        </div>
        <div class="form-group pull-right" style="width:30%">
          <a href="<?php echo U('Login/index','','');?>" class="btn btn-primary btn-block btn-login">
            <i class="glyphicon glyphicon-circle-arrow-left"></i>
            返回
          </a>
        </div>
      </form>

      

    </div>

  </div>
 </div>

</body>
</html>