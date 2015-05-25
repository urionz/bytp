<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _initialize(){
        $LoginInfo=isLogin();
        //载入公告
        $AnnounceTable=M('announce');
        $AnnounceInfo=$AnnounceTable->select();
        $this->assign('Announce',$AnnounceInfo);



        //获取表锁
        $LockTable=M('Table_lock');
        $LockInfo=$LockTable->select();


        //册子表
        $alumisTable=M('alumis');
        $alumisInfo=$alumisTable->where('userid='.session('uid'))->select();
        $this->assign('alumisInfo',$alumisInfo);
        // var_dump($alumisInfo);

        //好友信息
        $alumiTable=M('alumi');
        $alumiInfo=$alumiTable->select();
        $this->assign('alumi_Info',$alumiInfo);
        // var_dump($alumiInfo);


        //册子ID
        $alumi_id=$alumisTable->where('userid='.session('uid'))->field('alumi_id,alumi_covers,alumi_pwd')->select();
        $this->assign('alumiID',$alumi_id);
        // var_dump($alumiID);
        
        
        

        //载入说说
        $ZoneTable=D('ZoneUserView');
        $ZoneInfo=$ZoneTable->order('sendtime desc')->limit('0,20')->select();
        $this->assign('ZoneInfo',$ZoneInfo);




        //载入网站信息
        $WebInfoTable=M('webinfo');
        $WebInfo=$WebInfoTable->select();
        $_G['query_type']=I('get.type');
        $_G['webinfo']=$WebInfo;
        $_G['lock-info']=$LockInfo;
        $_G['user-info']=M('User')->where('id='.session('uid'))->field('id,icon')->select();
        // var_dump($_G);
        $this->assign('_T',$_G);
    }
    public function index(){
        $this->display();
    }
    public function addAlumni(){
        if(IS_AJAX)
        {
            $LockTable=M('table_lock');
            $is_lock=$LockTable->where('table_name="al_alumis"')->select();
            $ajaxResult['status']=0;
            if($is_lock[0]['is_lock']==1)
            {
                $data['alumi_name']=I('post.alumi_name');
                $data['alumi_intro']=I('post.alumi_intro');
                $data['alumi_covers']=I('post.alumi_covers')==''?'bytp/Public/images/1.png':I('post.alumi_covers');
                $data['userid']=session('uid');
                $alumisTable=M('alumis');
                $ajaxResult=array();

                //检验册子是否重名
                if($alumisTable->where('alumi_name="'.$data['alumi_name'].'"')->find())
                {
                    $ajaxResult['status']=2;//重名
                    $this->ajaxReturn($ajaxResult);
                }
                else
                {
                    $alumisInfo=$alumisTable->field('alumi_name')->select();
                    $id=$alumisTable->max('alumi_id');
                    $data['alumi_id']=$id+1;
                    if($result=$alumisTable->data($data)->add())
                    {
                        /*写入用户操作日志begin*/
                        $log['action'] = '添加了册子---'.$data['alumi_name'];
                        $Userlog = new \Home\Common\Userlog();
                        $Userlog->save($log);
                        /*写入用户操作日志end*/
                        $ajaxResult['status']=1;//成功
                        $this->ajaxReturn($ajaxResult);
                    }
                    else
                    {
                        $ajaxResult['status']=0;//失败
                        $this->ajaxReturn($ajaxResult);
                    }
                }
            }
            $this->ajaxReturn($ajaxResult);
        } 
    }


    //修改密码
    public function PasModify(){

        if(IS_POST)
        {
            $oldpwd=md5(I('post.oldpwd'));
            $newpwd=md5(I('post.newpwd'));
            $newpwd2=md5(I('post.newpwd2'));
            $verify=I('post.verify');
            $UserTable=M('User');
            if(check_verify($verify,$id=''))
            {
                if($newpwd!=$newpwd2)
                    $this->error('两次输入的密码不一致!',U('Index/PasModify'));
                else
                {
                    if($UserTable->where('id='.session('uid').' and password="'.$oldpwd.'"')->find())
                    {
                        $data['password']=$newpwd;
                        if($UserTable->where('id='.session('uid'))->data($data)->save())
                        {
                            /*写入用户操作日志begin*/
                            $log['action'] = '修改了密码';
                            $Userlog = new \Home\Common\Userlog();
                            $Userlog->save($log);
                            /*写入用户操作日志end*/
                            session(null);
                            $this->success('修改成功!',U('Login/index','',''));
                        }
                    }
                    else
                    {
                        $this->error('旧密码不正确!',U('Index/PasModify'));
                    }
                }    
            }
            else
            {
                $this->error('验证码错误!',U('Index/PasModify'));
            }
        }
        else
            $this->display();
        
    }


    public function ManageAction()
    {
        if(isset($_GET['type']))
        {
            $WebInfoTable=M('webinfo');
            $LockTable=M('table_lock');
            $data['web-name']=I('post.web-name');
            $data['meta']=I('post.meta');
            $data['info']=I('post.info');
            $reg_data['is_lock']=I('post.reg-radio');
            $alumi_data['is_lock']=I('post.alumi-radio');
            $announce_data['is_lock']=I('post.announce-radio');
            $allow_data['is_lock']=I('post.allow-radio');
            $LockTable->where('table_name="al_user"')->data($reg_data)->save();
            $LockTable->where('table_name="al_alumis"')->data($alumi_data)->save();
            $LockTable->where('table_name="al_announce"')->data($announce_data)->save();
            $LockTable->where('table_name="al_alumi"')->data($allow_data)->save();
            $WebInfoTable->where('id=1')->data($data)->save();
            $this->success('设置成功!');
        }
        else
            $this->error('非法访问!');
    }


    public function AnnounceDelAction(){
        if(isset($_GET['type'])&&$_GET['type']=='manageAnnounce'&&session('uid')==1)
        {
            $id=I('get.id');
            $AnnounceTable=M('announce');
            if($AnnounceTable->where('id='.$id)->delete())
            {
                $this->success('删除成功!');
            }
            else
            {
                $this->error('删除失败!');
            }
        }
        else
        {
            $this->error('非法访问！');
        }
    }


    public function AnnounceAddAction(){
        if(IS_POST)
        {
            if(isset($_GET['type'])&&$_GET['type']=='manageAnnounce'&&session('uid')==1)
            {
                $AnnounceTable=M('announce');
                $data['message']=$_POST['announce'];
                $data['uid']=session('uid');
                $data['sendtime']=time();
                if($AnnounceTable->data($data)->add())
                    $this->success('添加成功!');
                else
                    $this->error('添加失败!');
            }
            else
                $this->error('非法访问!');
        }
        else
            $this->error('非法访问!');
    }



    //生成填写地址
    public function getUrl(){
        if(IS_AJAX)
        {
            $alumisTable=M('alumis');
            $ReturnData['status']=0;
            $pwd=getRandomString(6);
            $alumid=I('get.alumid');
            $Url=U('Invite/index/uid/'.session('uid').'/alumid/'.$alumid,'','');
            if($alumisTable->where('alumi_id='.$alumid.' and userid='.session('uid'))->data('alumi_pwd='.md5($pwd))->save())
            {
                $ReturnData['status']=1;
                $ReturnData['Url']=$Url;
                $ReturnData['pwd']=$pwd;
                $this->ajaxReturn($ReturnData);
            }
            else
            {
                $ReturnData['status']=0;
                $this->ajaxReturn($ReturnData);
            }
        }
        
    }


    public function friend(){

        //获取分组
        $FriendGroup=M('friend_group')->where('uid='.session('uid'))->select();
        $this->assign('FriendGroup',$FriendGroup);



        $Friend=M('friend')->where('uid='.session('uid'))->select();
        $User=M('User')->select();
        $this->assign('friend',$Friend);
        $this->assign('User',$User);

        // var_dump($Friend);
        $this->display();
    }



    public function searchFriendAction(){
        if(IS_AJAX)
        {
            $UserTable=M('User');
            $SearchName=I('post.SearchName');
            $ajaxData['status']=0;
            if($result=$UserTable->where('username="'.$SearchName.'" and is_search=1')->field('id,username,realname,icon')->select())
            {
                $ajaxData['status']=1;
                $ajaxData['userinfo']=$result[0];
                $this->ajaxReturn(json_encode($ajaxData));
            }
            else
                $this->ajaxReturn(json_encode($ajaxData));


            $this->ajaxReturn(json_encode($ajaxData));
        }
    }


    //好友添加
    public function MakeFriend(){
        if(IS_AJAX)
        {
            $UserTable=M('User');
            $FriendTable=M('Friend');
            $FriendGroupTable=M('friend_group');
            $Fid=I('get.fid');
            $groupid=I('post.groupid');
            $ajaxData['status']=0;
            if($UserTable->where('id='.$Fid)->find())
            {
                if($FriendGroupTable->where('id='.$groupid))
                {
                    $data['uid']=session('uid');
                    $data['friendid']=$Fid;
                    $data['groupid']=$groupid;
                    if(!$FriendTable->where('uid='.$data['uid'].' and friendid='.$Fid)->find())
                    {
                        if($FriendTable->data($data)->add())
                        {   
                            /*写入用户操作日志begin*/
                            $log['action'] = '用户'.session('name').'添加ID='.$data['friendid'].'为好友';
                            $Userlog = new \Home\Common\Userlog();
                            $Userlog->save($log);
                            /*写入用户操作日志end*/
                            $ajaxData['status']=1;
                            $this->ajaxReturn(json_encode($ajaxData));
                        }
                        else
                        {
                            $ajaxData['status']=0;
                            $this->ajaxReturn(json_encode($ajaxData));
                        }
                            
                    }
                    else
                        {
                            $ajaxData['status']=4;
                            $this->ajaxReturn(json_encode($ajaxData));
                        }
                    
                }
                else
                {
                    $ajaxData['status']=2;
                    $this->ajaxReturn(json_encode($ajaxData));
                }
            }
            else
            {
                $ajaxData['status']=3;
                $this->ajaxReturn(json_encode($ajaxData));
            }
            $this->ajaxReturn($ajaxData);
        }
    }



    //好友分组添加
    public function GroupAddAction(){
        if(IS_AJAX)
        {
            $FriendGroupTable=M('friend_group');
            $data['uid']=session('uid');
            $data['groupname']=I('post.group_name');
            $ajaxData['status']=0;
            if($FriendGroupTable->where('uid='.$data['uid'].' and groupname="'.$data['groupname'].'"')->find())
            {
                $ajaxData['status']=2;
                $this->ajaxReturn(json_encode($ajaxData));
            }
            else
            {
                if($FriendGroupTable->data($data)->add())
                {
                    /*写入用户操作日志begin*/
                    $log['action'] = '用户'.session('name').'添加分组：'.$data['groupname'];
                    $Userlog = new \Home\Common\Userlog();
                    $Userlog->save($log);
                    /*写入用户操作日志end*/
                    $ajaxData['status']=1;
                    $this->ajaxReturn(json_encode($ajaxData));
                }
                else
                {
                    $ajaxData['status']=0;
                    $this->ajaxReturn(json_encode($ajaxData));
                }
            }
            $this->ajaxReturn(json_encode($ajaxData));
        }
    }


    //册子管理
    public function AlumiManage(){
        $AlumisInfo=M('alumis')->where('userid='.session('uid'))->select();
        $this->assign('AlumisInfo',$AlumisInfo);
        $this->display();
    }


    //管理
    public function Alumi(){
        
    }


    //修改用户Icon
    public function ModifyIcon(){
        if(IS_AJAX)
        {
            $UserTable=M('User');
            $id=session('uid');
            $data['icon']=I('post.IconSelected');
            $ajaxData['status']=0;
            if($UserTable->where('id='.$id.' and icon="'.$data['icon'].'"')->find())
            {
                $ajaxData['status']=2;
                $this->ajaxReturn(json_encode($ajaxData));
            }
            else
            {
                if($UserTable->where('id='.$id)->data($data)->save())
                {
                    $ajaxData['status']=1;
                    $this->ajaxReturn(json_encode($ajaxData));
                }
                else
                {

                }
            }
            
            $this->ajaxReturn(json_encode($ajaxData));
        }
    }




    //处理说说
    public function SendZoneAction(){
        if(IS_AJAX)
        {
            $ZoneTable=M('zone');
            $data['fromid']=session('uid');
            $data['content']=I('post.Content');
            $data['sendtime']=time();
            $ajaxData['status']=0;
            if($ZoneTable->data($data)->add())
            {
                $ajaxData['status']=1;
                $this->ajaxReturn(json_encode($ajaxData));
            }
            $this->ajaxReturn(json_encode($ajaxData));
        }
    }

}