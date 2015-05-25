<?php
    

    //验证登录函数
    function isLogin(){
        if(!session('?name'))
            redirect(U('Login/index'));
        else
        {
            $LoginInfo['name']=session('name');
            $LoginInfo['uid']=session('uid');
            $LoginInfo['realname']=session('realname');
        }
        return $LoginInfo;
    }

    //验证码检测函数
    function check_verify($code,$id=''){
        $verify=new \Think\Verify();
        return $verify->check($code,$id);
    }


    //随机密码
    function getRandomString($len, $chars=null)
    {
        if (is_null($chars)){
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        }  
        mt_srand(10000000*(double)microtime());
        for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++){
            $str .= $chars[mt_rand(0, $lc)];  
        }
        return $str;
    }


    function upload($max_size=3145728,$allow_exts=array(),$root_path,$save_path,$save_name){
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
            return __ROOT__.'/Uploads/icon/'.$info['friendicon']['savepath'].$info['friendicon']['savename'];
        }
    }





    function subtitle($str,$length){
        $str=strip_tags($str);
        return mb_substr($str, 0,$length,'utf-8');
    }




    //计算时间间隔
    function subtime($timed,$currentime='')
    {
        $currentime=time();
        $sub=$currentime-$timed;
        if($sub<60)
            return $sub.'秒前';
        elseif($sub>=60&&$sub<60*60)
            return date('i',$sub).'分钟前';
        elseif($sub>=60*60&&$sub<60*60*24)
        {
            $hour=floor($sub/(60*60));
            return $hour.'小时前';
        }
        elseif($sub>=60*60*24&&$sub<60*60*24*2)
        {
            $day=floor($sub/(60*60*24));
            return $day.'天前';
        }
        else
            return date('Y-m-d H:i:s',$sub);
    }
    
?>