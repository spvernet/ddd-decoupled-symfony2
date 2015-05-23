<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:58 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Blog\Post\ViewPost\Command;

use NilPortugues\CommandBus\CommandHandler;
use NilPortugues\MyBoundedContext\Entity\Blog\Post\Validator\PostIdValidator;

/**
 * Class ViewPostCommand
 * @package NilPortugues\MyBoundedContext\Application\Post\ViewPost\Command
 */
class ViewPostCommandValidator implements CommandHandler
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
     * @var bool
     */
    private $result;

    /**
     *
     */
    public function __construct()
    {
        $this->validator = new PostIdValidator();
    }

    /**
     * @param ViewPostCommand $command
     */
    public function handle($command)
    {
        $result = $this->validator->isValid($command->getPostId());

        if (false === $result) {
            $this->errors = $this->validator->getErrors();
        }

        $this->result = $result;
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

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }
}
