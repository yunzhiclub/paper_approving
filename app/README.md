# paper_approving
河北工业大学材料学习论文送审系统

实现功能流程概述：

1.管理员首先进行周期的新建与切换。
比如2015学年，2016学年
管理员设置学生录入数据的开始时间及终止时间。
管理员设置评审专家的开始时间及终止时间。

2.教务员进行学生数据的导入，包括：学号，姓名 。。。。（按实际需求)
录入数据后，可以进行学生数据的增删改查。

3.学生在指定的时候间用学号做为用户名，默认的密码做为密码进行系统登陆。
在线上传自己的毕业论文。

4.终止时间结束后，教务员查看未及时上传论文的学生清单。
上传的论文文件名命名规则示例为：10080_郭XX_088888_201821803004_LW
教务员可以进行手动的论文的添加，也可以联系管理员更改系统数据录入终止时间。

5.选择已上传的附件的所有学生，按要求（比如生成两个用户名）生成对应的用户名密码。
？有没有多对多的情况，即一篇论文送给多个老师评审，同时，一个老师还审阅多个文章。


6.生成用户名密码后，提供EXECL文件下载。

7.评审教师登陆系统后，进行基本信息的填写。进行论文的下载，评语的填写。

8.在指定时间结束后，查看已评审及未评审论文情况。

9.按需求确认是否进行评审时间的调整。

10.生成整体的EXECL表，供下载。

升级版本功能：
1.批量导入教师信息（以教师编号为关键字），可提供导出，编辑后再导入。
2.设定规则（1篇论文对应几个审送教师，1位教师审阅几篇论文）
3.按规则生成论文的派送。
4.重置所有教师的密码。
5.按邮箱及手机号给教师发送邮件及短信。
6.审阅教师登陆系统（历史教师将保存其基本信息，减少了审阅教师的工作难度）
7.其它流程不变。

使用方法：
1. 导入数据表
2. 开启浏览器对flash的支持，否则无法批量上传学生及论文信息
3. 在public下建立uploads文件夹，并设置为当前WEB用户可写




