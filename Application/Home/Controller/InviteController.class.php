<?php
namespace Home\Controller;
use Think\Controller;
class InviteController extends Controller{
    public function index(){
        if(isset($_GET['uid'])&&isset($_GET['alumid']))
        {
            $alumisTable=M('alumis');
            $uid=I('get.uid');
            $alumid=I('get.alumid');
            if(IS_POST)
            {
                
                $InvitePwd=md5(I('post.InvitePwd'));
                if($alumisTable->where('userid='.$uid.' and alumi_pwd="'.$InvitePwd.'" and alumi_id='.$alumid)->find())
                {
                    $this->display();
                }
                else
                {
                    $this->error('密码错误!');
                }

            }
            else
            {
                if($alumisTable->where('userid='.$uid.' and alumi_id='.$alumid.' and alumi_pwd is not null')->find())
                    $this->display('Auth');
                else
                    $this->error('非法访问!');
            }
        }
        else
            $this->error('非法访问!');
    }
    public function InviteAction(){
        if(IS_POST)
        {
            if(isset($_GET['uid'])&&isset($_GET['alumid']))
            {
                $alumiTable=M('alumi');
                $data['alumi_id']=I('get.alumid');
                $data['userid']=I('get.uid');
                $data['friendname']=I('post.friendname');
                $data['sex']=I('post.sex')==0?'男':'女';
                $data['age']=I('post.age');
                $data['QQ']=I('post.qq');
                $data['phone']=I('post.phone');
                $data['tell']=I('post.tell');
                $data['job']=I('post.job');
                $data['address']=I('post.address');
                $data['class']=I('post.class');
                $data['schoolname']=I('post.schoolname');
                $data['hobby']=I('post.hobby');
                $data['fav_food']=I('post.fav_food');
                $data['fav_star']=I('post.fav_star');
                $data['fav_teacher']=I('post.fav_teacher');
                $data['fav_say']=I('post.fav_say');
                $data['fav_fruit']=I('post.fav_fruit');
                $data['fav_person']=I('post.fav_person');
                $data['fav_country']=I('post.fav_country');
                $data['tell_me']=I('post.tell_me');

                $data['friendicon']=$this->upload(3145728,array('jpg', 'gif', 'png', 'jpeg'),'./Uploads/icon/','',time().'_auid'.$data['alumi_id']);

                if($alumiTable->data($data)->add())
                {
                    $this->success('填写成功!');
                }
                else
                {
                    $this->error('填写失败!');
                }

            }
            else
            {
                $this->error('非法访问!');
                exit;
            }
        }
    }



    public function upload($max_size=3145728,$allow_exts=array(),$root_path,$save_path,$save_name){
        $upload=new \Think\Upload();
        $upload->maxSize = $max_size;
        $upload->exts = $allow_exts;
        $upload->rootPath = $root_path;
        $upload->savePath = $save_path;
        $upload->saveName = $save_name;
        $info=$upload->upload();
        if(!$info)
        {
            $this->error($upload->getError());
        }
        else
        {
            return '/Uploads/icon/'.$info['friendicon']['savepath'].$info['friendicon']['savename'];
        }
    }
}
?>