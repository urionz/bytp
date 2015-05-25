<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<script type="text/javascript" src="/bytp_/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/bytp_/Public/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/bytp_/Public/bootstrap/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<style>
    body{
        background: rgba(255,232,0,0.2);
        /*border:1px solid red;*/
        margin:20% 30%;
        /*max-width: 100%;*/
    }
    .form-horizontal{
        max-width: 60%;
    }
</style>
<title>文化学院校友录填写邀请</title>
</head>
<body>
    <div class="container">
        <form class="form-horizontal" method="post" action="">
            <fieldset>
                    <legend>请输入邀请密码：</legend>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2 control-label">密码：</label>
                        <div class="col-sm-10">
                            <input type="password" name="InvitePwd" class="form-control" placeholder="请填写">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info center-block">确定</button>
            </fieldset>
        </form>
    </div>
</body>
</html>