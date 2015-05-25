<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<script type="text/javascript" src="/bytp_/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/bytp_/Public/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/bytp_/Public/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/bytp_/Public/css/Invite.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>文化学院校友录填写邀请</title>

</head>
    <body>
        <div class="container">
            
            <!-- <form class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">姓名：</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="姓名：">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">年龄：</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="年龄：">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Remember me
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Sign in</button>
                </div>
              </div>
            </form> -->


            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo U('InviteAction','','');?>/uid/<?php echo (session('uid')); ?>/alumid/<?php echo I('get.alumid');?>">
                <fieldset>
                    <legend>资料填写</legend>
                    <div class="form-group">
                        <label for="friendname" class="col-sm-2 control-label">姓名：</label>
                        <div class="col-sm-10">
                            <input type="text" name="friendname" class="form-control" placeholder="姓名：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sex" class="col-sm-2 control-label">姓名：</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="sex">
                                <option value="0">男</option>
                                <option value="1">女</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="age" class="col-sm-2 control-label">年龄：</label>
                        <div class="col-sm-10">
                            <input type="text" name="age" class="form-control" placeholder="年龄：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="qq" class="col-sm-2 control-label">QQ：</label>
                        <div class="col-sm-10">
                            <input type="text" name="qq" class="form-control" placeholder="年龄：">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">手机号码：</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" placeholder="手机号码：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tell" class="col-sm-2 control-label">座机电话：</label>
                        <div class="col-sm-10">
                            <input type="text" name="tell" class="form-control" placeholder="座机电话：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="job" class="col-sm-2 control-label">目前工作：</label>
                        <div class="col-sm-10">
                            <input type="text" name="job" class="form-control" placeholder="目前工作：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">现居地址：</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" class="form-control" placeholder="现居地址：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="class" class="col-sm-2 control-label">班级：</label>
                        <div class="col-sm-10">
                            <input type="text" name="class" class="form-control" placeholder="班级：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="schoolname" class="col-sm-2 control-label">学校名称：</label>
                        <div class="col-sm-10">
                            <input type="text" name="schoolname" class="form-control" placeholder="学校名称：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hobby" class="col-sm-2 control-label">爱好：</label>
                        <div class="col-sm-10">
                            <input type="text" name="hobby" class="form-control" placeholder="爱好：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fav_food" class="col-sm-2 control-label">最爱的食物：</label>
                        <div class="col-sm-10">
                            <input type="text" name="fav_food" class="form-control" placeholder="最爱的食物：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fav_star" class="col-sm-2 control-label">最喜欢的明星：</label>
                        <div class="col-sm-10">
                            <input type="text" name="fav_star" class="form-control" placeholder="最喜欢的明星：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fav_teacher" class="col-sm-2 control-label">最喜欢的老师：</label>
                        <div class="col-sm-10">
                            <input type="text" name="fav_teacher" class="form-control" placeholder="最喜欢的老师：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fav_say" class="col-sm-2 control-label">口头禅：</label>
                        <div class="col-sm-10">
                            <input type="text" name="fav_say" class="form-control" placeholder="口头禅：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fav_fruit" class="col-sm-2 control-label">最喜欢的水果：</label>
                        <div class="col-sm-10">
                            <input type="text" name="fav_fruit" class="form-control" placeholder="最喜欢的水果：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fav_person" class="col-sm-2 control-label">最喜欢的人：</label>
                        <div class="col-sm-10">
                            <input type="text" name="fav_person" class="form-control" placeholder="最喜欢的人：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fav_country" class="col-sm-2 control-label">最喜欢的国家：</label>
                        <div class="col-sm-10">
                            <input type="text" name="fav_country" class="form-control" placeholder="最喜欢的国家：">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tell_me" class="col-sm-2 control-label">想对我说的话：</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="tell_me" placeholder="想对我说的话："></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="friendicon" class="col-sm-2 control-label">上传图像：</label>
                        <div class="col-sm-10">
                            <input type="file" name="friendicon" id="exampleInputFile">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default center-block">提交</button>
                </fieldset>
            </form>
        </div>
    </body>
</html>