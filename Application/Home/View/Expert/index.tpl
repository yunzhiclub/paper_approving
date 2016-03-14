<extend name="Base:index" />
<block name="wrapper">
    <div class="row-fluid" ng-app="user" ng-controller="userAdd">
        <div class="span12">
            <div class="page-header">
                <h4>
                    填写个人信息:
                </h4>
            </div>
            <form class="form-horizontal" name="form" action="{:U('save')}" method='post' ng-submit="submit()">
                <input type="hidden" name="id" value="{$expert.id}" />
                <table class="table table-bordered table-condensed">
                    <tbody>
                        <tr>
                            <td class="success" width="30%">
                                用户名
                            </td>
                            <td width="70%">
                                <div class="col-md-3 col-sm-6" >
                                    {{expert.username}}
                                    <input type="hidden" name="id" value="{{expert.id}}" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="success">
                                专家姓名<code>*</code>
                            </td>
                            <td>
                                <div class="col-md-3 col-sm-6">
                                    <input type="text" ng-minlength="2" ng-maxlength="15" name="name" class="form-control" ng-model="expert.name" placeholder="您的姓名" required />
                                </div>
                                <div class="col-md-3 col-sm-6" ng-show="form.name.$dirty && form.name.$invalid">
                                    <code>长度为2-15</code>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="success">
                                技术职称<code>*</code>
                            </td>
                            <td>
                                <div class="col-md-3 col-sm-6">
                                    <input id="job_title0" ng-model="expert.job_title" type="radio" checked="checked" name="job_title" value="0" />
                                    <label for="job_title0">&nbsp;正高级</label>&nbsp;
                                    <input id="job_title1" ng-model="expert.job_title" type="radio" name="job_title" value="1" />
                                    <label for="job_title1">&nbsp;副高级</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="success">
                                导师类别<code>*</code>
                            </td>
                            <td>
                                <div class="col-md-3 col-sm-6">
                                    <input ng-model="expert.tutor_class" id="tutor_class1" type="radio" name="tutor_class" value="1" />
                                    <label for="tutor_class1">&nbsp;博导</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input ng-model="expert.tutor_class" id="tutor_class0" type="radio" checked="checked" name="tutor_class" value="0" />
                                    <label for="tutor_class0">&nbsp;硕导</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="success">电子邮箱<code>*</code></td>
                            <td>
                                <div class="col-md-3 col-sm-6">
                                    <input type="email" class="form-control" name="email" placeholder="您的邮箱地址" ng-model="expert.email" required />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="success">电话</td>
                            <td>
                                <div class="col-md-3 col-sm-6">
                                    <input type="text" class="form-control" ng-model="expert.phone" name="phone" placeholder="您的电话号码" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="success">专业特长</td>
                            <td>
                                <div class="col-md-3 col-sm-6">
                                    <input type="text" class="form-control" ng-model="expert.specialty" name="specialty" placeholder="您的专业特长"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="success">学科</td>
                            <td>
                                <div class="col-md-3 col-sm-6">
                                    <input type="text" class="form-control" ng-model="expert.subject" name="subject" placeholder="您的学科"/>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="success">联系地址</td>
                            <td>
                                <div class="col-md-6 col-sm-12">
                                    <input type="text" ng-model="expert.address" class="form-control" name="address" placeholder="您的联系地址"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="success">学校</td>
                            <td>
                                <div class="col-md-6 col-sm-12">
                                    <input type="text" class="form-control" ng-model="expert.school" name="school" placeholder="您的学校名称"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="success">
                                <label for="userpassword">原密码</label>
                            </td>
                            <td>
                                <div class="col-md-3 col-sm-6">
                                    <input type="password" class="form-control" name="password" placeholder="请输入原密码" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="success">
                                <label for="userpassword">新密码</label>
                            </td>
                            <td>
                                <div class="col-md-3 col-sm-6">
                                    <input type="password" ng-minlength="4" ng-maxlength="16" class="form-control" name="newpassword" ng-model="newpassword" placeholder="请输入新密码" />
                                </div>
                                <div class="col-sm-6" ng-show="form.newpassword.$dirty && !form.newpassword.$valid">
                                <code>密码长度介于4至16位之间,为数字及英文字母的组合</code>
                                </div>
                            </td>
                        </tr>
                        <td class="success">
                            <label>确认密码</label>
                        </td>
                        <td>
                            <div class="col-md-3 col-sm-6">
                                <input type="password" class="form-control" name="repassword" ng-model="repassword" placeholder="再次输入新密码" />
                                <span class="text-danger" ng-show="different"> 再次输入新密码</span>
                            </div>
                            <div class="col-md-3 col-sm-6" ng-show="form.repassword.$dirty">
                                <code>{{hasError}}</code>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-sm-offset-5">
                    <button type="submit" ng-disabled="submitDisable" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> 保存</button>
                </div>
                </tbody>
                </table>
            </form>
        </div>
    </div>
    <include file="index.js" />
</block>
