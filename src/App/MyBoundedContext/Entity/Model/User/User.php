<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:54 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\MyBoundedContext\Entity\Model\User;

use DateTime;


/**
 * Class User
 * @package App\MyBoundedContext\Entity\Model\User
 */
class User
{
    private $userId;
    private $username;
    private $email;

    public function __construct($userId, $username, $email)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->email = $email;
    }

    /**
     * @param mixed $userId
     *
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
} 