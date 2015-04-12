<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:54 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\User;

use DateTime;

/**
 * Class User
 * @package NilPortugues\MyBoundedContext\Entity\Model\User
 */
class User
{
    /**
     * @var UserId
     */
    private $userId;

    /**
     * @var UserName
     */
    private $username;

    /**
     * @var Email
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $registeredOn;

    /**
     * @param UserId   $userId
     * @param UserName $username
     * @param Email    $email
     * @param DateTime $registeredOn
     */
    public function __construct(UserId $userId, UserName $username, Email $email, DateTime $registeredOn = null)
    {
        $this->userId       = $userId;
        $this->username     = $username;
        $this->email        = $email;
        $this->registeredOn = (null === $registeredOn) ? new DateTime() : $registeredOn;
        ;
    }

    /**
     * @return \DateTime
     */
    public function getRegisteredOn()
    {
        return $this->registeredOn;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param UserName $username
     *
     * @return $this
     */
    public function setUsername(UserName $username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return UserName
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param Email $email
     *
     * @return $this
     */
    public function setEmail(Email $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }
}
