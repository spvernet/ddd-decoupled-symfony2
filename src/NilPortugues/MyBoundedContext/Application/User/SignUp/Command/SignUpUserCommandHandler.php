<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:09 PM
 *
 * For the full copyright and license information, please SignUp the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\User\SignUp\Command;

use DateTime;
use InvalidArgumentException;
use NilPortugues\MyBoundedContext\Application\CommandHandler;
use NilPortugues\MyBoundedContext\Entity\User\Repository\UserRepositoryInterface;
use NilPortugues\MyBoundedContext\Infrastructure\Factory\User\UserFactory;

/**
 * Class SignUpUserCommandHandler
 * @package NilPortugues\MyBoundedContext\Application\User\SignUp
 */
class SignUpUserCommandHandler extends CommandHandler
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param SignUpUserCommand $command
     *
     * @throws \InvalidArgumentException
     */
    public function handle($command)
    {
        $user = UserFactory::create(
            null,
            $command->getUsername(),
            $command->getEmail(),
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
}
