<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 11:59 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\User\Validator;

use NilPortugues\Validator\Validator;

/**
 * Class EmailValidator
 * @package NilPortugues\MyBoundedContext\Entity\Model\User\Validator
 */
class EmailValidator
{
    /**
     * @var \NilPortugues\Validator\Validator
     */
    private $validator;

    /**
     * @var array
     */
    private $errors = [];

    /**
     *
     */
    public function __construct()
    {
        $this->validator = new Validator();
    }

    /**
     * @param $email
     *
     * @return bool
     */
    public function isValid($email)
    {
        $stringValidator = $this->validator->isString('email')->isEmail();
        $isValid         = $stringValidator->validate($email);

        if (false === $isValid) {
            $this->errors = $stringValidator->getErrors();
        }

        return $isValid;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors['email'];
    }
}
