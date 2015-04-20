<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:05 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\Factory;

/**
 * Class CategoryFactoryInterface
 * @package NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\Factory
 */
interface CategoryFactoryInterface
{
    /**
     * @param $id
     * @param $name
     * @param $createdAt
     * @return mixed
     */
    public static function create($id, $name, $createdAt);
}
