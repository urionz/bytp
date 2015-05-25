<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="/bytp_/Public/js/jquery.min.js"></script>
    <script src="/bytp_/Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/bytp_/Public/js/announce.js"></script>
    <link rel="stylesheet" type="text/css" href="/bytp_/Public/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/bytp_/Public/css/friend.css"/>
    <link rel="stylesheet" type="text/css" href="/bytp_/Public/css/Index_index.css">
    <style type="text/css">
        body{
            background: rgba(255,232,0,0.2);
        } 
    </style>
</head>
<body>
<nav class="navbar navbar-default" style="background:#DFF0D8;" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand " href="<?php echo U('Index/index','','');?>">文华学院校友录</a>
        <div class="callboard">
            <ul>
                <?php if(is_array($Announce)): $i = 0; $__LIST__ = $Announce;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Announces): $mod = ($i % 2 );++$i;?><li>
                        <i class="glyphicon glyphicon-volume-up"></i>
                        <?php echo ($Announces['message']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (date("Y-m-d H:i:s",$Announces['sendtime'])); ?>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul> 
        </div>
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
                <li><a href="<?php echo U('Index/AlumiManage','','');?>">校友录册子管理</a></li>
                <li><a href="#">个人信息修改</a></li>
                <li><a href="<?php echo U('Index/friend','','');?>">好友管理</a></li>
            </ul>
        </li>
    </ul>
</nav>


<!--天气插件-->
<iframe width="280" scrolling="no" height="25" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=34&icon=1&num=3"></iframe>
<br/>
<!--end-->


<label>册子列表：</label>
    <table class="table table-hover">
        <tr>
            <th>册子名称</th>
            <th>册子简介</th>
            <th>册子封面</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($AlumisInfo)): $i = 0; $__LIST__ = $AlumisInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$AlumisInfoVo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($AlumisInfoVo["alumi_name"]); ?></td>
                <td><?php echo ($AlumisInfoVo["alumi_intro"]); ?></td>
                <td>3</td>
                <td>
                    <a href="#" class="edit-alumi_name">编辑</a>/
                    <a href="#" class="delete">删除-alumi_name</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

    <script type="text/javascript">
    </script>
</body>
</html>