<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:58 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\User\View;

use NilPortugues\CommandBus\Abstraction\CommandHandler;
use NilPortugues\MyBoundedContext\Entity\Model\User\Validator\UserIdValidator;

/**
 * Class ViewUserCommand
 * @package NilPortugues\MyBoundedContext\Application\Model\User\View
 */
class ViewUserCommandValidator implements CommandHandler
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
        $this->validator = new UserIdValidator();
    }

    /**
     * @param ViewUserCommand $command
     *
     * @return bool
     */
    public function handle($command)
    {
        $result = $this->validator->isValid($command->getUserId());

        if (false === $result) {
            $this->errors = $this->validator->getErrors();
        }

        $this->result = $result;
    }

    /**
     * @return bool
     */
    public function getResult()
    {
        return $this->result;
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
