<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    
    <script type="text/javascript" src="/bytp_/Public/js/jquery.min.js"></script>
    <script src="/bytp_/Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/bytp_/Public/js/announce.js"></script>

    <!--滚动效果js-->
    <script type="text/javascript" src="/bytp_/Public/js/jquery.pause.min.js"></script>
    <script type="text/javascript" src="/bytp_/Public/js/weiboscroll.js"></script>
    <!--end-->

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



<!--仿QQ好友-->
<div class="friend pull-left">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <img class="userinfo img-thumbnail" data-toggle="modal" data-target="#IconUploadModal" title="更换图像" src="<?php echo ($_T['user-info'][0]['icon']); ?>" />
        <a style="margin-top:-100px;"><?php echo session('name');?></a>
        <span class="glyphicon glyphicon-user" title="资料编辑"></span>
        
        <span class="glyphicon glyphicon-cog" title="设置"></span>
        
        <span class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#exampleModal" title="添加好友"></span>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingCommon">
                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseCommon" aria-expanded="true" aria-controls="collapseCommon">
                <span class="caret"></span>&nbsp;&nbsp;&nbsp;我的好友
                </h4>
            </div>
            <div id="collapseCommon" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingCommon">
                <?php if(is_array($friend)): $i = 0; $__LIST__ = $friend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Commonfriend): $mod = ($i % 2 );++$i; if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$CommonUser): $mod = ($i % 2 );++$i; if($CommonUser['id'] == $Commonfriend['friendid']): ?><div class="panel-body">
                            <p data-toggle="tooltip" data-placement="bottom" title="真实姓名：<?php echo ($CommonUser["realname"]); ?>
                            &#10;电话号码：<?php echo ($CommonUser["phone"]); ?>"><?php echo ($CommonUser["username"]); ?></p>
                            </div><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>

        <?php if(is_array($FriendGroup)): $FriendGroupKey = 0; $__LIST__ = $FriendGroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$FriendGroupVo): $mod = ($FriendGroupKey % 2 );++$FriendGroupKey;?><div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo ($FriendGroupVo["id"]); ?>">
                    <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo ($FriendGroupVo["id"]); ?>" aria-expanded="true" aria-controls="collapse<?php echo ($FriendGroupVo["id"]); ?>">
                    <span class="caret"></span>&nbsp;&nbsp;&nbsp;<?php echo ($FriendGroupVo["groupname"]); ?>
                    </h4>
                </div>
                <div id="collapse<?php echo ($FriendGroupVo["id"]); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo ($FriendGroupVo["id"]); ?>">
                    <?php if(is_array($friend)): $i = 0; $__LIST__ = $friend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$friendvo): $mod = ($i % 2 );++$i; if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$UserVo): $mod = ($i % 2 );++$i; if(($UserVo['id'] == $friendvo['friendid']) and ($friendvo['groupid'] == $FriendGroupVo['id'])): ?><div class="panel-body">
                                      <p data-toggle="tooltip" data-placement="bottom" title="真实姓名：<?php echo ($UserVo["realname"]); ?>
                            &#10;电话号码：<?php echo ($UserVo["phone"]); ?>"><?php echo ($UserVo["username"]); ?></p>
                                    </div><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="GroupAdd panel panel-default" data-toggle="modal" data-target="#GroupAddModal">
            <div class="panel-heading" role="tab" id="headingAdd">
                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseAdd" aria-expanded="true" aria-controls="collapseAdd">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;添加分组&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+
                </h4>
            </div>
        </div>
    </div>
</div>
<!--end-->




<!--仿新浪微博-->
<div class="pull-left">
<div id="box_title">大家正在说</div>
    <div id="con">
        <div class="bottomcover" style="z-index: 2;"></div>
        <ul>
            <?php if(is_array($ZoneInfo)): $i = 0; $__LIST__ = $ZoneInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ZoneInfoVo): $mod = ($i % 2 );++$i;?><li>
                    <div class="div_left">
                        <a href="#">
                        <img src="<?php echo ($ZoneInfoVo['icon']); ?>" class="userinfo img-thumbnail" title="<?php echo ($ZoneInfoVo['username']); ?>"></a>
                    </div>
                    <div class="div_right">
                        <a href="#"><?php echo ($ZoneInfoVo['username']); ?></a>：
                        <?php echo ($ZoneInfoVo['content']); ?>
                        <div class="twit_item_time"><?php echo subtime($ZoneInfoVo['sendtime']);?></div>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="content">
        <textarea class="form-control" name="zoneContent" rows="3"></textarea>
        <input type="hidden" name="SendZoneUrl" value="<?php echo U('Index/SendZoneAction','','');?>" />
        <button type="button" id="zoneButton" class="btn btn-primary btn-lg btn-block">发表</button>
    </div>
</div>    
<!--end-->





