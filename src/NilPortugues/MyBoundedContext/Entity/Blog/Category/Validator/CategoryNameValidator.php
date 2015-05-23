<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 8:07 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Blog\Category\Validator;

use NilPortugues\Validator\Validator;

/**
 * Class CategoryNameValidator
 * @package NilPortugues\MyBoundedContext\Entity\Blog\Category\Validator
 */
class CategoryNameValidator
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
     * @param $postId
     *
     * @return bool
     */
    public function isValid($postId)
    {
        $stringValidator = $this->validator
            ->isString('categoryName')
            ->isNotNull()
            ->isBetween(3, 40, true)
            ->hasPrintableCharsOnly();

        $isValid = $stringValidator->validate($postId);

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
