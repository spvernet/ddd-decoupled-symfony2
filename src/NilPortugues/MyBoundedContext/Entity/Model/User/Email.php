<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 11:51 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\User;

use InvalidArgumentException;
use NilPortugues\MyBoundedContext\Entity\Model\User\Validator\EmailValidator;

/**
 * Class Email
 * @package NilPortugues\MyBoundedContext\Entity\Model\User
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
     * @return string
     */
    public function get()
    {
        return $this->email;
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
     * @param $email
     *
     * @throws InvalidArgumentException
     */
    private function validate($email)
    {
        $validator = new EmailValidator();

        if (false === $validator->isValid($email)) {
            throw new InvalidArgumentException(implode(' ', $validator->getErrors()));
        }
    }
}
