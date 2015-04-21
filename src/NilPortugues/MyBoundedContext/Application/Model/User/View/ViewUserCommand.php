<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:58 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\User\View;

/**
 * Class ViewUserCommand
 * @package NilPortugues\MyBoundedContext\Application\Model\User\View
 */
class ViewUserCommand
{
    /**
     * @var string
     */
    private $userId;

    /**
     * @param $userId
     */
    public function __construct($userId)
    {
        $this->userId = (string)$userId;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
