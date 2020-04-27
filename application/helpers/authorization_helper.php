<?php
require APPPATH . 'helpers/jwt_helper.php';

class AUTHORIZATION
{
    public static function validateTimestamp($token)
    {
        $CI = &get_instance();
        $token = self::validateToken($token);
        if ($token != false && ($token->exp  > now())) {
            return $token;
        }
        return false;
    }

    public static function validateToken($token)
    {
        $CI = &get_instance();
        $user = JWT::decode($token, $CI->config->item('jwt_key'));
        $active = $CI->db->query('SELECT status FROM users WHERE id  =  ' . $user->user_id . ' AND status =  1 ')->row();
        if (!$active) {
            header("HTTP/1.1 401 Unauthorized");
            exit;
        }

        return $user;
    }

    public static function checkToken($token)
    {
        $user = new stdClass();
        if ($token) {
            $CI = &get_instance();
            $user = JWT::decode($token, $CI->config->item('jwt_key'));
        }
        return $user;
    }



    public static function generateToken($data)
    {
        $CI = &get_instance();
        $data['exp'] =  strtotime('+1 hour');
        return JWT::encode($data, $CI->config->item('jwt_key'));
    }
}
