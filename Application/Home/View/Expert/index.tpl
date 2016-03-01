<extend name="Base:index" />
<block name="wrapper">

   <div class="row-fluid" ng-app="user" ng-controller="userAdd">
		<div class="span12">
		    <div class="page-header">
				<h4>
					填写个人信息
				</h4>
			</div>
			<form class="form-horizontal" name="form" action="{:U('save')}" method='post'>
			<input type="hidden" name="id" value="{$expert.id}"/>
			<table class="table table-bordered table-condensed">
				<tbody>
				    <tr>
						<td class="success">
							    用户名
						</td>
						<td>
						    <div class="col-sm-3">
							    {$expert['username']}
						    </div>
						</td>
					</tr>
					<tr>
						<td class="success">
							专家姓名
						</td>
						<td>
                            <div class="col-sm-3">
							    李明
							</div>
						</td>
					</tr>

					<tr>
						<td class="success">
							技术职称
						</td>
						<td>
						<div class="col-sm-3">
						    
                                <input type="radio" checked="checked" name="job_title" value="0" />正高级
                                <input type="radio" name="job_title" value="1" />副高级
                  
                            </div>
						</td>
					</tr>

					<tr>
						<td class="success">
							导师类别
						</td>
						<td>
						    <div class="col-sm-3">
							  
                                    <input type="radio" checked="checked" name="tutor_class" value="0" />博导
                                    <input type="radio" name="tutor_class" value="1" />硕导
                                
							</div>
						</td>
				</tr>
				<tr>
						<td class="success">
							<label for="userpassword">密码</label>
						</td>
						<td>

                            <div class="col-sm-3">
                            {$expert['userpassword']}
                            </div>
						</td>
					</tr>
					<tr>
						<td class="success">
							<label for="userpassword">新密码</label>
						</td>
						<td>
                            <div class="col-sm-3">
                            <input type="password" class="form-control" name="userpassword" ng-model="password1" ng-change="changePassword1(password1)" placeholder="请输入密码">
                            </div>
						</td>
					</tr>
						<td class="success">
							<label>确认密码</label>
						</td>
						<td>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" 
                               name="userpassword"  ng-model="password2" ng-change="changePassword2(password2)" placeholder="请再次输入密码">
                               <span class="text-danger" ng-show="different"> 请输入相同的密码</span>
                            </div>
						</td>
					</tr>

					</tbody>
					</table>
					<div class="col-sm-offset-5">
                        <button type="submit" ng-disabled="different" class="btn btn-sm btn-success"><i class="fa fa-check "></i>提交</button>
                    </div>
                </tbody>
			</table>
        </form>
        </div>
    </div>
     <include file="index.js" />
</block>