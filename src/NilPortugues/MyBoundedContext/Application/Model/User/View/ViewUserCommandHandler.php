<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:09 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\User\View;

use NilPortugues\MyBoundedContext\Entity\Model\User\Repository\UserNotFoundException;
use NilPortugues\MyBoundedContext\Entity\Model\User\Repository\UserRepositoryInterface;
use InvalidArgumentException;
use NilPortugues\MyBoundedContext\Entity\Model\User\UserId;

/**
 * Class ViewUserCommandHandler
 * @package NilPortugues\MyBoundedContext\Application\Model\User\View
 */
class ViewUserCommandHandler
{
    private $userRepository;
    
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ViewUserCommand $request
     *
     * @return ViewUserResponse
     * @throws \InvalidArgumentException
     */
    public function handle(ViewUserCommand $request)
    {
        try {
            $user = $this->userRepository->find(new UserId($request->getUserId()));

            return new ViewUserResponse(
                $user->getUserId()->get(),
                $user->getUsername()->get(),
                $user->getEmail()->get(),
                $user->getRegisteredOn()->format('Y-m-d H:i:s')
            );
        } catch (UserNotFoundException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }
}
