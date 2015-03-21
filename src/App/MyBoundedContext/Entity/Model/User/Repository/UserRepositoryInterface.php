<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:04 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\MyBoundedContext\Entity\Model\User\Repository;

use App\MyBoundedContext\Entity\Model\User\User;


/**
 * Class UserRepositoryInterface
 * @package App\MyBoundedContext\Entity\Model\User\Repository
 */
interface UserRepositoryInterface
{
    /**
     * @param $userId
     *
     * @return User
     * @throws UserNotFoundException
     */
    public function find($userId);
} 