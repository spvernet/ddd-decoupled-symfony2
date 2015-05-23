<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 11:51 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\User;

use InvalidArgumentException;
use NilPortugues\MyBoundedContext\Entity\User\Validator\UserNameValidator;

/**
 * Class UserName
 * @package NilPortugues\MyBoundedContext\Entity\User
 */
class UserName
{
    /**
     * @var string
     */
    private $username;

    /**
     * @param $username
     */
    public function __construct($username)
    {
        $this->validate($username);
        $this->username = (string)$username;
    }

    /**
     * @param $username
     *
     * @throws \InvalidArgumentException
     */
    private function validate($username)
    {
        $validator = new UserNameValidator();

        if (false === $validator->isValid($username)) {
            $errors = $validator->getErrors();
            throw new InvalidArgumentException(implode(' ', array_pop($errors)));
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->username;
    }

    /**
     * @param UserName $object
     *
     * @return bool
     */
    public function equals(self $object)
    {
        return $this->get() === $object->get();
    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->username;
    }
}
