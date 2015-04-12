<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:05 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\BlogPost\Factory;

/**
 * Class PostFactoryInterface
 * @package NilPortugues\MyBoundedContext\Entity\Model\BlogPost\Factory
 */
interface PostFactoryInterface
{
    /**
     * @param $id
     * @param $authorId
     * @param $title
     * @param $body
     * @param $createdAt
     *
     * @return mixed
     */
    public static function create($id, $authorId, $title, $body, $createdAt);
}
