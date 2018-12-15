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
 * @Entity()
 * @Table(name="user")
 * @uses      User
 */
class User extends Model
{
    /**
     * @var int $id 
     * @Id()
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string $username 用户名
     * @Column(name="username", type="string", length=60, default="")
     */
    private $username;

    /**
     * @var string $realname 真实姓名
     * @Column(name="realname", type="string", length=60, default="")
     */
    private $realname;

    /**
     * @var string $mobile 
     * @Column(name="mobile", type="string", length=15, default="")
     */
    private $mobile;

    /**
     * @var string $password 
     * @Column(name="password", type="string", length=255, default="")
     */
    private $password;

    /**
     * @var string $salt 密码盐
     * @Column(name="salt", type="string", length=10, default="")
     */
    private $salt;

    /**
     * @var string $email 邮箱
     * @Column(name="email", type="string", length=50, default="")
     */
    private $email;

    /**
     * @var int $sex 1为男2为女
     * @Column(name="sex", type="tinyint", default=1)
     */
    private $sex;

    /**
     * @var string $imgurl 
     * @Column(name="imgurl", type="string", length=255)
     */
    private $imgurl;

    /**
     * @var string $loginIp 登录ip
     * @Column(name="login_ip", type="string", length=30)
     */
    private $loginIp;

    /**
     * @var int $lastLoginTime 上次登录时间
     * @Column(name="last_login_time", type="integer", default=0)
     */
    private $lastLoginTime;

    /**
     * @var string $createAt 
     * @Column(name="create_at", type="timestamp", default="CURRENT_TIMESTAMP")
     */
    private $createAt;

    /**
     * @var string $updateAt 
     * @Column(name="update_at", type="timestamp", default="CURRENT_TIMESTAMP")
     */
    private $updateAt;

    /**
     * @param int $value
     * @return $this
     */
    public function setId(int $value)
    {
        $this->id = $value;

        return $this;
    }

    /**
     * 用户名
     * @param string $value
     * @return $this
     */
    public function setUsername(string $value): self
    {
        $this->username = $value;

        return $this;
    }

    /**
     * 真实姓名
     * @param string $value
     * @return $this
     */
    public function setRealname(string $value): self
    {
        $this->realname = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMobile(string $value): self
    {
        $this->mobile = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPassword(string $value): self
    {
        $this->password = $value;

        return $this;
    }

    /**
     * 密码盐
     * @param string $value
     * @return $this
     */
    public function setSalt(string $value): self
    {
        $this->salt = $value;

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
     * 1为男2为女
     * @param int $value
     * @return $this
     */
    public function setSex(int $value): self
    {
        $this->sex = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setImgurl(string $value): self
    {
        $this->imgurl = $value;

        return $this;
    }

    /**
     * 登录ip
     * @param string $value
     * @return $this
     */
    public function setLoginIp(string $value): self
    {
        $this->loginIp = $value;

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
     * @param string $value
     * @return $this
     */
    public function setCreateAt(string $value): self
    {
        $this->createAt = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setUpdateAt(string $value): self
    {
        $this->updateAt = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 用户名
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * 真实姓名
     * @return string
     */
    public function getRealname()
    {
        return $this->realname;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * 密码盐
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
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
     * 1为男2为女
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @return string
     */
    public function getImgurl()
    {
        return $this->imgurl;
    }

    /**
     * 登录ip
     * @return string
     */
    public function getLoginIp()
    {
        return $this->loginIp;
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
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

}
