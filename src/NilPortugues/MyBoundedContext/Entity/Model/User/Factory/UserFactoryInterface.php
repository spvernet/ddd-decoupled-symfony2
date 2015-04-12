<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 12:48 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\User\Factory;

/**
 * Class UserFactoryInterface
 * @package NilPortugues\MyBoundedContext\Entity\Model\User\Factory
 */
interface UserFactoryInterface
{
    /**
     * @param $userId
     * @param $username
     * @param $email
     *
     * @return \NilPortugues\MyBoundedContext\Entity\Model\User\User
     */
    public static function create($userId, $username, $email);
}
