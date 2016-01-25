
<form action="{:U('save',I('get.'))}" method="post">
	<input type="hidden" name="id" value="{$expert.id}" />
	<div>
		<label for="username">用户名&nbsp;&nbsp;&nbsp;{$expert.username}</label>
		
	</div>
	<div>
		<label for="name">姓名</label>
		<input type="text" id="name" name="name" value="{$expert.name}" />
	</div>
	<div>
		<label for="job_title">技术职称</label>
		<input type="text" name="job_title" value="{$expert.job_title}" />
	</div>
	<div>
		<label for="field">学科领域</label>
		<input type="text" id="field" name="field" value="{$expert.field}">
	</div>
	<div>
		<label for="work_unit">工作单位及部门</label>
		<input type="text" id="work_unit" name="work_unit" value="{$expert.work_unit}" />
	</div>
	<div>
		<label for="correspondence_address">通讯地址</label>
		<input type="text" id="correspondence_address" name="correspondence_address" value="{$expert.correspondence_address}" />
	</div>
	<div>
		<label for="dataselect">导师类别</label>
		<select  name="tutor_class" id="dataselect">
			<option value="0">博导</option> 
			<option value="1" <eq name="expert.tutor_class" value="1">selected="selected"</eq>>硕导</option>
		</select>
	</div>
	<div>
		<label for="email">电子邮编</label>
		<input type="text" id="email" name="email" value="{$expert.email}" />
	</div>

	<div>
		<label for="userpassword">密码</label>
		<input type="password" id="userpassword" name="userpassword" value="{$expert.userpassword}" />
	</div>
	<div>
	<label for="repassword">确认密码：</label>
	<input type="password" id="repassword" name="repassword" value="{$expert.userpassword}" />
	</div>
	<div>
		<button type="submit">保存</button>
	</div>

</form>