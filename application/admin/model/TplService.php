<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2020/2/18
 * Time: 16:20
 */
namespace app\admin\model;
use app\platform\model\Business;
use think\Model;

class TplService extends Model
{
    protected $field = true;

    protected $table = 'wolive_wechat_platform';

    /**
     * 发送模板消息
     */
    public static function send($business_id,$openid,$url,$tpl,$data)
    {

         $wechatService = WechatService::get($business_id);
        $notice = $wechatService->notice;
        $business = Business::get($business_id);
        //  $business['template_state'] == 'open' &&
          $business['template_state'] == 'open' && $notice->to($openid)->uses($tpl)->andUrl($url)->data($data)->send();

        return true;
    }
}