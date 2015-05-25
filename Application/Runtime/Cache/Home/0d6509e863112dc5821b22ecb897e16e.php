<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>

<title><?php echo ($_T['webinfo'][0]['web-name']); ?></title>
<script type="text/javascript" src="/bytp_/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/bytp_/Public/js/modernizr.2.5.3.min.js"></script>
<script type="text/javascript" src="/bytp_/Public/js/zone.js"></script>
<script type="text/javascript" src="/bytp_/Public/js/announce.js"></script>

<!-- <link rel="stylesheet" href="/bytp_/Public/css/style.css" />
<script type='text/javascript' src='/bytp_/Public/js/jquery.particleground.min.js'></script>
 -->
<link rel="stylesheet" type="text/css" href="/bytp_/Public/css/Index_index.css">
<link rel="stylesheet" type="text/css" href="/bytp_/Public/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="/bytp_/Public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bytp_/Public/js/Index_index.js"></script>


<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<script>
    var ppath="/bytp_/Public";
    var alumis_lock="<?php echo ($_T['lock-info'][1]['is_lock']); ?>";
</script>
<style>
p{
    font-family: "ziti05";
    font-size: 16px;
    /*font-weight: bold;*/
    text-shadow:0px 0px 3px #000;
    padding: 2px 0 0 0;
}

#callboard { height:24px; line-height:24px; overflow:hidden;} 
#callboard ul { padding:0;} 
#callboard li { padding:0;}
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
                <li><a href="#">校友录册子管理</a></li>
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


<!-- <div id="particles">
    <div class="intro"> -->
        
