<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2020/4/10
 * Time: 11:21
 */

namespace app\service\model;

use think\Model;

class Robot extends Model
{
    protected $table = 'wolive_robot';

    // public static function getList()
    // {
    //     $langs = config('lang');
    //     $where = [];
    //     $limit = input('get.limit');
    //     if ($keyword = input('get.keyword')) $where['keyword'] = $keyword;
    //     if ($lang = input('get.lang')) $where['lang'] = $lang;
    //     $where['business_id'] = $_SESSION['Msg']['business_id'];
    //     $list = self::order('sort', 'asc')->where($where)->paginate($limit)->each(function($item)use($langs){
    //         $item['lang'] = $langs[$item['lang']];
    //         return $item;
    //     });
    //     return ['code' => 0, 'data' => $list->items(), 'count' => $list->total(), 'limit' => $limit];
    // }
    
    
    /**
     * ==========================================================
     *  代码修改者：小宇
     *  修改时间：2025-03-03
     *  修改内容：优化关键词查询逻辑，支持模糊匹配
     *  版权所有：© 2025 小宇网络 保留所有权利
     *  免责声明：本代码仅用于学习和商业用途，禁止未经授权的传播
     * ==========================================================
     */
    
    public static function getList()
    {
        try {
            $langs = config('lang');
            $limit = input('get.limit', 10); // 默认每页 10 条
            $query = self::order('sort', 'asc');
    
            // 关键词模糊查询
            if ($keyword = input('get.keyword')) {
                $query = $query->where('keyword', 'like', "%$keyword%");
            }
    
            // 语言筛选
            if ($lang = input('get.lang')) {
                $query = $query->where('lang', $lang);
            }
    
            // 确保 business_id 存在
            if (empty($_SESSION['Msg']['business_id'])) {
                return ['code' => 500, 'msg' => 'business_id 为空'];
            }
    
            $query = $query->where('business_id', $_SESSION['Msg']['business_id']);
    
            // 分页查询
            $list = $query->paginate($limit)->each(function ($item) use ($langs) {
                $item['lang'] = $langs[$item['lang']] ?? '未知';
                return $item;
            });
    
            return [
                'code' => 0,
                'data' => $list->items(),
                'count' => $list->total(),
                'limit' => $limit
            ];
        } catch (\Exception $e) {
            return ['code' => 500, 'msg' => $e->getMessage()];
        }
    }

// ===========================
}