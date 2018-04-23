<?php

namespace User\Logic;

use Think\Exception;
use User\Model\UserModel;

class UserLogic extends UserModel
{
    protected $errors = array();

    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $list
     * @return bool|int|mixed
     */
    public function saveList($list)
    {

        if ($this->create($list)) {
            if (isset($this->data['id']) && $this->data['id'] !== "") {
                $id = $this->save();
            } else {
                $id = $this->add();
            }
            return $id;
        } else {
            $this->errors[] = $this->getError();
            return false;
        }
    }

    public function deleteInfo($id)
    {
        $map['id'] = $id;
        $datas = $this->where($map)->delete();
        return $datas;
    }

    /**
     * 更新用户信息
     * @param   $list array 用户信息
     * @return UserLogic|false
     */
    public function updateList($list)
    {
        $id = $list["id"];
        if (!(int)$id) {
            $this->setError("UserLogic->updateList:Must has key of id.(必须传入ID)");
            return $this;
        }

        //取当前ID对应的信息
        $user = $this->getListById($id);

        //判断原密码是否正确
        $password = sha1($list['password']);
        if ($password !== $user['password']) {
            $this->setError("UserLogic->updateList:The old password is incorrect.(原密码输入错误)");
            return $this;
        }

        //如果传入的新密码为空，则不重置密码;非空，则重置密码
        $repassword = isset($list['repassword']) ? trim($list['repassword']) : '';
        if ($repassword !== "") {
            $user['password'] = sha1($repassword);
        }

        //取其它更新的数据
        $user['email'] = $list['email'];
        $user['phonenumber'] = $list['phonenumber'];

        //更新数据
        if ($this->create($user)) {
            $this->save();
        } else {
            $this->setError("UserLogic->updateList:Data create error(数据创建错误):" . $this->getError());
            return $this;
        }

        return $this;
    }

    /**
     * 通过ID获取用户的NAME值
     * @param  int $id
     * @return String|false
     * PANJIE
     */
    public function getNameById($id)
    {
        $id = (int)$id;
        $map = array();
        $map["id"] = $id;
        if (!$list = $this->getListById($id)) {
            $this->setError("UserLogic:The data of id: {$id} is not found(编号为{$id}的记录未找到:)" . $this->getError());
            return false;
        }

        return $list['name'];
    }

    /**
     * [resetPassword 重置密码]
     * 重置密码为mengyunzhi
     * @param  [type] $userId [用户id]
     * @return boolean
     * @throws \Think\Exception
     */
    public function resetPassword($userId)
    {
        if ($userId == null) {
            $this->error = "系统错误!";
            throw new Exception($this->error, 1);
        } else {
            $data['id'] = $userId;
            $data['password'] = sha1(C('DEFAULT_PASSWORD'));
            $this->save($data);
            return true;
        }
    }

    /**
     * 检查用户名与密码的正确性
     * @param  string $username 用户名
     * @param  string $password 密码
     * @param  boolean $useSha1 是否使用sha1加密
     * @return true flase
     */
    public function checkUser($username, $password, $useSha1 = true)
    {
        //根据用户名获取用户密码与用户信息
        $user = $this->getUserInfoByName($username);

        if ($user === null) {
            return false;
        } else if ($useSha1 === true) {
            if ($user['password'] == sha1($password)) {
                return true;
            } else {
                return false;
            }
        } else {
            if ($user['password'] === $password) {
                return true;
            } else {
                return false;
            }
        }
    }

    //根据用户名取用户信息
    //$name string
    public function getUserInfoByName($name)
    {
        $map = array();
        $map['username'] = $name;
        return $this->where($map)->find();
    }
}