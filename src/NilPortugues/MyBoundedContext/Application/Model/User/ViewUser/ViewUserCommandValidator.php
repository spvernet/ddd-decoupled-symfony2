<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:58 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\User\ViewUser;

use NilPortugues\MyBoundedContext\Entity\Model\User\Validator\UserIdValidator;

/**
 * Class ViewUserCommand
 * @package NilPortugues\MyBoundedContext\Application\Model\User\ViewUser
 */
class ViewUserCommandValidator
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
        $this->validator = new UserIdValidator();
    }

    /**
     * @param ViewUserCommand $command
     *
     * @return bool
     */
    public function handle(ViewUserCommand $command)
    {
        $result = $this->validator->isValid($command->getUserId());
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
