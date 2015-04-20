<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:19 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\Blog\Category;

use DateTime;

/**
 * Class Category
 * @package NilPortugues\MyBoundedContext\Entity\Model\Blog\Category
 */
class Category
{
    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var CategoryId
     */
    private $categoryId;

    /**
     * @var CategoryName
     */
    private $name;

    /**
     * @param CategoryId   $categoryId
     * @param CategoryName $name
     * @param DateTime     $createdAt
     */
    public function __construct(CategoryId $categoryId, CategoryName $name, DateTime $createdAt = null)
    {
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->createdAt = $createdAt;
    }

    /**
     * @param \NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\CategoryName $name
     *
     * @return $this
     */
    public function setName(CategoryName $name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @return \NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\CategoryId
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\CategoryName
     */
    public function getName()
    {
        return $this->name;
    }
}
