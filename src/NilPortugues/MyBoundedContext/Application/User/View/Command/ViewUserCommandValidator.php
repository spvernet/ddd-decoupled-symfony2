<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:58 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\User\View\Command;

use NilPortugues\MyBoundedContext\Application\CommandHandler;
use NilPortugues\MyBoundedContext\Entity\User\Validator\UserIdValidator;

/**
 * Class ViewUserCommand
 * @package NilPortugues\MyBoundedContext\Application\User\View\Command
 */
class ViewUserCommandValidator extends CommandHandler
{
    /**
     * @var
     */
    private $validator;
    /**
     *
     */
    public function __construct()
    {
        $this->validator = new UserIdValidator();
    }

    /**
     * @param ViewUserCommand $command
     */
    public function handle($command)
    {
        $result = $this->validator->isValid($command->getUserId());

        if (false === $result) {
            $this->errors = $this->validator->getErrors();
        }

        $this->result = $result;
    }
}