<!--模态框添加好友-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">好友查找</h4>
            </div>
        <div class="modal-body">
            <div class="form-group" id="place">
                <label for="recipient-name" class="control-label">好友用户名：</label>
                <input type="text" class="form-control" name="search-name" id="search-name">
                <input type="hidden" class="form-control" name="SearchUrl" value="<?php echo U('Index/searchFriendAction','','');?>" >
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" id="searchbutton" class="btn btn-primary">查找</button>
        </div>
    </div>
  </div>
</div>
<!--模态框end-->


<!--组选择-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModal2Label">选择分组</h4>
            </div>
        <div class="modal-body">
            <div class="form-group" id="place">
                <label for="recipient-name" class="control-label">分组列表：</label>
                <select class="form-control" name="groupSelect">
                    <?php if(is_array($FriendGroup)): $i = 0; $__LIST__ = $FriendGroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$FriendGroupVo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($FriendGroupVo["id"]); ?>"><?php echo ($FriendGroupVo["groupname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <input type="hidden" class="form-control hiddenUrl" name="SearchUrl" value="<?php echo U('Index/MakeFriend','','');?>/fid/" >
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" id="MakeButton" class="btn btn-primary">确定</button>
        </div>
    </div>
  </div>
</div>
<!--组选择end-->



<!--添加分组-->
<div class="modal fade" id="GroupAddModal" tabindex="-1" role="dialog" aria-labelledby="GroupAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="GroupAddModalLabel">添加分组</h4>
            </div>
        <div class="modal-body">
            <div class="form-group" id="place">
                <label for="recipient-name" class="control-label">分组名称：</label>
                <input type="text" class="form-control" name="group-name" id="group-name">
                <input type="hidden" class="form-control" name="GroupAddUrl" value="<?php echo U('Index/GroupAddAction','','');?>" >
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" id="GroupAddbutton" class="btn btn-primary">添加</button>
        </div>
    </div>
  </div>
</div>
<!--组选择end-->



<!--模态框长传图像-->


<div class="modal fade" id="IconUploadModal" tabindex="-1" role="dialog" aria-labelledby="IconUploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="IconUploadModalLabel">修改图像</h4>
            </div>
        <div class="modal-body">
            <div class="form-group" id="place">
                <label for="recipient-name" class="control-label">当前图像：</label><br/>
                <img src="<?php echo ($_T['user-info'][0]['icon']); ?>" class="userinfo img-thumbnail currentIcon"><br/>
                头像选择：<br/>
                <ul class="list-inline">
                    <li>
                        <label class="radio-inline">
                            <input type="hidden" name="IconUpUrl" value="<?php echo U('Index/ModifyIcon','','');?>">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/1.jpg">
                            <img src="/bytp_/Uploads/usericon/1.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/2.jpg">
                            <img src="/bytp_/Uploads/usericon/2.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/3.jpg">
                            <img src="/bytp_/Uploads/usericon/3.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/4.jpeg">
                            <img src="/bytp_/Uploads/usericon/4.jpeg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/5.jpg">
                            <img src="/bytp_/Uploads/usericon/5.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/6.jpg">
                            <img src="/bytp_/Uploads/usericon/6.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/7.jpg">
                            <img src="/bytp_/Uploads/usericon/7.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/8.jpeg">
                            <img src="/bytp_/Uploads/usericon/8.jpeg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/9.jpg">
                            <img src="/bytp_/Uploads/usericon/9.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/10.jpg">
                            <img src="/bytp_/Uploads/usericon/10.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/avatar.jpg">
                            <img src="/bytp_/Uploads/usericon/avatar.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/11.jpg">
                            <img src="/bytp_/Uploads/usericon/11.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/12.jpg">
                            <img src="/bytp_/Uploads/usericon/12.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/13.jpg">
                            <img src="/bytp_/Uploads/usericon/13.jpg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/14.jpeg">
                            <img src="/bytp_/Uploads/usericon/14.jpeg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/15.jpeg">
                            <img src="/bytp_/Uploads/usericon/15.jpeg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/16.jpeg">
                            <img src="/bytp_/Uploads/usericon/16.jpeg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                    <li>
                        <label class="radio-inline">
                            <input type="radio" name="IconSelect" value="/bytp_/Uploads/usericon/17.jpeg">
                            <img src="/bytp_/Uploads/usericon/17.jpeg" class="userinfo img-thumbnail">
                        </label>
                    </li>
                </ul>
                自定义图像：
                <input type="file">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" id="IconUploadbutton" class="btn btn-primary">保存</button>
        </div>
    </div>
  </div>
</div>



<!--end-->




