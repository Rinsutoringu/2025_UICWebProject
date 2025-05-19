## Topics Coverage–(For Zh-CN)

### Systems and Web Development Workshop

Team 4

| Topic              | Features                                                     | Code filename – line numbers                                 | Slide numbers |
| ------------------ | ------------------------------------------------------------ | ------------------------------------------------------------ | ------------- |
| HTML – link        | 导航栏/页面跳转                                              | index.html 13-20, aboutus.html 5-10                          |               |
| HTML – table       | 展示团队成员信息                                             | aboutus.html 8-34                                            |               |
| HTML – option list | 选择家乡                                                     | hometown.html 15-21                                          |               |
| HTML – img         | 显示成员照片                                                 | aboutus.html 16-34                                           |               |
| HTML – form        | 登录表单                                                     | login.html 9-23                                              |               |
| HTML – form        | 注册表单                                                     | register.html 9-34                                           |               |
| CSS                | 页面整体美化                                                 | styles.css 1-136                                             |               |
| CSS                | 表格美化                                                     | styles.css 110-136                                           |               |
| CSS                | 按钮样式                                                     | styles.css 70-75                                             |               |
| JavaScript         | 动态加载页面                                                 | script.js 7-19, 132-146                                      |               |
| JavaScript         | 登录校验                                                     | script.js 90-104                                             |               |
| JavaScript         | 注册校验                                                     | script.js 68-89                                              |               |
| JavaScript         | 城市选择联动                                                 | script.js 40-67                                              |               |
| JavaScript         | 订阅功能                                                     | script.js 105-127                                            |               |
| JavaScript         | 退出登录                                                     | script.js 128-130                                            |               |
| PHP                | 登录处理                                                     | php/login.php 1-27                                           |               |
| PHP                | 注册处理                                                     | php/register.php 1-34                                        |               |
| PHP                | 订阅处理                                                     | php/subscribe.php 1-20                                       |               |
| PHP                | 检查登录状态                                                 | php/checklogin.php 1-15                                      |               |
| PHP                | 退出登录                                                     | php/logout.php 1-10                                          |               |
| MySQL              | 用户表结构                                                   | php/login.php 5-15, php/register.php 5-15                    |               |
| MySQL              | 登录验证                                                     | php/login.php 10-27                                          |               |
| MySQL              | 注册写入                                                     | php/register.php 16-34                                       |               |
| 额外功能           | 仅登录可见的评论区和登出按钮                                 | guestbook.html 1-40, script.js 150-200, php/comment.php 1-40, alreadylogin.html 20-30 |               |

==说明==

我们实现了仅登录用户可见的评论区和登出按钮。

- 评论区展示在 guestbook.html，并通过 script.js 检查登录状态控制显示。
- 后端逻辑在 php/comment.php 实现。
- 登出按钮在 alreadylogin.html 页面，逻辑由 script.js 中的 logout() 函数处理。