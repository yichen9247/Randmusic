## 随机网易云

> 一款基于网易云音乐嵌入型随机音乐播放器

- QQ交流群：786664852
- 官方演示：https://music.yunair.cn
- Gitub仓库：https://github.com/yichen9247/Randmusic
- 项目宗旨：简洁、超强、开源、精华、随机

## 项目简介：

1. 整包仅3.3Mb，却实现超强功能，极其迅速的响应。
2. 极其漂亮的Live2D看板娘，提升您的线上听歌体验。
3. 项目开箱即用，没有任何复杂的操作，无需像其他项目去特意创建个文件等。
4. 项目依赖MDUI、LayUi、Bootstrap等响应式布局包，优雅美观。
5. 项目在一切可能暴露的接口上，屏蔽SQL注入、XSS攻击风险，提供安全保障。

## 项目截图

<img src="https://s1.ax1x.com/2022/09/12/vXBakt.jpg">

<img src="https://s1.ax1x.com/2022/09/01/v5Dt0g.jpg">

## 怎么对接

[点击查看项目文档](https://yunair.cn/?p=44)

## 项目要求

* 网站PHP版本必须 &ge; 7.0
* 网站不能开启缓存，否则将影响功能

## 使用说明

* 配置简单，开箱即用
* 在 `config.php` 配置一下信息即可使用
* 随机网易云分支（歌单系统）路径：`/Musicsheet/`
* 收集网易云音乐ID到 `music_res` 和 `gedan_res` 内
* 如果您已经配置完成并且收集完成，那就开始使用吧！

## 项目开发

1. 开发时请使用 `VSCode编辑器` ，编辑器插件：`scss-to-css`（根据官方文档进行下载依赖库） 和 `minify`
2. CSS代码由scss编译成.min.css文件
3. JS代码由minify压缩成.min.js文件

## 项目目录介绍（非实时）

├── assets 项目静态资源目录

│      ├── bootstrap Bootstrap框架目录

│      ├── mdui-v1.0.2 MDUI框架目录

│      ├── layui-v2.7.6 LayUI框架目录

│      ├── JavaScript 网站特效文件目录

│      ├── screenshot1.png 项目截图一

│      ├── screenshot2.png 项目截图二

├── Musicsheet 基于首页分支的歌单系统目录

│      ├── gedan_res 网易云歌单ID存储目录

│      ├── online.txt 网站Cookies存储文件

│      └── index.php 歌单系统页面

├── music_res 网易云音乐ID存储目录

├── index.php 随机网易云首页页面

├── functions.php 网站函数配置文件

├── config.php 网站全局配置文件

├── online.txt 网站Cookies存储文件

└── robots.txt 爬虫、蜘蛛等索引文件

## 更新日志

2022-09-27： 新增了显示加载耗时。

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

##  开源许可
[GPL 3.0](https://opensource.org/licenses/GPL-3.0)

Copyright (C) 2022  [随机网易云](https:/lmusic.yunair.cn/).