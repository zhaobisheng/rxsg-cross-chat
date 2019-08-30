# rxsg-cross-chat
热血三国跨服聊天接入
优点
1.  集成方便，只需要改动2个php文件即可
2.  安全稳定，不需要连接您的数据库，数据都通过接口传输，集成代码开源
3.  不限制接入的玩家，不管您是个人爱好者还是私服主均可接入
4.  各个玩家或者私服不在需要额外搭建聊天系统，统一接入跨服聊天，一起玩，一起聊，节约成本，增加游戏趣味性


# 技术交流
- 群：769606391


# 接入方式
1.  下载源码zip包后解压
2.  配置聊天系统参数，修改`server/config/chathost.php`配置聊天系统参数
3.  把ChatFunc.php放在`server/game`目录下
4.  修改`server/game/CityCommand.php`接入实时会话和系统消息同步
5.  修改`server/game/Login.php`完成登录会话同步


# 详细步骤和示意图

- 1.  下载zip包

![下载zip包](https://github.com/chinaluopiao/rxsg-cross-chat/blob/master/images/20190830142302.png)


- 2.  配置聊天系统参数，可以参考zip包中的`chathost.php`文件，如无参数请先加qq群：769606391 咨询并申请


        ``` 
        <?php 
            define('chat_host', '聊天ip地址');
            define('chat_sync_api', '聊天系统地址');
            define('chat_sync_appid', '聊天appid');
            define('chat_sync_secretKey', '密码');
        ?>
        ```


- 3.  修改`server/game/CityCommand.php`接入实时会话和系统消息同步,参考示意图

![修改CityCommand.php](https://github.com/chinaluopiao/rxsg-cross-chat/blob/master/images/20190830135707.png)


- 4.  修改`server/game/Login.php`完成登录会话同步,请注意要修改两个地方

-- 第一步

![修改Login.php第一步，导入文件](https://github.com/chinaluopiao/rxsg-cross-chat/blob/master/images/20190830135853.png)  

-- 第二步

![修改Login.php第二步，同步会话](https://github.com/chinaluopiao/rxsg-cross-chat/blob/master/images/20190830140020.png)  



# 接入完成测试

完成以上步骤就完成了跨服聊天的接入，现在可以登录账号体验跨服聊天了，一起对骂！！！



