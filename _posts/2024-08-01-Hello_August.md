---
layout:     post
title:      "你好，八月"
subtitle:   ""
date:       2024-08-01 22:19:00
author:     "SteveZhang08"
header-img: "img/in-post/2024-08-01/head2.jpg"
tags:
    - 生活
---

# 你好，八月

>这绝对是我过的最清闲的一个暑假

自打中考完后，几乎就没怎么再学习了。  
在参加完机器人的比赛之后，生活也趋于平静。  
每天无非就是手机电视看会视频，然后无聊的关上手机。  
一天几个小时的短视频，刷完之后什么都记不住。
以前在学校规划暑假打算做的事，到头来却是打发时间。

#走向八月
很明显，现在就在八月里了。  
啊哈，事实上，我应该算开学了。
八月一号，要不是新校区在建设，不然学校得把我们叫到学校去，现在是上网课。
哦，我亲爱的“漳州三中”

![error](https://stevezhang08.github.io/web.github.io/img/in-post/2024-08-01/error4.PNG)

##发生了什么？

最初脑子是宕机的，啥都没看就把仓库重新push，还重新创建了jekyll.yml；<br>
很显然，无济于事。<br>
于是静下心来看看错误信息

![error](https://stevezhang08.github.io/web.github.io/img/in-post/2024-08-01/error3.PNG)

啊哈，不得不说，果然只是一个很小的错误<br>
问题出现在 `_config.yml` 文件中<br>
`_config.yml` 文件的第91行开始，由于一时半会不知道“friends”打算添点什么，于是把它注释掉<br>
结果我使用了 `/*...*/` 的形式

![error](https://stevezhang08.github.io/web.github.io/img/in-post/2024-08-01/error2.PNG)

##解决问题

是被自己气笑了
在yml文件中,注释只能使用 `#` ; 没有多行注释这玩意<br>
那解决方式就很简单呗,把注释的方式改一下,然后重新push

呼,终于解决了,撒花

-SteveZhang08，一位被错误气死的高中生
