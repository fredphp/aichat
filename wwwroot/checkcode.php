<?php
/**
 * checkcode.php - Dedicated captcha endpoint
 * This file bypasses the api.php router to avoid rate limiting issues
 * on the login page captcha
 */
define('MYFILE_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
include MYFILE_PATH . '/source/base.php';
$checkcode = base::load_sys_class('checkcode');
$checkcode->code_len = isset($_GET['code_len']) && $_GET['code_len'] ? intval($_GET['code_len']) : 4;
$checkcode->font_size = isset($_GET['font_size']) && $_GET['font_size'] ? intval($_GET['font_size']) : 14;
$checkcode->width = isset($_GET['width']) && $_GET['width'] ? intval($_GET['width']) : 84;
$checkcode->height = isset($_GET['height']) && $_GET['height'] ? intval($_GET['height']) : 24;
$checkcode->font_color = isset($_GET['font_color']) && $_GET['font_color'] ? trim(urldecode($_GET['font_color'])) : '#000000';
$checkcode->background = isset($_GET['background']) && $_GET['background'] ? trim(urldecode($_GET['background'])) : '#F7F7F7';
$checkcode->charset = isset($_GET['charset']) && $_GET['charset'] ? trim($_GET['charset']) : 'abcdefghkmnprstuvwyzABCDEFGHKLMNPRSTUVWYZ23456789';
$checkcode->doimage();
set_cookie('code', $checkcode->get_code(), 60 * 5);
?>
