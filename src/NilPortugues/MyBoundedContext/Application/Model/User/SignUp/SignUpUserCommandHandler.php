<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:09 PM
 *
 * For the full copyright and license information, please SignUp the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\User\SignUp;

use DateTime;
use InvalidArgumentException;
use NilPortugues\CommandBus\Abstraction\CommandHandler;
use NilPortugues\MyBoundedContext\Entity\Model\User\Repository\UserRepositoryInterface;
use NilPortugues\MyBoundedContext\Infrastructure\Factory\User\UserFactory;

/**
 * Class SignUpUserCommandHandler
 * @package NilPortugues\MyBoundedContext\Application\Model\User\SignUp
 */
class SignUpUserCommandHandler implements CommandHandler
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var SignUpUserResponse
     */
    private $result;

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param SignUpUserCommand $request
     *
     * @return SignUpUserResponse
     * @throws \InvalidArgumentException
     */
    public function handle($request)
    {
        $user = UserFactory::create(
            null,
            $request->getUsername(),
            $request->getEmail(),
            new DateTime()
        );

        $this->userRepository->save($user);

        $this->result = new SignUpUserResponse(
            $user->getUserId(),
            $user->getUsername(),
            $user->getEmail(),
            $user->getRegisteredOn()
        );
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
