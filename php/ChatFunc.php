<?php
    require_once("./interface.php");
    require_once("./global.php");
    require_once("../../index_top.php");
    require_once("../config/chathost.php");

    function syncSession($uid,$sid){
        try{
            $user = sql_fetch_one("select * from sys_user where uid='$uid'");
            $userdinfo = sql_fetch_one("select * from sys_user_designation where uid='$uid' and ison=1 limit 1");
            $userDid = $userdinfo['did'];
            $designation = sql_fetch_one("select * from cfg_designation where did='$userDid'");
            $userbattleinfo = sql_fetch_one("select * from sys_user_battle_state where uid='$uid' limit 1");
            $post_data = array(
                'server' => constant("TITLE"),
                'uid' => $uid,
                'sid' => $sid,
                'name' => $user['name'],
                'unionId' => $user['union_id'],
                'battleId'=> $userbattleinfo['bid'],
                'designation' => $designation['name'],
            );
            return sendPost(chat_sync_api.'/session/sync', $post_data);
        }catch(Exception $e){
            return "";
        }
    }


    function syncAll($uid,$sid){
        syncSession($uid,$sid);
        syncInform();
    }

    function syncInform(){
        try{
            $sys_informs = sql_fetch_rows("SELECT *,'".constant("TITLE")."' AS `server`  FROM sys_inform WHERE starttime <= UNIX_TIMESTAMP() AND endtime >= UNIX_TIMESTAMP() AND scrollcount > 0");
            return sendPost(chat_sync_api.'/message/sync', $sys_informs);
            //sql_query("delete from sys_inform where endtime<UNIX_TIMESTAMP() ");//删掉时间过了的
        }catch(Exception $e){
            return "";
        }
    }


    function sendPost($url, $post_data) {
        $authorization = getAuthorization();
        $options = array(
            'http' => array(
                'method' => 'POST',
                //'header' => 'Content-type:application/json;charset=UTF-8'.' Authorization:'.$authorization.'',
                'header' => "Content-type:application/json;charset=UTF-8\r\n".
                    "Authorization: ".$authorization."\r\n",
                'content' => json_encode($post_data),
                'timeout' => 15 * 60 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }

    /**
     * 返回认证信息
     */
    function getAuthorization(){
        $appid = chat_sync_appid;
        $secretKey = chat_sync_secretKey;
        $timestamp = time()*1000;
        $nonce = md5(uniqid(microtime(true),true));
        $sign = md5("appid".$appid."nonce".$nonce."secretKey".$secretKey."timestamp".$timestamp);
        $arr = array("appid"=>$appid,"secretKey"=>$secretKey,"timestamp"=>$timestamp,"nonce"=>$nonce,"sign"=>$sign);
        return base64_encode(json_encode($arr));
    }
?>
