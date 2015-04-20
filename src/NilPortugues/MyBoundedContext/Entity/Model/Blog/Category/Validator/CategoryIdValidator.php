<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 8:06 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\Validator;

use NilPortugues\Validator\Validator;

/**
 * Class CategoryIdValidator
 * @package NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\Validator
 */
class CategoryIdValidator
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
     * @param $categoryId
     *
     * @return bool
     */
    public function isValid($categoryId)
    {
        $stringValidator = $this->validator
            ->isString('categoryId')
            ->isUUID(true);

        $isValid = $stringValidator->validate($categoryId);

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
