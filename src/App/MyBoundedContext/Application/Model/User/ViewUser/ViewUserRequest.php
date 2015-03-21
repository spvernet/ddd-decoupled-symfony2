<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:58 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\MyBoundedContext\Application\Model\User\ViewUser;


/**
 * Class ViewUserRequest
 * @package App\MyBoundedContext\Application\Model\User\ViewUser
 */
class ViewUserRequest
{
    private $userId;

    /**
     * @param $userId
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }
} 