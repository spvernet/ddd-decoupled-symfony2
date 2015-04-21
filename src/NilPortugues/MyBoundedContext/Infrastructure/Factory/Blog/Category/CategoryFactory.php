<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:06 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Infrastructure\Factory\Blog\Category;

use DateTime;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\Category;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\CategoryId;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\CategoryName;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\Factory\CategoryFactoryInterface;

/**
 * Class CategoryFactoryInterface
 * @package NilPortugues\MyBoundedContext\Infrastructure\Factory\Blog\Category
 */
class CategoryFactory implements CategoryFactoryInterface
{
    /**
     * @param $id
     * @param $name
     * @param null $createdAt
     * @return Category
     */
    public static function create($id, $name, $createdAt = null)
    {
        return new Category(
            new CategoryId($id),
            new CategoryName($name),
            (null === $createdAt) ? new DateTime() : new DateTime($createdAt)
        );
    }
}
