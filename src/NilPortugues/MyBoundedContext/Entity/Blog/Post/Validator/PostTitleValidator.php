<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:40 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Blog\Post\Validator;

use NilPortugues\Validator\Validator;

/**
 * Class PostTitleValidator
 * @package NilPortugues\MyBoundedContext\Entity\Blog\Post\Validator
 */
class PostTitleValidator
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
        $this->validator = Validator::create();
    }

    /**
     * @param $postId
     *
     * @return bool
     */
    public function isValid($postId)
    {
        $stringValidator = $this->validator
            ->isString('postTitle')
            ->isNotNull()
            ->isBetween(3, 80, true)
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
