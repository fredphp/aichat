<?php


namespace app\service\controller;

use app\service\model\ButtonSwitch;
use app\service\model\Sentence;
use app\service\model\WechatPlatform;
use think\Db;
use app\service\model\Service;
use app\common\lib\Storage;

/**
 *
 * 后台页面控制器.
 */
class Setting extends Base
{
    public function index()
    {
        $login = $_SESSION['Msg'];
        $template = WechatPlatform::get(['business_id' => $login['business_id']]);
        if ($this->request->isAjax()) {
            $post = $this->request->post($login);
            $update = ['lang' => $post['lang'], 'pctab' => $post['pctab'], 'bd_trans_appid' => $post['bd_trans_appid'], 'bd_trans_secret' => $post['bd_trans_secret'], 'google_trans_key' => $post['google_trans_key'], 'trans_type' => $post['trans_type'], 'auto_trans' => $post['auto_trans'], 'auto_ip' => $post['auto_ip'], 'template_state' => $post['template_state'], 'ts1' => $post['ts1'], 'ts2' => $post['ts2'], 'ts3' => $post['ts3']];
            Db::table('wolive_business')->where(['id' => $login['business_id']])->update($update);
            $template_data = ['business_id' => $login['business_id'], 'wx_id' => $post['wx_id'], 'app_id' => $post['app_id'], 'app_secret' => $post['app_secret'], 'wx_token' => $post['wx_token'], 'wx_aeskey' => $post['wx_aeskey'], 'visitor_tpl' => $post['visitor_tpl'], 'customer_tpl' => $post['customer_tpl'], 'msg_tpl' => $post['msg_tpl'], 'desc' => '无', 'addtime' => time()];
            if ($template) {
                model('wechat_platform')->save($template_data, ['business_id' => $login['business_id']]);
            } else {
                model('wechat_platform')->save($template_data);
            }
            $this->success("保存成功");
        }
        $business = Db::table('wolive_business')->where(['id' => $login['business_id']])->find();
        $buttonSwitch = ButtonSwitch::get(['business_id' => $login['business_id']]);
        $this->assign('business', $business);
        $this->assign('template', $template);
        $this->assign('buttonSwitch', $buttonSwitch);
        $this->assign('login', $login);
        return $this->fetch();
    }

    private function button_state($login)
    {
        // var_dump($login);die;
        $business = Db::table('wolive_button_switch')->where(['business_id' => $login['business_id']])->find();
        $qqImg = $this->request->file('qqImg');
        $wxImg = $this->request->file('wxImg');
        $data = $this->request->only(
            [
                'phone_state', 'voice_state', 'photo_state','phone_text',
                'file_state', 'translators_state', 'link_state', 'link_url',
                'top_text_state','top_text','bottom_text_state','bottom_text',
                'location_state','qq_state','wx_state','labour_state',
                'leave_message_state','message_log_state','tel_state',
                'kefu_select_state','link_text','mp4_state','tel_text'
            ]
        );

        $path = ROOT_PATH . 'public/assets/images/icon/';
        try{
             if (!empty($qqImg)) {
            Storage::$variable = 'qqImg';
            $data['qq_url'] = Storage::put()['url'];
            Storage::$handler = null;
            Storage::$instance = [];
        }
        if (!empty($wxImg)) {
            Storage::$variable = 'wxImg';
            $data['wx_url'] = Storage::put()['url'];
        }
        }catch(\Exception $e){
             $this->error($e->getMessage());
        }
       
        if($business){
            ButtonSwitch::update($data, ['business_id' => $login['business_id']]);
        }else{
            $data['business_id'] = $login['business_id'];
            ButtonSwitch::create($data);
        }

    }

    public function sentence()
    {
        if ($this->request->isAjax()) return Sentence::getList();
        return $this->fetch();
    }

    /**
     * description:
     * date: 2021/9/29 12:20
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function sentence_add()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['service_id'] = $this->request->post('service_id',$_SESSION['Msg']['service_id']);
            $post['content'] = $this->request->post('content', '', '\app\Common::clearXSS');
            $post['business_id'] = $_SESSION['Msg']['business_id'];
            $res = Sentence::insert($post);
            if ($res) $this->success('添加成功');
            $this->error('添加失败！');
        }
        $allService = Db::table('wolive_service')->where('business_id', $_SESSION['Msg']['business_id'])->select();
        $this->assign('allService', $allService);

        return $this->fetch();
    }

    /**
     * description:
     * date: 2021/9/29 12:12
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function sentence_edit()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['content'] = $this->request->post('content', '', '\app\Common::clearXSS');
            $res = Sentence::where("sid", $post['id'])->field(true)->update($post);
            if ($res) $this->success('修改成功');
            $this->error('修改失败！');
        }
        $id = $this->request->get('id');
        $robot = Sentence::get(['sid' => $id]);
        $allService = Db::table('wolive_service')->where('business_id', $_SESSION['Msg']['business_id'])->select();
        $this->assign('allService', $allService);
        $this->assign('sentence', $robot);
        $this->assign('service', $_SESSION['Msg']);
        return $this->fetch();
    }

    public function sentence_remove()
    {
        $id = $this->request->get('id');
        if (Sentence::destroy(['sid' => $id])) $this->success('操作成功！');
        $this->error('操作失败！');
    }

    public function access()
    {
        $http_type = ((isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
        $web = $http_type . $_SERVER['HTTP_HOST'];
        $action = $web . request()->root();
        $login = $_SESSION['Msg'];
        $class = Db::table('wolive_group')->where('business_id', $login['business_id'])->select();
        $business = Db::table('wolive_business')->where('id', $login['business_id'])->find();
        $this->assign('class', $class);
        $this->assign('business', $login['business_id']);
        $this->assign('web', $web);
        $this->assign('login', $login);
        $this->assign('business', $business);
        $this->assign('action', $action);
        $this->assign("title", "接入方法");
        $this->assign("part", "接入方法");
        return $this->fetch();
    }

    public function button()
    {
        $login = $_SESSION['Msg'];
        if ($this->request->isAjax()) {
            $post = $this->request->post($login);
            $this->button_state($login);
            $this->success('保存成功');
        }
        $business = Db::table('wolive_business')->where(['id' => $login['business_id']])->find();
        $buttonSwitch = ButtonSwitch::get(['business_id' => $login['business_id']]);
        $this->assign('business', $business);
        $this->assign('buttonSwitch', $buttonSwitch);
        $this->assign('login', $login);
        return $this->fetch();
    }
    public function course()
    {
        $this->assign("service", Service::getService());
        $this->assign("domain", $this->request->domain());
        $this->assign("business_id", $_SESSION['Msg']['business_id']);
        return $this->fetch();
    }
}