<?php if(($_T['query_type'] != 'manage') and ($_T['query_type'] != 'manageAnnounce')): ?><div id="main">
        <ul class="main_child">
            <?php if(is_array($alumisInfo)): $i = 0; $__LIST__ = $alumisInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$alumisInfo): $mod = ($i % 2 );++$i;?><li>
                    <img alt="<?php echo ($alumisInfo['alumi_id']); ?>" src="<?php echo ($alumisInfo['alumi_covers']); ?>">
                    <div class="ImageInfo">
                        <h3><?php echo ($alumisInfo['alumi_name']); ?></h3>
                        <p><?php echo ($alumisInfo['alumi_intro']); ?></p>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            <li class="add">
                <img src="/bytp_/Public/images/add.png">
                 <div class="ImageInfo">
                    <h3>创建一个吧</h3>
                </div>
            </li>
        </ul>
    </div>
    <div class="gray">
    </div>



    <?php if(is_array($alumiID)): $i = 0; $__LIST__ = $alumiID;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="showImg<?php echo ($v['alumi_id']); ?> showImgid">
        <div class="flipbook-viewport">
            <div class="container">
                <div class="flipbook">
                    <img class="show<?php echo ($v['alumi_id']); ?>" src="<?php echo ($v['alumi_covers']); ?>" />
                    <?php if(is_array($alumi_Info)): $i = 0; $__LIST__ = $alumi_Info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['alumi_id'] == $v['alumi_id']): ?><div style="background:#DFF0D8;">
                                <div class="left" style="margin: 20px;">
                                    <p>信息</p>
                                    <div class="left">
                                        <img class="zzsc" src="/bytp_<?php echo ($vo['friendicon']); ?>"  />
                                        <p>姓名：<?php echo ($vo['friendname']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓别：<?php echo ($vo['sex']); ?></p>
                                        <p>年龄：<?php echo ($vo['age']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ：<?php echo ($vo['qq']); ?></p>
                                        <p>手机号码：<?php echo ($vo['phone']); ?></p>
                                        <p>座机电话：<?php echo ($vo['tell']); ?></p>
                                        <p>目前工作：<?php echo ($vo['job']); ?></p>
                                        <p>现居地址：<?php echo ($vo['address']); ?></p>
                                        <p>班级：<?php echo ($vo['class']); ?></p>
                                        <p>学校名称：<?php echo ($vo['schoolname']); ?></p>
                                        <p>爱好：<?php echo ($vo['hobby']); ?></p>
                                        <p>最爱的食物：<?php echo ($vo['fav_food']); ?></p>
                                        <p>最喜欢的明星：<?php echo ($vo['fav_star']); ?></p>
                                        <p>最喜欢的老师：<?php echo ($vo['fav_teacher']); ?></p>
                                        <p>口头禅：<?php echo ($vo['fav_say']); ?></p>
                                        <p>最喜欢的水果：<?php echo ($vo['fav_fruit']); ?></p>
                                        <p>最喜欢的人：<?php echo ($vo['fav_person']); ?></p>
                                        <p>最喜欢的国家：<?php echo ($vo['fav_country']); ?></p>                                    
                                        <p>想对我说的话：<?php echo ($vo['tell_me']); ?></p>          
                                    </div>
                                </div>
                            </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    <div style="background:#DFF0D8;">
                        <div class="left" style="margin: 20px;">
                            <p></p>
                            <div class="left" style="margin:80px;">
                                <p>背起行囊的那一刻，</p>
                                <p>风吹拂我的发梢；</p>
                                <p>思绪翻飞在云里，</p>
                                <p>梦想包裹在囊中；</p>
                                <p>长长的旅途，</p>
                                <p>不准备一个人走，</p>
                                <p>陪伴我的，</p>
                                <p>除了诗稿，</p>
                                <p>还有你的音容笑貌。</p>
                                <p></p>
                                <p></p>
                                <p></p>
                                <p></p>
                                <p></p>
                                <p></p>
                                <p></p>
                                <p></p>
                                <?php if(!empty($v['alumi_pwd'])): ?><p>赶紧分享你的链接给朋友，让朋友帮你填写吧..</p>
                                    <p>记得告诉填写人密码哦。</p>
                                    <a style="margin:0 0 0 -20px;" href="http://<?php echo ($_SERVER['SERVER_NAME']); echo ($_SERVER['SCRIPT_NAME']); ?>/Invite/index/uid/<?php echo session('uid');?>/alumid/<?php echo ($v['alumi_id']); ?>" target="__blank">http://<?php echo ($_SERVER['SERVER_NAME']); echo ($_SERVER['SCRIPT_NAME']); ?>/Invite/index/uid/<?php echo session('uid');?>/alumid/<?php echo ($v['alumi_id']); ?></a>
                                    <?php else: ?>
                                    <p><a href="#" id="getUrl-class" onclick="GetUrlFunc('<?php echo U('Index/getUrl','','');?>/alumid/<?php echo ($v['alumi_id']); ?>')">您还没有生成您的填写地址哦，赶紧点击我吧!</a></p><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>


<!--管理员设置end-->
<?php if(($_T['query_type'] == 'manageAnnounce') and (session('uid') == 1)): ?><label>网站公告列表：</label>
    <table class="table table-hover">
        <tr>
            <th>发布人ID</th>
            <th>发布时间</th>
            <th>公告内容</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($Announce)): $i = 0; $__LIST__ = $Announce;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tableAnnounce): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($tableAnnounce['uid']); ?></td>
                <td><?php echo (date("Y-m-d H:i",$tableAnnounce['sendtime'])); ?></td>
                <td title="<?php echo strip_tags($tableAnnounce['message']);?>"><?php echo subtitle($tableAnnounce['message'],18);?>....</td>
                <td><a href="<?php echo U('Index/AnnounceDelAction','','');?>/type/manageAnnounce/id/<?php echo ($tableAnnounce['id']); ?>">删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <form class="manage-form" action="<?php echo U('Index/AnnounceAddAction','','');?>/type/manageAnnounce" method="post">
        <div class="form-group">
            <label for="announce">发布：</label>
            <input type="text" name="announce" class="form-control" value="" id="announce" placeholder="请输入">
        </div>
        <button type="submit" class="btn btn-default center-block">发布</button>
    </form><?php endif; ?>
<!--管理员公告设置-->


