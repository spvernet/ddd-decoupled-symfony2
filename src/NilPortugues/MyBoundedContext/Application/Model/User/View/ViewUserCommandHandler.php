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

use InvalidArgumentException;
use NilPortugues\CommandBus\Abstraction\CommandHandler;
use NilPortugues\MyBoundedContext\Entity\Model\User\Repository\UserNotFoundException;
use NilPortugues\MyBoundedContext\Entity\Model\User\Repository\UserRepositoryInterface;
use NilPortugues\MyBoundedContext\Entity\Model\User\UserId;

/**
 * Class ViewUserCommandHandler
 * @package NilPortugues\MyBoundedContext\Application\Model\User\View
 */
class ViewUserCommandHandler implements CommandHandler
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var ViewUserResponse
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
     * @param ViewUserCommand $request
     *
     * @return ViewUserResponse
     * @throws \InvalidArgumentException
     */
    public function handle($request)
    {
        try {
            $user = $this->userRepository->find(new UserId($request->getUserId()));

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

    /**
     * @return ViewUserResponse
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
