<?php


namespace app\service\controller;

use app\service\model\Robot;
use think\Db;

/**
 *
 * 后台页面控制器.
 */
class Robots extends Base
{

    public function index()
    {
        if ($this->request->isAjax()) return Robot::getList();
        return $this->fetch();
    }

    /**
     * @return mixed
     * @throws \think\exception\DbException
     */
    // public function edit()
    // {
    //     if ($this->request->isAjax()) {
    //         $post = $this->request->post();
    //         $post['reply']=$this->request->post('reply','','\app\Common::clearXSS');
    //         if (mb_strlen($post['keyword'],'UTF8') > 8) $this->error('关键词不能大于8个字！');
    //         $sort = $this->request->post('sort/d',0);
    //         if (!is_int($sort)) $this->error('排序字段必须是整数！');
    //         $status = $this->request->post('status/d',0);
    //         if (!is_int($status)) $this->error('匹配方式字段非法！');
    //         $res = Robot::where("id", $post['id'])->field(true)->update($post);
    //         if ($res) $this->success('修改成功');
    //         $this->error('修改失败！');
    //     }
    //     $id = $this->request->get('id');
    //     $robot = Robot::get(['id'=>$id]);
    //     $this->assign('robot', $robot);
    //     return $this->fetch();
    // }

    
    /**
     * ==========================================================
     *  vccccc.cc
     *  代码修改者：小宇
     *  修改时间：2025-03-03
     *  修改内容：优化关键词处理逻辑
     *  版权所有：© 2025 小宇网络 保留所有权利
     *  免责声明：本代码仅用于学习和商业用途，禁止未经授权的传播
     * ==========================================================
     */
    
    public function edit()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['reply'] = $this->request->post('reply', '', '\app\Common::clearXSS');
    
            // 替换中文逗号为英文逗号
            $post['keyword'] = str_replace('，', ',', $post['keyword']);
    
            // 处理多个关键词，按英文逗号分割，并去除空格
            $keywords = explode(',', $post['keyword']);
            $keywords = array_map('trim', $keywords); // 去除空格
            $keywords = array_filter($keywords); // 过滤空字符串
    
            // 检查关键词数量不能超过 10 组
            if (count($keywords) > 10) {
                $this->error('最多只能添加 10 组关键词！');
            }
    
            // 检查每个关键词长度不能超过 4 个字
            foreach ($keywords as $word) {
                if (mb_strlen($word, 'UTF8') > 4) {
                    $this->error("关键词 [{$word}] 不能超过 4 个字！");
                }
            }
    
            // 重新组合关键词存入数据库
            $post['keyword'] = implode(',', $keywords);
            // 本代码已由 小宇 二次开发，未经许可禁止商用！
            // 校验排序字段
            $sort = $this->request->post('sort/d', 0);
            if (!is_int($sort)) $this->error('排序字段必须是整数！');
    
            // 校验匹配方式字段
            $status = $this->request->post('status/d', 0);
            if (!is_int($status)) $this->error('匹配方式字段非法！');
    
            // 更新数据库
            $res = Robot::where("id", $post['id'])->update($post);
            if ($res) $this->success('修改成功');
            $this->error('修改失败！');
        }
    
        // 获取需要编辑的机器人信息
        $id = $this->request->get('id');
        $robot = Robot::get(['id' => $id]);
        $this->assign('robot', $robot);
        return $this->fetch();
    }

    // public function add()
    // {
    //     if ($this->request->isAjax()) {
    //         $post=$this->request->post();
    //         $post['business_id']=$_SESSION['Msg']['business_id'];
    //         $post['reply']=$this->request->post('reply','','\app\Common::clearXSS');
    //         if (mb_strlen($post['keyword'],'UTF8') > 8) $this->error('关键词不能大于8个字！');
    //         $sort = $this->request->post('sort/d',0);
    //         if (!is_int($sort)) $this->error('排序字段必须是整数！');
    //         $status = $this->request->post('status/d',0);
    //         if (!is_int($status)) $this->error('匹配方式字段非法！');
    //         $res =Robot::insert($post);
    //         if ($res) $this->success('添加成功');
    //         $this->error('添加失败！');
    //     }
    //     return $this->fetch();
    // }
    
    
    
    
    public function add()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['business_id'] = $_SESSION['Msg']['business_id'];
            $post['reply'] = $this->request->post('reply', '', '\app\Common::clearXSS');
    
            // 替换中文逗号为英文逗号
            $post['keyword'] = str_replace('，', ',', $post['keyword']);
    
            // 处理多个关键词，按英文逗号分割，并去除空格
            $keywords = explode(',', $post['keyword']);
            $keywords = array_map('trim', $keywords); // 去除空格
            $keywords = array_filter($keywords); // 过滤空字符串
    
            // 检查关键词数量不能超过 10 组
            if (count($keywords) > 10) {
                $this->error('最多只能添加 10 组关键词！');
            }
    
            // 检查每个关键词长度不能超过 4 个字
            foreach ($keywords as $word) {
                if (mb_strlen($word, 'UTF8') > 4) {
                    $this->error("关键词 [{$word}] 不能超过 4 个字！");
                }
            }
    
            // 将多个关键词存入数据库（格式：逗号分隔的字符串）
            $post['keyword'] = implode(',', $keywords);
    
            // 校验排序字段
            $sort = $this->request->post('sort/d', 0);
            if (!is_int($sort)) $this->error('排序字段必须是整数！');
    
            // 校验匹配方式字段
            $status = $this->request->post('status/d', 0);
            if (!is_int($status)) $this->error('匹配方式字段非法！');
    
            // 插入数据库
            $res = Robot::insert($post);
            if ($res) $this->success('添加成功');
            $this->error('添加失败！');
        }
        return $this->fetch();
    }
    
    
    
    /**
     * 显示 AI 配置页面
     *
     * 该方法加载 robots 目录下的 ai_config.html 视图文件，
     * 供管理员在后台进行 AI 相关配置。
     *
     * @return \think\response\View
     */
    public function aiConfig()
    {
        return $this->fetch('robots/ai_config');
    }
    // =============================================

    public function remove()
    {
        $id = $this->request->get('id');
        if (Robot::destroy(['id' => $id])) $this->success('操作成功！');
        $this->error('操作失败！');
    }
}