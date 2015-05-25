<?php
namespace Home\Model;
use Think\Model\ViewModel;

class GroupViewModel extends ViewModel {
       public $viewFields = array(
         'friend'=>array('*','_as'=>'a','_type'=>'LEFT'),
         'friend_group'=>array('*','_as'=>'b','_on'=>'a.groupid=b.id','_type'=>'LEFT'),
         'user'=>array('username','_as'=>'c','_on'=>'c.id=a.friendid'),
       );
     }
?>