<!--管理员设置-->
<?php if(($_T['query_type'] == 'manage') and (session('uid') == 1)): ?><form class="manage-form" action="<?php echo U('Index/ManageAction','','');?>/type/manage" method="post">
        <div class="form-group">
            <label for="title">网站标题：</label>
            <input type="text" name="web-name" class="form-control" value="<?php echo ($_T['webinfo'][0]['web-name']); ?>" id="web-name" placeholder="请输入">
        </div>
        <div class="form-group">
            <label for="title">网站seo信息：</label>
            <input type="text" name="meta" class="form-control" value="<?php echo ($_T['webinfo'][0]['meta']); ?>" id="meta" placeholder="请输入">
        </div>
        <div class="form-group">
            <label for="title">网站信息：</label>
            <input type="text" name="info" class="form-control" value="<?php echo ($_T['webinfo'][0]['info']); ?>" id="info" placeholder="请输入">
        </div>
        <div class="form-group">
        注&nbsp;&nbsp;册&nbsp;&nbsp;开&nbsp;&nbsp;关&nbsp;：
            <label class="radio-inline">
                <input type="radio" name="reg-radio" id="reg-radio1" <?php if($_T['lock-info'][3]['is_lock'] == 1): ?>checked="checked"<?php endif; ?> value="1"> 开
            </label>
            <label class="radio-inline">
                <input type="radio" name="reg-radio" id="reg-radio2" <?php if($_T['lock-info'][3]['is_lock'] == 0): ?>checked="checked"<?php endif; ?> value="0"> 关
            </label>
        </div>
        <div class="form-group">
        册子创建开关：
            <label class="radio-inline">
                <input type="radio" name="alumi-radio" <?php if($_T['lock-info'][1]['is_lock'] == 1): ?>checked="checked"<?php endif; ?> id="alumi-radio1" value="1"> 开
            </label>
            <label class="radio-inline">
                <input type="radio" name="alumi-radio" id="alumi-radio2" <?php if($_T['lock-info'][1]['is_lock'] == 0): ?>checked="checked"<?php endif; ?> value="0"> 关
            </label>
        </div>
        <div class="form-group">
        公&nbsp;&nbsp;告&nbsp;&nbsp;开&nbsp;&nbsp;关&nbsp;：
            <label class="radio-inline">
                <input type="radio" name="announce-radio" <?php if($_T['lock-info'][2]['is_lock'] == 1): ?>checked="checked"<?php endif; ?> id="announce-radio1" value="1"> 开
            </label>
            <label class="radio-inline">
                <input type="radio" name="announce-radio" id="announce-radio2" <?php if($_T['lock-info'][2]['is_lock'] == 0): ?>checked="checked"<?php endif; ?> value="0"> 关
            </label>
        </div>
        <div class="form-group">
        允&nbsp;&nbsp;许&nbsp;&nbsp;填&nbsp;&nbsp;写&nbsp;：
            <label class="radio-inline">
                <input type="radio" name="allow-radio" <?php if($_T['lock-info'][0]['is_lock'] == 1): ?>checked="checked"<?php endif; ?> id="allow-radio1" value="1"> 开
            </label>
            <label class="radio-inline">
                <input type="radio" name="allow-radio" id="allow-radio2" <?php if($_T['lock-info'][0]['is_lock'] == 0): ?>checked="checked"<?php endif; ?> value="0"> 关
            </label>
        </div>
        <button type="submit" class="btn btn-default center-block">设置</button>
    </form>
    <?php elseif((session('uid') != 1) and ($_T['query_type'] == 'manage')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> 非法操作，您没有此权限！！！
        </div><?php endif; ?>




<!---->

        <!-- 
            <div class="smart-green">
                <form action="" method="post" class="STYLE-NAME">
                    <h1>添加自己的册子</h1>
                    <label>
                    <span>册子名称 :</span>
                    <input type="hidden" name="addAjaxUrl" value="<?php echo U('addAlumni','','');?>">
                    <input id="name" type="text" name="alumi_name" placeholder="请填写册子名称" />
                    </label>
                    <label>
                    <span>册子封面 :</span>
                    <select name="alumi_covers" id="alumi_covers">
                        <option value="/bytp_/Public/images/1.png">1</option>
                        <option value="/bytp_/Public/images/3.png">3</option>
                        <option value="/bytp_/Public/images/4.png">4</option>
                        <option value="/bytp_/Public/images/5.png">5</option>
                        <option value="/bytp_/Public/images/6.png">6</option>
                        <option value="/bytp_/Public/images/7.png">7</option>
                        <option value="/bytp_/Public/images/8.png">8</option>
                        <option value="/bytp_/Public/images/9.png">9</option>
                        <option value="/bytp_/Public/images/10.png">10</option>
                        <option value="/bytp_/Public/images/11.png">11</option>
                    </select>
                    <img class="covers" src="" />
                    </label>
                    <label>
                    <span>册子简介 :</span>
                    <textarea id="message" name="alumi_intro" placeholder="册子简介"></textarea>
                    </label>
                    <label>
                    <span>&nbsp;</span>
                    <input type="button" class="button" value="提交" />
                    </label>
                </form>
            </div> -->



        <div class="login-page">
            <div class="login-form">

                <div class="login-content">
                  <div>
                    <h3 style="color:green;">添加自己的册子</h3>
                  </div>

                  <form method="post" action="" role="form" id="form_login">

                    <div class="form-group">

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="glyphicon glyphicon-pencil"></i>
                        </div>
                        <input type="hidden" name="addAjaxUrl" value="<?php echo U('addAlumni','','');?>">
                        <input type="text" onClick="this.value='';" onFocus="this.select()" onBlur="this.value=!this.value?'册子名称':this.value;" class="form-control" name="alumi_name" id="name" placeholder="册子名称" autocomplete="off" />
                      </div>

                    </div>

                    
                    <div class="form-group">
                        
                      <div class="input-group">
                      <div class="input-group-addon">
                          <i class="glyphicon glyphicon-picture"></i>
                        </div>
                        <select name="alumi_covers" class="form-control" id="alumi_covers">
                            <option value="/bytp_/Public/images/1.png">1</option>
                            <option value="/bytp_/Public/images/3.png">3</option>
                            <option value="/bytp_/Public/images/4.png">4</option>
                            <option value="/bytp_/Public/images/5.png">5</option>
                            <option value="/bytp_/Public/images/6.png">6</option>
                            <option value="/bytp_/Public/images/7.png">7</option>
                            <option value="/bytp_/Public/images/8.png">8</option>
                            <option value="/bytp_/Public/images/9.png">9</option>
                            <option value="/bytp_/Public/images/10.png">10</option>
                            <option value="/bytp_/Public/images/11.png">11</option>
                        </select>

                      </div>
                      <br/>
                    <img class="covers" src="" />
                    </div>



                    

                    
                    <div class="form-group">

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="glyphicon glyphicon-pencil"></i>
                        </div>
                        <textarea id="message" name="alumi_intro" class="form-control" style="resize:none;" placeholder="册子简介"></textarea>
                    </div>

                    <br/>
                    <div class="form-group">
                      <button type="button" id="login" class="btn btn-primary btn-block btn-login button">
                        <i class="glyphicon glyphicon-circle-arrow-right"></i>
                        提交
                      </button>
                    </div>

                  </form>

                </div>
            </div>

        </div>
    <!-- </div>
</div> -->










<script type="text/javascript">

// var huaurl="/bytp_/Public/pics/huaban.png";
function loadApp() {

    // Create the flipbook
    //遍历flipbook类，加载特效
    $('.flipbook').each(function(){
        $(this).turn({
            // Width
            
            width:1000,
            
            // Height

            height:680,

            // Elevation

            elevation: 50,
            
            // Enable gradients

            gradients: true,
            
            // Auto center this flipbook

            autoCenter: true

        });
    });
}

function GetUrlFunc(ajaxVar)
{
    var getUrl="http://<?php echo ($_SERVER['HTTP_HOST']); ?>"+ajaxVar;
    $.get(getUrl,
        function(data)
        {
            if(data.status)
            {
                alert('生成成功:您的地址为：\n http://<?php echo ($_SERVER['HTTP_HOST']); ?>'+data.Url+'\n 邀请填写密码为：\n '+data.pwd+'\n 请牢记！');
                location.reload();
            }
            else
            {
                alert('生成失败!');
            }
        });
}


// Load the HTML4 version if there's not CSS transform

yepnope({
    test : Modernizr.csstransforms,
    yep: ['/bytp_/Public/lib/turn.js'],
    nope: ['/bytp_/Public/lib/turn.html4.min.js'],
    both: ['/bytp_/Public/css/basic.css'],
    complete: loadApp
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