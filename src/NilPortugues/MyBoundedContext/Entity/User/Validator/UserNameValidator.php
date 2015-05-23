<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 12:07 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\User\Validator;

use NilPortugues\Validator\Validator;

/**
 * Class UserNameValidator
 * @package NilPortugues\MyBoundedContext\Entity\User\Validator
 */
class UserNameValidator
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
     * @param $username
     *
     * @return bool
     */
    public function isValid($username)
    {
        $stringValidator = $this->validator
            ->isString('username')
            ->isNotNull()
            ->isBetween(3, 20, true)
            ->hasPrintableCharsOnly();

        $isValid = $stringValidator->validate($username);

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
        return $this->errors;
    }
}
