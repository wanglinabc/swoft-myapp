<?php
namespace App\Models\Entity;

use Swoft\Db\Model;
use Swoft\Db\Bean\Annotation\Column;
use Swoft\Db\Bean\Annotation\Entity;
use Swoft\Db\Bean\Annotation\Id;
use Swoft\Db\Bean\Annotation\Required;
use Swoft\Db\Bean\Annotation\Table;
use Swoft\Db\Types;

/**
 * 后台管理员表

 * @Entity()
 * @Table(name="admin")
 * @uses      Admin
 */
class Admin extends Model
{
    /**
     * @var int $adminId 
     * @Id()
     * @Column(name="admin_id", type="integer")
     */
    private $adminId;

    /**
     * @var string $adminName 用户名
     * @Column(name="admin_name", type="string", length=50, default="")
     */
    private $adminName;

    /**
     * @var string $loginName 登录用户名
     * @Column(name="login_name", type="string", length=125, default="")
     */
    private $loginName;

    /**
     * @var string $loginPwd 登录密码
     * @Column(name="login_pwd", type="string", length=500, default="")
     */
    private $loginPwd;

    /**
     * @var string $adminSecret 加密盐
     * @Column(name="admin_secret", type="string", length=30, default="")
     */
    private $adminSecret;

    /**
     * @var string $adminImg 用户头像
     * @Column(name="admin_img", type="string", length=255, default="")
     */
    private $adminImg;

    /**
     * @var string $adminPhone 管理员手机号
     * @Column(name="admin_phone", type="string", length=15, default="")
     */
    private $adminPhone;

    /**
     * @var string $email 邮箱
     * @Column(name="email", type="string", length=20, default="")
     */
    private $email;

    /**
     * @var int $sex 0女1男
     * @Column(name="sex", type="tinyint", default=1)
     */
    private $sex;

    /**
     * @var int $status 0为禁用，1为正常，-1为删除
     * @Column(name="status", type="tinyint", default=1)
     */
    private $status;

    /**
     * @var int $isSuper 1为超级管理员
     * @Column(name="is_super", type="tinyint", default=0)
     */
    private $isSuper;

    /**
     * @var string $remark 备注
     * @Column(name="remark", type="string", length=500)
     */
    private $remark;

    /**
     * @var string $lastLoginIp 上次登录ip
     * @Column(name="last_login_ip", type="string", length=50)
     */
    private $lastLoginIp;

    /**
     * @var int $lastLoginTime 上次登录时间
     * @Column(name="last_login_time", type="integer", default=0)
     */
    private $lastLoginTime;

    /**
     * @var string $extend 保留域
     * @Column(name="extend", type="string", length=255)
     */
    private $extend;

    /**
     * @var int $opeatorId 创建人
     * @Column(name="opeator_id", type="integer", default=0)
     */
    private $opeatorId;

    /**
     * @var int $created 
     * @Column(name="created", type="integer", default=0)
     */
    private $created;

    /**
     * @var int $updated 
     * @Column(name="updated", type="integer", default=0)
     */
    private $updated;

    /**
     * @param int $value
     * @return $this
     */
    public function setAdminId(int $value)
    {
        $this->adminId = $value;

        return $this;
    }

    /**
     * 用户名
     * @param string $value
     * @return $this
     */
    public function setAdminName(string $value): self
    {
        $this->adminName = $value;

        return $this;
    }

    /**
     * 登录用户名
     * @param string $value
     * @return $this
     */
    public function setLoginName(string $value): self
    {
        $this->loginName = $value;

        return $this;
    }

    /**
     * 登录密码
     * @param string $value
     * @return $this
     */
    public function setLoginPwd(string $value): self
    {
        $this->loginPwd = $value;

        return $this;
    }

    /**
     * 加密盐
     * @param string $value
     * @return $this
     */
    public function setAdminSecret(string $value): self
    {
        $this->adminSecret = $value;

        return $this;
    }

    /**
     * 用户头像
     * @param string $value
     * @return $this
     */
    public function setAdminImg(string $value): self
    {
        $this->adminImg = $value;

        return $this;
    }

    /**
     * 管理员手机号
     * @param string $value
     * @return $this
     */
    public function setAdminPhone(string $value): self
    {
        $this->adminPhone = $value;

        return $this;
    }

    /**
     * 邮箱
     * @param string $value
     * @return $this
     */
    public function setEmail(string $value): self
    {
        $this->email = $value;

        return $this;
    }

    /**
     * 0女1男
     * @param int $value
     * @return $this
     */
    public function setSex(int $value): self
    {
        $this->sex = $value;

        return $this;
    }

    /**
     * 0为禁用，1为正常，-1为删除
     * @param int $value
     * @return $this
     */
    public function setStatus(int $value): self
    {
        $this->status = $value;

        return $this;
    }

    /**
     * 1为超级管理员
     * @param int $value
     * @return $this
     */
    public function setIsSuper(int $value): self
    {
        $this->isSuper = $value;

        return $this;
    }

    /**
     * 备注
     * @param string $value
     * @return $this
     */
    public function setRemark(string $value): self
    {
        $this->remark = $value;

        return $this;
    }

    /**
     * 上次登录ip
     * @param string $value
     * @return $this
     */
    public function setLastLoginIp(string $value): self
    {
        $this->lastLoginIp = $value;

        return $this;
    }

    /**
     * 上次登录时间
     * @param int $value
     * @return $this
     */
    public function setLastLoginTime(int $value): self
    {
        $this->lastLoginTime = $value;

        return $this;
    }

    /**
     * 保留域
     * @param string $value
     * @return $this
     */
    public function setExtend(string $value): self
    {
        $this->extend = $value;

        return $this;
    }

    /**
     * 创建人
     * @param int $value
     * @return $this
     */
    public function setOpeatorId(int $value): self
    {
        $this->opeatorId = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setCreated(int $value): self
    {
        $this->created = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setUpdated(int $value): self
    {
        $this->updated = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdminId()
    {
        return $this->adminId;
    }

    /**
     * 用户名
     * @return string
     */
    public function getAdminName()
    {
        return $this->adminName;
    }

    /**
     * 登录用户名
     * @return string
     */
    public function getLoginName()
    {
        return $this->loginName;
    }

    /**
     * 登录密码
     * @return string
     */
    public function getLoginPwd()
    {
        return $this->loginPwd;
    }

    /**
     * 加密盐
     * @return string
     */
    public function getAdminSecret()
    {
        return $this->adminSecret;
    }

    /**
     * 用户头像
     * @return string
     */
    public function getAdminImg()
    {
        return $this->adminImg;
    }

    /**
     * 管理员手机号
     * @return string
     */
    public function getAdminPhone()
    {
        return $this->adminPhone;
    }

    /**
     * 邮箱
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * 0女1男
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * 0为禁用，1为正常，-1为删除
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 1为超级管理员
     * @return int
     */
    public function getIsSuper()
    {
        return $this->isSuper;
    }

    /**
     * 备注
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * 上次登录ip
     * @return string
     */
    public function getLastLoginIp()
    {
        return $this->lastLoginIp;
    }

    /**
     * 上次登录时间
     * @return int
     */
    public function getLastLoginTime()
    {
        return $this->lastLoginTime;
    }

    /**
     * 保留域
     * @return string
     */
    public function getExtend()
    {
        return $this->extend;
    }

    /**
     * 创建人
     * @return int
     */
    public function getOpeatorId()
    {
        return $this->opeatorId;
    }

    /**
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return int
     */
    public function getUpdated()
    {
        return $this->updated;
    }

}
