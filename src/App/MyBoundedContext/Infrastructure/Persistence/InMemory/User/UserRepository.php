<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:05 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\MyBoundedContext\Infrastructure\Persistence\InMemory\User;

use App\MyBoundedContext\Entity\Model\User\Repository\UserNotFoundException;
use App\MyBoundedContext\Entity\Model\User\Repository\UserRepositoryInterface;
use App\MyBoundedContext\Entity\Model\User\User;


/**
 * Class UserRepositoryInterface
 * @package App\MyBoundedContext\Infrastructure\Persistence\InMemory\User
 */
class UserRepository implements UserRepositoryInterface
{
    private $db = [];

    /**
     * @param array $users
     */
    public function __construct(array $users)
    {
        foreach($users as $user) {
            $userId = $user['userId'];
            $this->db[$userId] = new User($userId, $user['username'], $user['email']);
        }
    }

    /**
     * @param $userId
     *
     * @return User
     * @throws UserNotFoundException
     */
    public function find($userId)
    {
        if (false === array_key_exists($userId, $this->db)) {
           throw new UserNotFoundException(sprintf('User with id %s not found', $userId));
        }

        return clone $this->db[$userId];
    }
} 