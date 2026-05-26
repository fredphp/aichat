<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2020/4/10
 * Time: 11:21
 */

namespace app\service\model;

use think\Model;

class Sentence extends Model
{
    protected $table = 'wolive_sentence';

    public static function getList()
    {
        $langs = config('lang');
        $where = [];
        $limit = input('get.limit');
        if ($lang = input('get.lang')) $where['lang'] = $lang;
        $where['business_id'] = $_SESSION['Msg']['business_id'];
        $list = self::order('sid', 'desc')->with(['service'=>function($query){
             $query->field('nick_name,service_id');
        }])->where($where)->paginate($limit)->each(function ($item) use ($langs) {
            $item['lang'] = $langs[$item['lang']];
            $item['nick_name'] = $item['service']['nick_name'];
            return $item;
        });
        return ['code' => 0, 'data' => $list->items(), 'count' => $list->total(), 'limit' => $limit];
    }

    public function service()
    {
        return $this->hasOne('Service', 'service_id', 'service_id');
    }
}