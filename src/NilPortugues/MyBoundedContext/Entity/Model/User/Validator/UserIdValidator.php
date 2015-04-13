<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 12:09 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\User\Validator;

use NilPortugues\Validator\Validator;

/**
 * Class UserIdValidator
 * @package NilPortugues\MyBoundedContext\Entity\Model\User\Validator
 */
class UserIdValidator
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
     * @param $userId
     *
     * @return bool
     */
    public function isValid($userId)
    {
        $stringValidator = $this->validator->isString('email')->isUUID(true);
        $isValid         = $stringValidator->validate($userId);

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
