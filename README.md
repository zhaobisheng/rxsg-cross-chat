# rxsg-cross-chat
热血三国跨服聊天和QQ机器人接入，本系统完全公益和免费，请不要用于商业用途，否则后果自负。
本系统不为任何私服主以及个体玩家服务，但有好的建议可以反馈给我！我会尽量满足大家的想法。
本文档会不定期更新内容，有新的功能都会在该页面上说明，如果大家的聊天出现问题，请来此处重新接入。
我会尽量保持旧版本的兼容性！

# 服务器地址
- 聊天地址：chat.funwan.cn
- 聊天端口：5308


优点

1.  集成方便，只需要改动2个php文件即可
2.  安全稳定，不需要连接您的数据库，数据都通过接口传输，集成代码开源
3.  不限制接入的玩家，不管您是个人爱好者还是私服主均可接入
4.  各个玩家或者私服不在需要额外搭建聊天系统，统一接入跨服聊天，一起玩，一起聊，节约成本，增加游戏趣味性
5.  支持世界、联盟、私聊和战场所有聊天频道，支持系统、战场、联盟事件提醒


# 技术交流
- 交流群：769606391
- 聊天同步消息群:729140896



# 接入方式
该方式接入可以在世界频道和联盟频道以及战场频道畅聊，完全无限制，还可以发系统消息。接入方式如下，欢迎大家一起修改完善，接受PR

1.  下载源码zip包后解压
2.  配置聊天系统参数，修改`server/config/chathost.php`配置聊天系统参数
3.  把ChatFunc.php放在`server/game`目录下
4.  修改`server/game/CityCommand.php`接入实时会话和系统消息同步
5.  修改`server/game/Login.php`完成登录会话同步


# 详细步骤和示意图

- 1.  下载zip包

![下载zip包](https://raw.githubusercontent.com/zhaobisheng/rxsg-cross-chat/master/images/20190830142302.png)


- 2.  配置聊天系统参数，可以参考zip包中的`chathost.php`文件，如无参数请先加qq机器人：1050179288 发送命令申请(2021年4月1日前开放管理员权限)


    ### 和QQ机器人聊天发送`添加:你的服务器名称`,如下图

    ![申请参数](https://raw.githubusercontent.com/zhaobisheng/rxsg-cross-chat/master/images/shenqing.jpg)
        
    #### 如果想不接入参数，直接修改`chathost.php`文件的聊天连接地址即可进入公共聊天区    
        
        ``` 
            define('chat_host', 'chat.funwan.cn');
            define('chat_sync_api', 'http://chat.funwan.cn:15050');
            //第几区，如果第一区就填写1 第二区就写2
            define('chat_server_index', '1');
            define('chat_sync_appid', '聊天appid，向机器人申请');
            define('chat_sync_secretKey', '密码，向机器人面申请');
        ```


- 3.  修改`server/game/CityCommand.php`接入实时会话和系统消息同步,参考示意图

![修改CityCommand.php](https://raw.githubusercontent.com/zhaobisheng/rxsg-cross-chat/master/images/20190830135707.png)


- 4.  修改`server/game/Login.php`完成登录会话同步,请注意要修改两个地方

       #### 在上方syncSession($uid,$sid);上方添加 CompleteMaQue($uid); 登录游戏即可完成麻雀成就
       
第一步


![修改Login.php第一步，导入文件](https://raw.githubusercontent.com/zhaobisheng/rxsg-cross-chat/master/images/20190830135853.png)  

第二步

![修改Login.php第二步，同步会话](https://raw.githubusercontent.com/zhaobisheng/rxsg-cross-chat/master/images/20190830140020.png)  




# 接入完成测试

完成以上步骤就完成了跨服聊天的接入，现在可以登录账号体验跨服聊天了，一起对骂！！！

聊天测试

![同步跨服聊天](https://raw.githubusercontent.com/zhaobisheng/rxsg-cross-chat/master/images/sync2QQ.jpg)  

![同步跨服聊天](https://raw.githubusercontent.com/zhaobisheng/rxsg-cross-chat/master/images/qq2game.jpg)  

# 版本规划和后续计划
后续我会继续完善跨服聊天，保障聊天服务安全稳定运行，并提供更加方便好用的功能，供大家娱乐。有问题请QQ群里交流。



