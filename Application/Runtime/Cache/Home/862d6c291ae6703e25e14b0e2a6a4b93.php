<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>文化学院校友录</title>
<script type="text/javascript" src="/bytp_/Public/js/jquery.min.js"></script>

<script type="text/javascript" src="/bytp_/Public/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="/bytp_/Public/css/font-awesome.min.css">

<script type="text/javascript" src="/bytp_/Public/js/pwdmodify.js"></script>

<script type="text/javascript" src="/bytp_/Public/js/announce.js"></script>

<link rel='stylesheet prefetch' href='/bytp_/Public/bootstrap/css/bootstrap.min.css'>

<link rel="stylesheet" href="/bytp_/Public/css/Login_index.css" media="screen" type="text/css" />
<style>
  .login-page{
    background: rgba(255,232,0,0.2);
} 
</style>
</head>

<body class="login-page">


<nav class="navbar navbar-default" style="background:#DFF0D8;" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand " href="<?php echo U('Index/index','','');?>">文华学院校友录</a>
    </div>

    







    <ul class="nav nav-pills">
        <li role="presentation" class="dropdown pull-right">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
              <?php echo session('name');?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo U('Index/PasModify','','');?>">修改密码</a></li>
                <?php if(session('uid') == 1): ?><li><a href="<?php echo U('Index/index','','');?>/type/manageAnnounce">公告设置</a></li>
                    <li><a href="<?php echo U('Index/index','','');?>/type/manage">管理员设置</a></li><?php endif; ?>
                <li><a href="<?php echo U('Login/logout','','');?>">退出</a></li>
            </ul>
        </li>
        <li role="presentation" class="dropdown pull-right">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
              设置 <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">校友录册子管理</a></li>
                <li><a href="#">个人信息修改</a></li>
                <li><a href="<?php echo U('Index/friend','','');?>">好友管理</a></li>
            </ul>
        </li>
    </ul>
</nav>

<!--天气插件-->
<iframe width="280" scrolling="no" height="25" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=34&icon=1&num=3"></iframe>
<!--end-->



<div class="login-form">

    <div class="login-content">
      <div>
        <h3 style="color:gray;">文化学院校友录登录密码修改</h3>
      </div>

      <form method="post" action="<?php echo U('Index/PasModify','','');?>" role="form" id="form_login">

        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-lock"></i>
            </div>

            <input type="password" class="form-control" name="oldpwd"  id="oldpwd" placeholder="旧密码" autocomplete="off" />
          </div>

        </div>


        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-lock"></i>
            </div>

            <input type="password" class="form-control" name="newpwd"  id="newpwd" placeholder="新密码" autocomplete="off" />
          </div>

        </div>

        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-lock"></i>
            </div>

            <input type="password" class="form-control" name="newpwd2"  id="newpwd2" placeholder="再输入一次新密码" autocomplete="off" />
          </div>

        </div>

        
        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-edit"></i>
            </div>

            <input type="text" class="form-control" name="verify" placeholder="验证码" autocomplete="off" />
          </div>
          <img src="<?php echo U('Login/verify','','');?>" id="regyzm" />
        </div>


        <div class="form-group">
          <button type="submit" id="regButtom" class="btn btn-primary btn-block btn-login">
            <i class="glyphicon glyphicon-circle-arrow-right"></i>
            提交
          </button>
        </div>
        <div class="form-group pull-right" style="width:30%">
          <a href="<?php echo U('Index/index','','');?>" class="btn btn-primary btn-block btn-login">
            <i class="glyphicon glyphicon-circle-arrow-left"></i>
            首页
          </a>
        </div>
      </form>

      

    </div>

  </div>
 </div>


</body>
</html>