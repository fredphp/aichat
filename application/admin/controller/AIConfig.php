<?php

namespace app\admin\controller;

use think\Db;
use think\Request;

class AIConfig
{
    
    public function getAIConfig()
    {

        $business_id = $_SESSION['Msg']['business_id'] ?? null;
    
        if (!$business_id) {
            return json([
                'code' => 401,
                'msg' => '未登录',
                'session_data' => $_SESSION
            ]);
        }
    
        $config = Db::table('wolive_business')
            ->where('id', $business_id)
            ->field('api_model, api_url, api_key, api_system_prompt, ai_switch')
            ->find();
    
        return json(['code' => 200, 'data' => $config]);
    }



    public function updateAIConfig(Request $request)
    {

        $business_id = $_SESSION['Msg']['business_id'] ?? null;

        if (!$business_id) {
            return json(['code' => 401, 'msg' => '未登录']);
        }
    
        $data = $request->post();

        $update = Db::table('wolive_business')
            ->where('id', $business_id)
            ->update([
                'api_model' => $data['api_model'],
                'api_url' => $data['api_url'],
                'api_key' => $data['api_key'],
                'api_system_prompt' => $data['api_system_prompt'],
                'ai_switch' => $data['ai_switch']
            ]);
    
        if ($update !== false) {
            return json(['code' => 200, 'msg' => 'AI 配置更新成功']);
        } else {
            return json(['code' => 500, 'msg' => '更新失败']);
        }
    }
}