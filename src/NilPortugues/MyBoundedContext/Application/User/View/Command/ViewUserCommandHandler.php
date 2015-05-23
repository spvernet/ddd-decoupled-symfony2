<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:09 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\User\View\Command;

use InvalidArgumentException;
use NilPortugues\MyBoundedContext\Application\CommandHandler;
use NilPortugues\MyBoundedContext\Entity\User\Repository\UserRepositoryInterface;
use NilPortugues\MyBoundedContext\Entity\User\Repository\UserNotFoundException;
use NilPortugues\MyBoundedContext\Entity\User\UserId;

/**
 * Class ViewUserCommandHandler
 * @package NilPortugues\MyBoundedContext\Application\User\View
 */
class ViewUserCommandHandler extends CommandHandler
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
     * @param ViewUserCommand $command
     *
     * @throws \InvalidArgumentException
     */
    public function handle($command)
    {
        try {
            $user = $this->userRepository->find(new UserId($command->getUserId()));

            $this->result = new ViewUserResponse(
                $user->getUserId()->get(),
                $user->getUsername()->get(),
                $user->getEmail()->get(),
                $user->getRegisteredOn()->format('Y-m-d H:i:s')
            );
        } catch (UserNotFoundException $e) {
            $this->errors = $e->getMessage();
            throw new InvalidArgumentException($e->getMessage());
        }
    }
}
