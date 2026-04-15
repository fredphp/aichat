<?php


namespace app\service\controller;

use app\service\model\Admins;
use app\service\model\Business;
use app\service\model\ButtonSwitch;
use app\service\model\Service;
use think\Db;

/**
 *
 * 后台页面控制器.
 */
class Chat extends Base
{
    public function index()
    {
        $login = $_SESSION['Msg'];
        $res = Db::table('wolive_business')->where('id', $login['business_id'])->find();
        $service = Db::table('wolive_service')->where('service_id', $login['service_id'])->find();
        $allService = Db::table('wolive_service')->where('business_id', $login['business_id'])->select();
       $buttonSwitch = ButtonSwitch::get(['business_id'=>$login['business_id']]);
       
        $this->assign("type", $res['video_state']);
        $this->assign('kefu_select_state', $buttonSwitch['kefu_select_state']);
        $this->assign("baidu_map_key", baidu_map_key);
        $this->assign("service", $service);
        $this->assign("allService", $allService);
        $this->assign("buttonSwitch", $buttonSwitch);
        return $this->fetch();
    }
    public function editor()
    {
        $login = $_SESSION['Msg'];
        $res = Db::table('wolive_business')->where('id', $login['business_id'])->find();
        $service = Db::table('wolive_service')->where('service_id', $login['service_id'])->find();
        $this->assign("type", $res['video_state']);
        $this->assign("baidu_map_key", baidu_map_key);
        $this->assign("service", $service);
        $this->assign('atype', $res['audio_state']);
        return $this->fetch();
    }
    public function switchKeFu(){
        if (!$this->request->isPost()){
            return;
        }
        $login = $_SESSION['Msg'];
        if (empty($login)){
            return;
        }
        $service_id = $this->request->post("service_id");
        $admin = Service::get(['service_id'=>$service_id]);
        $login = $admin->getData();

        // 删掉登录用户的敏感信息
        unset($login['password']);
        $res = Admins::table('wolive_service')->where('service_id', $login['service_id'])->update(['state' => 'online']);
        $_SESSION['Msg'] = $login;
        $business = Business::get($_SESSION['Msg']['business_id']);
        if($business['is_shenhe'] == 1){
            return json(['code'=>-1,'msg'=>'账号实名信息正在审核中']);
        }
        $_SESSION['Msg']['business'] = $business->getData();
        return json(['code'=>0,'msg'=>'切换成功']);
    }
}