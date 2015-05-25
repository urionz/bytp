<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function index(){
        if(session('?name'))
            redirect(U('Index/index'));
        else
            $this->display();
    }

    //登陆
    public function login(){
        $user=I('post.username');
        $pwd=md5(I('post.password'));
        $verify=I('post.verify');


        if(check_verify($verify,$id=''))
        {
            $UserTable=M('User');
            $con['username']=$user;
            $con['password']=$pwd;
            if($data=$UserTable->where($con)->find())
            {   
                //登陆成功记录session
                session('name',$user);
                session('realname',$data['realname']);
                session('uid',$data['id']);

                /*写入用户操作日志begin*/
                $log['action'] = '登陆系统';
                $Userlog = new \Home\Common\Userlog();
                $Userlog->save($log);
                /*写入用户操作日志end*/

                $this->success('登陆成功!',U('Index/index'));
            }
            else
                $this->error('用户名或密码不正确!',U('Login/index'));
        }
        else
            $this->error('验证码不正确!',U('Login/index'));
    }


    //退出
    public function logout(){
        /*写入用户操作日志begin*/
        $log['action'] = '退出登录';
        $Userlog = new \Home\Common\Userlog();
        $Userlog->save($log);
        /*写入用户操作日志end*/
        session(null);
        $this->success('退出成功!',U('Login/index'));
    }



    //验证码生成函数
    public function verify(){
        ob_clean();
        $config=array(
                'length'=>4,//验证码位数
                'useNoise'=>false,//是否开启杂点
            );
        $Verify=new \Think\Verify($config);
        $Verify->codeSet='0123456789';//设置为纯数字验证码
        $Verify->entry();
    }



    //注册
    public function register(){
        $LockTable=M('table_lock');
        $is_lock=$LockTable->where('table_name="al_user"')->field('is_lock')->select();
        if($is_lock[0]['is_lock']==1)
            $this->display();
        else
            $this->error('注册功能暂时关闭，请联系管理员!');
    }

    public function regAction(){
        if(IS_AJAX)
        {
            $getData['username']=I('post.username');
            $getData['phone']=I('post.phone');
            $getData['realname']=I('post.realname');
            $getData['password']=md5(I('post.password'));
            $isPassword=md5(I('post.password2'));
            $status=0;
            $verify=I('post.yzm');
            $UserTable=M('User');
            // $ajaxReturn['status']=1;
            // $this->ajaxReturn($verify);
            if($data=$UserTable->where('username="'.$getData['username'].'"')->find())
            {
                $status=1;
                $this->ajaxReturn($status);
            }
            if($isPassword!=$getData['password'])
            {
                $status=2;
                $this->ajaxReturn($status);
            }
            if(check_verify($verify,$id=''))
            {
                if($UserTable->data($getData)->add())
                {
                    $status=4;
                    $this->ajaxReturn($status);
                }
                else
                {
                    $status=5;
                    $this->ajaxReturn($status);
                }
            }
            else
            {
                $status=3;
                $this->ajaxReturn($status);
            }
            $this->ajaxReturn($status);
        }
    }
}
?>