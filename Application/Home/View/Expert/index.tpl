<extend name="Base:index" />
<block name="wrapper">

   <div class="row-fluid">
		<div class="span12">
		    <div class="page-header">
				<h4>
                {:dump($expert)};
					填写个人信息
                }
				</h4>
			</div>
			<form class="form-horizontal" name="form" action="{:U('save')}" method='post'>
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
						    <form>
                                <input type="radio" name="senior" value="senior" />正高级
                                <input type="radio" name="senior" value="sub-senior" />副高级
                            </form>
                            </div>
						</td>
					</tr>

					<tr>
						<td class="success">
							导师类别
						</td>
						<td>
						    <div class="col-sm-3">
							    <form>
                                    <input type="radio" name="tutor" value="doctor tutor" />博导
                                    <input type="radio" name="tutor" value="master tutor" />硕导
                                </form>
							</div>
						</td>
				</tr>
				<tr>
						<td class="success">
							<label for="password">密码</label>
						</td>
						<td>
                            <div class="col-sm-3">
                                <input id="password" name="password" class="form-control" ng-model="password" required/>
                                <p class="text-danger" ng-show="form.password.$dirty && form.password.$invalid"> <span ng-show="form.password.$error.required">用户名不能为空</span></p>
                            </div>
						</td>
					</tr>
					<tr>
						<td class="success">
							<label for="userPassword">新密码</label>
						</td>
						<td>
                            <div class="col-sm-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码" ng-model="password">
                            </div>
						</td>
					</tr>

					<tr ng-class="{'has-success' : !form.confirmPassword.$pristine && form.confirmPassword.$valid,'has-error' : !form.confirmPassword.$pristine && form.confirmPassword.$invalid }">
						<td class="success">
							<label for="confirmPassword">确认密码</label>
						</td>
						<td>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"          placeholder="请再次输入密码" ng-model="selectedUser.confirmPassword" pw-check="userPassword">

                                <div ng-show="!form.confirmPassword.$pristine && tagName.confirmPassword.$valid">         
                                	<span class="glyphicon glyphicon-ok form-control-feedback"></span>
                                </div>

                                <div ng-show="!form.confirmPassword.$pristine && form.confirmPassword.$invalid">
                                	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                </div>
                            </div>
						</td>
					</tr>

					</tbody>
					</table>
					<div class="col-sm-offset-5">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check "></i>提交</button>
                    </div>
                </tbody>
			</table>
        </form>
        </div>
    </div>
     <include file="index.js" />
</block>