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
							原密码
						</td>
						<td>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" id="inputPassword" placeholder="oldPassword">
                            </div>
						</td>
					</tr>

					<tr>
						<td class="success">
							新密码
						</td>
						<td>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="newPassword">
                            </div>
						</td>
					</tr>

					<tr>
						<td class="success">
							确认密码
						</td>
						<td>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="newPassword">
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
        </div>
    </div>
</block>