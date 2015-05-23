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
use NilPortugues\MyBoundedContext\Entity\User\Validator\EmailValidator;

/**
 * Class Email
 * @package NilPortugues\MyBoundedContext\Entity\User
 */
class Email
{
    /**
     * @var string
     */
    private $email;

    /**
     * @param string $email
     */
    public function __construct($email)
    {
        $this->validate($email);
        $this->email = (string)$email;
    }

    /**
     * @param $email
     *
     * @throws InvalidArgumentException
     */
    private function validate($email)
    {
        $validator = new EmailValidator();

        if (false === $validator->isValid($email)) {
            $errors = $validator->getErrors();
            throw new InvalidArgumentException(implode(' ', array_pop($errors)));
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->email;
    }

    /**
     * @param Email $object
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
        return $this->email;
    }
}
