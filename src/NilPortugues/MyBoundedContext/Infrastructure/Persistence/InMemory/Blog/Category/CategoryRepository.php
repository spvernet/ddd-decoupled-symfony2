<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 2:15 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Infrastructure\Persistence\InMemory\Blog\Category;

use NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\Category;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\CategoryId;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\Repository\CategoryNotFoundException;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\Repository\CategoryRepositoryInterface;
use NilPortugues\MyBoundedContext\Infrastructure\Factory\Blog\Category\CategoryFactory;

/**
 * Class CategoryRepository
 * @package NilPortugues\MyBoundedContext\Infrastructure\Persistence\InMemory\Blog\Category
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var array
     */
    private $db = [];

    /**
     * @param array $categories
     */
    public function __construct(array $categories)
    {
        foreach ($categories as $category) {
            $categoryId = $category['categoryId'];
            $this->db[$categoryId] = CategoryFactory::create(
                $categoryId,
                $category['name'],
                $category['createdAt']
            );
        }
    }

    /**
     * @param CategoryId $categoryId
     *
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function find(CategoryId $categoryId)
    {
        $categoryId = $categoryId->get();
        if (false === array_key_exists($categoryId, $this->db)) {
            throw new CategoryNotFoundException(sprintf('Category with id %s not found', $categoryId));
        }

        return clone $this->db[$categoryId];
    }
}
