<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:02 PM
 *
 * For the full copyright and license information, please SignUp the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\User\SignUp;

/**
 * Class SignUpUserResponse
 * @package NilPortugues\MyBoundedContext\Application\User\SignUp
 */
class SignUpUserResponse
{
    /**
     * @var string
     */
    private $userId;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $registeredOn;

    /**
     * @param $userId
     * @param $username
     * @param $email
     * @param $registeredOn
     */
    public function __construct($userId, $username, $email, $registeredOn)
    {
        $this->userId = (string)$userId;
        $this->username = (string)$username;
        $this->email = (string)$email;
        $this->registeredOn = (string)$registeredOn;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getRegisteredOn()
    {
        return $this->registeredOn;
    }
}