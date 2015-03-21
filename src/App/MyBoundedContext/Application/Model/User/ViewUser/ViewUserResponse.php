<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:02 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\MyBoundedContext\Application\Model\User\ViewUser;


/**
 * Class ViewUserResponse
 * @package App\MyBoundedContext\Application\Model\User\ViewUser
 */
class ViewUserResponse
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
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
} 