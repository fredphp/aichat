<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2020/3/4
 * Time: 16:48
 */

use think\Route;

Route::get('api/group/:business_id', 'api/Group/getGroup');

// AI 配置相关接口
// 获取 AI 配置
Route::get('admin/ai_config/getAIConfig', 'admin/AIConfig/getAIConfig'); 
// 更新 AI 配置
Route::post('admin/ai_config/updateAIConfig', 'admin/AIConfig/updateAIConfig'); 
