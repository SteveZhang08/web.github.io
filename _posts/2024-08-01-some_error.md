---
layout:     post
title:      "在一次微不足道的push后，我的jekyll.yml无法运行了？"
subtitle:   ""
date:       2024-08-01 18:01:00
author:     "SteveZhang08"
header-img: "img/in-post/2024-08-01/head.jpg"
tags:
    - 奇奇怪怪的错误
    - yml
---

# 在一次微不足道的push后，我的jekyll.yml无法运行了？

>果然,我的身上总能出现一些很离谱的错误

我似乎只是删了一些图片,在push上去后,Actions就出错了

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
