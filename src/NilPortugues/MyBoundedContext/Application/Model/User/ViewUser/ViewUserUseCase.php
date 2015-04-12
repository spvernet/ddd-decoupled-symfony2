<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:09 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\User\ViewUser;

use NilPortugues\MyBoundedContext\Entity\Model\User\Repository\UserNotFoundException;
use NilPortugues\MyBoundedContext\Entity\Model\User\Repository\UserRepositoryInterface;
use InvalidArgumentException;
use NilPortugues\MyBoundedContext\Entity\Model\User\UserId;

/**
 * Class ViewUserUseCase
 * @package NilPortugues\MyBoundedContext\Application\Model\User\ViewUser
 */
class ViewUserUseCase
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
     * @param ViewUserRequest $request
     *
     * @return ViewUserResponse
     * @throws \InvalidArgumentException
     */
    public function execute(ViewUserRequest $request)
    {
        try {
            $user = $this->userRepository->find(new UserId($request->getUserId()));

            return new ViewUserResponse(
                $user->getUserId()->get(),
                $user->getUsername()->get(),
                $user->getEmail()->get()
            );
        } catch (UserNotFoundException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }
}
