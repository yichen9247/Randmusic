## 随机网易云

> 一款基于网易云音乐嵌入型随机音乐播放器

- QQ交流群：786664852
- Gitub仓库：https://github.com/yichen9247/Randmsuic
- 项目宗旨：简洁、超强、开源、精华、随机

#### 项目简介：

1.整包仅4.0Mb，却实现超强功能，极其迅速的响应。
2.项目开箱即用，没有任何复杂的操作，无需像其他项目去特意创建个文件等。
3.项目依赖MDUI、LayUi、Bootstrap等响应式布局包，优雅美观。
4.项目在一切可能暴露的接口上，屏蔽SQL注入、XSS攻击风险，提供安全保障。

#### 项目要求

* PHP 版本 &ge; 7.2

#### 使用说明

[点击查看项目使用说明](https://yunair.cn/?p=44)

#### 项目开发

1. 开发时请使用 `VSCode编辑器` ，编辑器插件：`scss-to-css`（根据官方文档进行下载依赖库） 和 `minify`
2. CSS代码由scss编译成.min.css文件
3. JS代码由minify压缩成.min.js文件

#### 项目目录介绍（非实时）

├── assets 项目静态资源目录

│      ├── bootstrap Bootstrap框架目录

│      ├── mdui-v1.0.2 MDUI框架目录

│      ├── layui-v2.7.6 LayUI框架目录

│      ├── JavaScript 网站特效文件目录

│      ├── screenshot1.png 项目截图一

│      ├── screenshot1.png 项目截图二

│      ├── Live2D-widget.main.js 看板娘源文件

├── Musicsheet 基于首页分支的歌单系统目录

│      ├── gedan_res 网易云歌单ID存储目录

│      └── index.php 歌单系统页面

├── music_res 网易云音乐ID存储目录

├── index.php 首页页面

├── config.php 网站全局配置文件

└── robots.txt 爬虫、蜘蛛等索引文件

##  开源许可
[GPL 3.0](https://opensource.org/licenses/GPL-3.0)

Copyright (C) 2022  [随机网易云](https:/lmusic.yunair.cn/).