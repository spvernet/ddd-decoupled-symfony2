<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:40 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Blog\Category\Repository;

use NilPortugues\MyBoundedContext\Entity\Blog\Category\CategoryId;

/**
 * Interface CategoryRepositoryInterface
 * @package NilPortugues\MyBoundedContext\Entity\Blog\Category\Repository
 */
interface CategoryRepositoryInterface
{
    /**
     * @param CategoryId $categoryId
     *
     * @return CategoryId
     * @throws CategoryNotFoundException
     */
    public function find(CategoryId $categoryId);
}
