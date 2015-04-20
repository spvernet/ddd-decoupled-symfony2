<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:58 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\Blog\Post\ViewPost;

use NilPortugues\MyBoundedContext\Entity\Model\Blog\Post\Validator\PostIdValidator;

/**
 * Class ViewPostCommand
 * @package NilPortugues\MyBoundedContext\Application\Model\Post\ViewPost
 */
class ViewPostCommandValidator
{
    /**
     * @var array
     */
    private $errors = [];

    /**
     * @var
     */
    private $validator;

    /**
     *
     */
    public function __construct()
    {
        $this->validator = new PostIdValidator();
    }

    /**
     * @param ViewPostCommand $command
     *
     * @return bool
     */
    public function handle(ViewPostCommand $command)
    {
        $result = $this->validator->isValid($command->getPostId());

        if (false === $result) {
            $this->errors = $this->validator->getErrors();
        }

        return $result;
    }

    /**
     * Returns an array containing error messages.
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
