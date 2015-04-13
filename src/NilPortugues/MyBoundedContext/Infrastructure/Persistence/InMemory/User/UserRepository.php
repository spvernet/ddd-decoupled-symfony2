<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:05 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Infrastructure\Persistence\InMemory\User;

use NilPortugues\MyBoundedContext\Entity\Model\User\Repository\UserNotFoundException;
use NilPortugues\MyBoundedContext\Entity\Model\User\Repository\UserRepositoryInterface;
use NilPortugues\MyBoundedContext\Entity\Model\User\User;
use NilPortugues\MyBoundedContext\Entity\Model\User\UserId;
use NilPortugues\MyBoundedContext\Infrastructure\Factory\User\UserFactory;

/**
 * Class UserRepositoryInterface
 * @package NilPortugues\MyBoundedContext\Infrastructure\Persistence\InMemory\User
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * @var array
     */
    private $db = [];

    /**
     * @param array $users
     */
    public function __construct(array $users)
    {
        foreach ($users as $user) {
            $userId = $user['email'];
            $this->db[$userId] = UserFactory::create($userId, $user['username'], $user['email'], $user['registeredOn']);
        }
    }

    /**
     * @param UserId $userId
     *
     * @return User
     * @throws UserNotFoundException
     */
    public function find(UserId $userId)
    {
        $userId = $userId->get();
        if (false === array_key_exists($userId, $this->db)) {
            throw new UserNotFoundException(sprintf('User with id %s not found', $userId));
        }

        return clone $this->db[$userId];
    }
}
