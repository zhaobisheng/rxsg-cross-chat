# rxsg-cross-chat
热血三国跨服聊天接入，本系统完全公益和免费，请不要用于商业用途，否则后果自负。
本系统不为任何私服主以及个体玩家服务，但有好的建议可以反馈给我！我会尽量满足大家的想法。
本文档会不定期更新内容，有新的功能都会在该页面上说明，如果大家的聊天出现问题，请来此处重新接入。我会尽量保持旧版本的兼容性！

# 服务器地址
- 聊天地址：chat.chinaluopiao.xyz 
- 聊天端口：5308


优点

1.  集成方便，只需要改动2个php文件即可
2.  安全稳定，不需要连接您的数据库，数据都通过接口传输，集成代码开源
3.  不限制接入的玩家，不管您是个人爱好者还是私服主均可接入
4.  各个玩家或者私服不在需要额外搭建聊天系统，统一接入跨服聊天，一起玩，一起聊，节约成本，增加游戏趣味性


# 技术交流
- 群：769606391


# 接入方式1
简单接入，无需增加任何的php文件，只需要把`server/config/chathost.php`的聊天地址改成`chat.chinaluopiao.xyz`即可，但是改方式接入仅能在世界频道喊话，不能私聊和联盟聊天。


# 接入方式2
该方式接入可以在世界频道和联盟频道以及战场频道畅聊，完全无限制，还可以发系统消息。接入方式如下，欢迎大家一起修改完善，接受PR

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

第一步

![修改Login.php第一步，导入文件](https://github.com/chinaluopiao/rxsg-cross-chat/blob/master/images/20190830135853.png)  

第二步

![修改Login.php第二步，同步会话](https://github.com/chinaluopiao/rxsg-cross-chat/blob/master/images/20190830140020.png)  




# 接入完成测试

完成以上步骤就完成了跨服聊天的接入，现在可以登录账号体验跨服聊天了，一起对骂！！！


# 接入系统消息

有些玩家希望接收到自己服务器的系统消息，例如：都城洛阳被风随成功占领
这样就需要把本服的消息推送到聊天服务器，由聊天服务器发送到各玩家，聊天服务器的api接口如下

### 聊天api地址：`http://chat.chinaluopiao.xyz:5309/`

- 通用参数

|参数名|参数类型|默认值|参数说明|
|:----:|:----:|:----:|:----:|
|参数名|参数类型|默认值|参数说明|


- 同步会话信息 `session/syncSession`

|参数名|参数类型|默认值|参数说明|
|:----:|:----:|:----:|:----:|
|参数名|参数类型|默认值|参数说明|
|参数名|参数类型|默认值|参数说明|
|参数名|参数类型|默认值|参数说明|
|参数名|参数类型|默认值|参数说明|


- 同步系统消息 `message/syncInform`

|参数名|参数类型|默认值|参数说明|
|:----:|:----:|:----:|:----:|
|参数名|参数类型|默认值|参数说明|
|参数名|参数类型|默认值|参数说明|
|参数名|参数类型|默认值|参数说明|
|参数名|参数类型|默认值|参数说明|



# 版本规划和后续计划
后续我会继续完善跨服聊天，保障聊天服务安全稳定运行，绝不收取任何费用，并提供更加方便好用的功能，供大家娱乐。有问题请提交[issues](https://github.com/chinaluopiao/rxsg-cross-chat/issues)



