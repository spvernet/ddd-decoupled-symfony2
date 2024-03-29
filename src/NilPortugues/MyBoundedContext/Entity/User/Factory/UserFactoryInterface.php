<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 12:48 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\User\Factory;

/**
 * Class UserFactoryInterface
 * @package NilPortugues\MyBoundedContext\Entity\User\Factory
 */
interface UserFactoryInterface
{
    /**
     * @param $userId
     * @param $username
     * @param $email
     * @param $registeredOn
     *
     *
     * @return \NilPortugues\MyBoundedContext\Entity\User\User
     */
    public static function create($userId, $username, $email, $registeredOn);
}
