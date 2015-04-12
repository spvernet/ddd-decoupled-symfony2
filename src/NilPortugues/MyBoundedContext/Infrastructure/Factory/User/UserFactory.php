<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 11:50 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NilPortugues\MyBoundedContext\Infrastructure\Factory\User;

use NilPortugues\MyBoundedContext\Entity\Model\User\Email;
use NilPortugues\MyBoundedContext\Entity\Model\User\User;
use NilPortugues\MyBoundedContext\Entity\Model\User\UserId;
use NilPortugues\MyBoundedContext\Entity\Model\User\UserName;

/**
 * Class UserFactory
 */
class UserFactory
{
    /**
     * @param $userId
     * @param $username
     * @param $email
     *
     * @return User
     */
    public static function create($userId, $username, $email)
    {
        return new User(
            new UserId($userId),
            new UserName($username),
            new Email($email)
        );
    }
}
