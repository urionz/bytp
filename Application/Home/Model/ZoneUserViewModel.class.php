<?php
namespace Home\Model;
use Think\Model\ViewModel;
class ZoneUserViewModel extends ViewModel{
    public $viewFields=array(
            'zone'=>array('*','_type'=>'LEFT'),
            'user'=>array('username','icon','id','_on'=>'zone.fromid=user.id'),
        );
}
?>