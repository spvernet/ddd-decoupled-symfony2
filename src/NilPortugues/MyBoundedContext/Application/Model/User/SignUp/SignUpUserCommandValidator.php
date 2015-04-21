<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:58 PM
 *
 * For the full copyright and license information, please SignUp the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\User\SignUp;

use NilPortugues\MyBoundedContext\Entity\Model\User\Validator\EmailValidator;
use NilPortugues\MyBoundedContext\Entity\Model\User\Validator\UserNameValidator;

/**
 * Class SignUpUserCommand
 * @package NilPortugues\MyBoundedContext\Application\Model\User\SignUp
 */
class SignUpUserCommandValidator
{
    /**
     * @var array
     */
    private $errors = [];
    /**
     * @var UserNameValidator
     */
    private $username;
    /**
     * @var EmailValidator
     */
    private $email;

    /**
     *
     */
    public function __construct()
    {
        $this->username = new UserNameValidator();
        $this->email = new EmailValidator();
    }

    /**
     * @param SignUpUserCommand $command
     *
     * @return bool
     */
    public function handle(SignUpUserCommand $command)
    {
        $isValid = [];
        $isValid[] = $this->username->isValid($command->getUsername());
        $isValid[] = $this->email->isValid($command->getEmail());

        $result = array_search(false, $isValid, true);
        $this->buildErrorArray($result);

        return $result;
    }

    /**
     * @param $result
     */
    private function buildErrorArray($result)
    {
        if (false === $result) {
            $this->errors = array_merge(
                $this->username->getErrors(),
                $this->email->getErrors()
            );
        }
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
