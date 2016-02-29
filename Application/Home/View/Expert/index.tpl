<extend name="Base:index" />
<block name="wrapper">

   <div class="row-fluid" ng-app="user" ng-controller="userAdd">
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
                             {{password}}
                            </div>
						</td>
					</tr>
					<tr>
						<td class="success">
							<label for="password">新密码</label>
						</td>
						<td>
                            <div class="col-sm-3">
                            <input type="password" class="form-control" name="password" ng-model="password1" ng-change="changePassword1(password1)" placeholder="请输入密码">
                            </div>
						</td>
					</tr>
						<td class="success">
							<label>确认密码</label>
						</td>
						<td>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" 
                               name="password"  ng-model="password2" ng-change="changePassword2(password2)" placeholder="请再次输入密码">
                               <span class="text-danger" ng-show="different"> 请输入相同的密码</span>
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