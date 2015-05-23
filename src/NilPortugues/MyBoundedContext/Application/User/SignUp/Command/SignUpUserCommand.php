<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:58 PM
 *
 * For the full copyright and license information, please SignUp the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\User\SignUp;

/**
 * Class SignUpUserCommand
 * @package NilPortugues\MyBoundedContext\Application\User\SignUp
 */
class SignUpUserCommand
{
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $username;

    /**
     * @param string $email
     * @param string $username
     */
    public function __construct($email, $username)
    {
        $this->email = (string)$email;
        $this->username = (string)$username;
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
    public function getUsername()
    {
        return $this->username;
    }
}