<script type="text/javascript">
    $(function(){

        $('[data-toggle="tooltip"]').tooltip()

        //模态框js
        $('#exampleModal2').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            var getId = $('#getId').attr('title');
            var lastUrl = "http://<?php echo ($_SERVER['HTTP_HOST']); ?>"+modal.find('#place input').val()+getId;
            modal.find('#place input').val(lastUrl);
        });

        var SearchUrl=$('input[name="SearchUrl"]');
        var SearchName=$('input[name="search-name"]');
        var place=$('#place');

        $('#searchbutton').click(function(){
            $(this).addClass('disabled');
            $.post(SearchUrl.val(),{SearchName:SearchName.val()},
                function(data){
                    data=eval("("+data+")");
                    if(data.status)
                    {
                        var string ="<div id='addDiv'>";
                                string+="<table class='table table-hover'>";
                                    string+="<tr>";
                                        string+="<th>用户名</th>";
                                        string+="<th>真实姓名</th>";
                                        string+="<th>操作</th>";
                                    string+="</tr>";
                                    string+="<tr>";
                                        string+="<td>"+data.userinfo.username+"</td>";
                                        string+="<td>"+data.userinfo.realname+"</td>";
                                        string+="<td><a href='#' title='"+data.userinfo.id+"' id='getId' data-toggle='modal' data-target='#exampleModal2'>添加</a></td>";
                                    string+="</tr>";
                                string+="</table>";
                            string+="</div>";
                        place.after(string);
                        $('#searchbutton').hide();
                    }
                    else
                    {
                        alert('此用户不存在!');
                        location.reload();
                    }
                });
        });

        
        $('#MakeButton').click(function(){
            $(this).addClass('disabled');
            var hiddenUrl=$('.hiddenUrl').val();
            var groupid=$('select[name="groupSelect"] option:selected').val();
            $.post(hiddenUrl,{groupid:groupid},
                function(data){
                    data=eval("("+data+")");
                    if(data.status==1)
                        alert('添加成功!');
                    else if(data.status==0)
                        alert('添加失败!');
                    else if(data.status==3)
                        alert('此用户不存在!');
                    else if(data.status==2)
                        alert('此分组不存在!');
                    else if(data.status==4)
                        alert('您已添加此好友，请勿重复添加!');
                        // alert(data);
                    location.reload();
                });
        });



        $('#GroupAddbutton').click(function(){
            $(this).addClass('disabled');
            var GroupAddUrl=$('input[name="GroupAddUrl"]').val();
            var group_name=$('input[name="group-name"]').val();
            if(group_name=='')
            {
                alert('请填写组名称!');
                $(this).removeClass('disabled');
                return false;
            }
            $.post(GroupAddUrl,{group_name:group_name},
                function(data){
                    data=eval("("+data+")");
                    if(data.status==1)
                        alert('添加成功!');
                    else if(data.status==2)
                        alert('分组已存在，请勿冲重复添加!');
                    else
                        alert('添加失败!');
                    location.reload();
                });
        });


        //radio即显图片
        $('.radio-inline').find('.userinfo').click(function(){
            $('.currentIcon').attr('src',$(this).attr('src'));
        });



        //ajax修改图片
        $('#IconUploadbutton').click(function(){
            $(this).addClass('disabled');
            var IconModUrl=$('input[name="IconUpUrl"]').val();
            var IconSelected=$('input[name="IconSelect"]:checked').val();
            if(typeof(IconSelected)=='undefined')
            {
                alert('请选择图像!');
                $(this).removeClass('disabled');
                return false;
            }
            $.post(IconModUrl,{IconSelected:IconSelected},
                function(data){
                    data=eval("("+data+")");
                    if(data.status==1)
                        alert('保存成功!');
                    else if(data.status==2)
                        alert('无修改!');
                    else
                        alert('保存失败!');
                    location.reload();
                })
        });


        //发送说说
        $('#zoneButton').click(function(){
            $(this).addClass('disabled');
            var SendZoneUrl_js=$('input[name="SendZoneUrl"]').val();
            var Content=$('textarea[name="zoneContent"]').val();
            $.post(SendZoneUrl_js,{Content:Content},
                function(data){
                    data=eval("("+data+")");
                    if(data.status)
                        alert('发布成功!');
                    else
                        alert('发布失败!');
                    location.reload();
                });
        });

    
    });
</script>

<script type="text/javascript">
(function (win){ 
    var callboarTimer; 
    var callboard = $('.callboard'); 
    var callboardUl = callboard.find('ul'); 
    var callboardLi = callboard.find('li'); 
    var liLen = callboard.find('li').length; 
    var initHeight = callboardLi.first().outerHeight(true); 
    win.autoAnimation = function ()
    { 
        if (liLen <= 1) return; 
        var self = arguments.callee; 
        var callboardLiFirst = callboard.find('li').first(); 
        callboardLiFirst.animate({ 
                marginTop:-initHeight 
            }, 500, function (){ 
                        clearTimeout(callboarTimer); 
                        callboardLiFirst.appendTo(callboardUl).css({marginTop:0}); 
                        callboarTimer = setTimeout(self, 5000); 
        }); 
    } 
    callboard.mouseenter( 
        function ()
        { 
            clearTimeout(callboarTimer); 
        }).mouseleave(
        function ()
        { 
            callboarTimer = setTimeout(win.autoAnimation, 5000); 
        }); 
}(window));

setTimeout(window.autoAnimation, 5000); 
</script>
</body>
</html>