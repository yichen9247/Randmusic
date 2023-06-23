## 随机网易云

> 一款基于网易云音乐嵌入型随机音乐播放器

- QQ交流群：786664852
- 项目文档：https://yunair.site
- 官方演示：https://music.yunair.cn
- Gitub仓库：https://github.com/yichen9247/Randmusic
- 项目宗旨：简洁、超强、开源、精华、随机

#### 项目简介：

1. 整包仅4.0Mb，却实现超强功能，极其迅速的响应。
2. 极其漂亮的Live2D看板娘，提升您的线上听歌体验。
3. 项目开箱即用，没有任何复杂的操作，无需像其他项目去特意创建个文件等。
4. 项目依赖MDUI、LayUI、Bootstrap等响应式布局包，优雅美观。
5. 项目在一切可能暴露的接口上，屏蔽SQL注入、XSS攻击风险，提供安全保障。

#### 项目截图

<img src="https://s1.ax1x.com/2022/09/12/vXBakt.jpg">

<img src="https://s1.ax1x.com/2022/09/01/v5Dt0g.jpg">

#### 怎么对接

[点击查看项目文档](https://yunair.cn/?p=44)

#### 项目要求

* PHP 版本 &ge; 7.2

#### 使用说明

* 配置简单，开箱即用
* 首先在 `Core/Database/connect.php` 配置一下数据库信息
* 然后在 `Core/Config/config.php` 配置一下信息即可使用
* 随机网易云分支（歌单系统）路径：`/index2.php`
* 发信接口默认开启保护模式，如需关闭请注释掉 `/sendmail.php` 的第`15` 行代码
* 收集网易云音乐ID到 `Musicidlist/music_res` 和 `Musicidlist/gedan_res` 内
* 如果您已经配置完成并且收集完成，那就开始使用吧！

#### 注意事项

* 宝塔用户请注意缓存规则的正确配置，否则将导致每次刷新都是同一首歌的问题

#### 项目开发

1. 开发时请使用 `VSCode编辑器` ，编辑器插件：`scss-to-css`（根据官方文档进行下载依赖库） 和 `minify`
2. CSS代码由scss编译成.min.css文件
3. JS代码由minify压缩成.min.js文件

## 建议覆盖文件

├── Assets 项目静态资源目录

│      ├── css 网站CSS静态文件目录

│      └── js 网站JAVASCRIPT静态文件目录

├── Core 网站核心文件目录

│      ├── Config 网站信息配置目录

│      ├── Database 数据库信息配置目录

│      └── init.php 网站初始化索引文件

├── Include 网站包含文件目录

│      ├── Firewall 网站安全（防火墙）目录

│      ├── Onlinecatch 在线人数记录文件

│      ├── PHPMailer 邮件发送系统目录

│      ├── Comment.php 网站公共函数文件

│      ├── Functions.php 网站公共函数文件

│      ├── Index.php 网站首页展示文件

│      └── Index2.php 歌单页面展示文件

├── Template 网站模板文件目录

│      ├── Home 主页模板目录

│      ├── Admin 后台模板目录

│      └── Install 安装模板目录

├── index.php 网站首页文件

├── index2.php 歌单页面文件

├── sendmail.php 邮件发送文件

├── 404.html 网站404默认页面

├── config.php 网站全局配置文件

└── robots.txt 爬虫、蜘蛛等索引文件

## 项目目录介绍

├── Assets 项目静态资源目录

│      ├── css 网站CSS静态文件目录

│      ├── js 网站JAVASCRIPT静态文件目录

│      ├── bootstrap Bootstrap框架目录

│      ├── mdui-v1.0.2 MDUI框架目录

│      ├── layui-v2.7.6 LayUI框架目录

│      ├── JavaScript 网站特效文件目录

│      ├── screenshot1.png 项目截图一

│      └── screenshot2.png 项目截图二

├── Core 网站核心文件目录

│      ├── Config 网站信息配置目录

│      ├── Database 数据库信息配置目录

│      └── init.php 网站初始化索引文件

├── Include 网站包含文件目录

│      ├── Firewall 网站安全（防火墙）目录

│      ├── Onlinecatch 在线人数记录文件

│      ├── PHPMailer 邮件发送系统目录

│      ├── Comment.php 网站公共函数文件

│      ├── Functions.php 网站公共函数文件

│      ├── Index.php 网站首页展示文件

│      └── Index2.php 歌单页面展示文件

├── Template 网站模板文件目录

│      ├── Home 主页模板目录

│      ├── Admin 后台模板目录

│      └── Install 安装模板目录

├── Musicidlist 网易云音乐ID存储目录

│      ├── gedan_res 网易云歌单ID存储目录

│      └── music_res 网易云音乐ID存储目录

├── index.php 网站首页文件

├── index2.php 歌单页面文件

├── sendmail.php 邮件发送文件

├── 404.html 网站404默认页面

├── config.php 网站全局配置文件

└── robots.txt 爬虫、蜘蛛等索引文件

## 项目更新日志

#### V2.0版本更新日志

2023-06-23： 修复了特效加载问题。

2023-06-22： 部分细节进行了优化。

2023-06-22： 新增了个懒加载模式。

2023-05-07： 部分细节进行了优化。

2023-05-19： 新增了安全验证页面。

2023-05-07： 修复了代码报错问题。

2023-05-07： 部分细节进行了优化。

2023-05-01： 优化了接口的安全性。

2023-05-01： 美化了邮件通知模板。

2023-04-22： 修复重载失败的问题。

2023-04-22： 部分细节进行了优化。

2023-04-21： 新增反馈安全验证码。

2023-04-21： 新增了接口保护开关。

2023-04-15： 修复歌单反馈的问题。

2023-04-14： 随机网易云再次重构。

2023-04-14： 新增了接口保护机制。

2023-04-08： 新增网站安全设置项。

2023-04-07： 随机网易云整体重构。

2023-04-07： 新增MDUI框架新样式。

#### V1.0版本更新日志

2023-04-05： 移除按钮下调试模式。

2023-04-05： 替换了反馈按钮入口。

2023-04-02： 替换了全局看板娘源。

2023-04-02： 新增了邮件反馈系统。

2023-03-10： 优化了性能资源调度。

2023-01-26： 新增了全局黑白模式。

2023-01-26： 修复自播失效的问题。

2023-01-25： 修复偶现载失败问题。

2022-01-25： 新增按钮内旋转图标。

2022-10-01： 新增按钮内旋转图标。

2022-10-01： 引入了一个第三方库。

2022-10-01： 引入了第三方图标库。

2022-09-26： 优化了整体代码结构。

2022-09-26： 新增了网站在线人数。

2022-09-23： 修改全局CDN引入源。

2022-09-19： 修改了全局对接方式。

2022-09-19： 新增网站看板娘功能。

2022-09-15： 新增了五彩点击特效。

2022-09-12： 新增了网易歌单系统。

2022-09-04： 新增RGB下深色模式。

2022-08-29： 新增DEBUG调试模式。

2022-08-06： 随机网易云正式上线。

##  项目开源许可
[GPL 3.0](https://opensource.org/licenses/GPL-3.0)

Copyright (C) 2019 - 2023  [随机网易云](https://music.yunair.cn/).