<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:02 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\User\ViewUser;

/**
 * Class ViewUserResponse
 * @package NilPortugues\MyBoundedContext\Application\Model\User\ViewUser
 */
class ViewUserResponse
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
     * @param string $userId
     * @param string $username
     * @param string $email
     */
    public function __construct($userId, $username, $email)
    {
        $this->userId = (string) $userId;
        $this->username = (string) $username;
        $this->email = (string) $email;
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
}
