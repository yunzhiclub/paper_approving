<extend name="Base:index" />
<block name="body">
  <!--   <form id="form" action="{:U('save')}" method="post">
        <html:editor id="ueditor" type="Ueditor">
            <H1>HEELO</H1>
        </html:editor>
        
        <?php $value="8,9" ?>
        <html:uploader value="value" name="filetest" debug="true" type="file">
            请选择附件
        </html:uploader>
        <button type="submit">submit</button>
    </form> -->
    

<h2><b>本论文送审系统的使用流程</b></h2>

<p>1.后台管理人员登陆本系统后进入“用户管理”菜单点击“添加用户”创建其他后台管理人员的账号密码。<br />2.查看“评阅设置”里各评阅项目。<br />3.进入“周期管理”为本阶段论文送审添加并设置相应的周期。<br />4.进入“学生管理”，点击“批量上传”按钮将具有本周期内所有学生信息的Excel文档进行上传。<br />5.进入“论文管理”，点击“批量上传并匹配”按钮上传本周期内所有学生的论文，点击“批量生成用户名和密码”按钮用以生成评阅专家登陆前台评阅系统的账号密码，然后将这些账号密码分发给各专家，待评阅时间结束后，后台管理员可点击“批量下载评阅表”以及“下载评阅统计表”按钮，分别对应下载所有论文的评阅表以及具有评阅统计信息的Excel文档</p>

<h2><b>注意事项</b></h2>
<p>1.在专家进行评审前，需要注意“评阅设置”里面各评阅项目是否正确。<br />2.每当开始新一周期论文评审，需要在“周期设置”中“添加周期”并“设置当前周期”。<br />3.先在学生管理里面上传具有所有学生信息的Excel文档（要求Excel必须是所有学生的信息），再去论文管理中上传学生的论文。<br />4.删除按钮慎用</p>
<h2><b>左侧菜单功能介绍</b></h2>
<p>首页>>>></p>
<p>论文送审系统的使用说明，包括各菜单的功能以及使用流程</p>
<p>用户管理>>>></p>
<p>后台管理人员账号密码管理，功能有添加后台管理人员账号密码，可编辑后台管理人员的个人信息，可重置后台管理人员密码</p>
<p>评阅设置>>>></p>
<p>展示专家评阅论文时的各评阅项目及其要素、权重以及评分细则</p>
<p>周期管理>>>></p>
<p>展示本论文送审系统各周期，可添加编辑周期，可设置系统当前所处的周期</p>
<p>学生管理>>>></p>
<p>用于后台管理人员将学生信息上传，展示本周期的学生及其论文信息，具有查看各学生的具体信息的功能</p>
<p>论文管理>>>></p>
<p>展示各学生论文生成的专家的账号密码及评审状态，具有批量上传学生论文，为每篇论文批量生成两个评阅专家的账号和密码，可以批量下载评阅表，下载评阅统计表，搜索未上传论文以及未评审论文信息，可单独下载学生的论文>>>></p>
<p>个人信息管理>>>></p>
<p>用于修改后台管理人员本人的邮箱、手机号、密码信息</p>



</block>