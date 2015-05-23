<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:04 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\User\Repository;

use NilPortugues\MyBoundedContext\Entity\User\User;
use NilPortugues\MyBoundedContext\Entity\User\UserId;

/**
 * Class UserRepositoryInterface
 * @package NilPortugues\MyBoundedContext\Entity\User\Repository
 */
interface UserRepositoryInterface
{
    /**
     * @param UserId $userId
     *
     * @return User
     * @throws UserNotFoundException
     */
    public function find(UserId $userId);
}
