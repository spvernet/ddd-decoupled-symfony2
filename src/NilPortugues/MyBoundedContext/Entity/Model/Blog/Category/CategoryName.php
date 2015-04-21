<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:21 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\Blog\Category;

use InvalidArgumentException;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Category\Validator\CategoryNameValidator;

/**
 * Class CategoryName
 * @package NilPortugues\MyBoundedContext\Entity\Model\Blog\Category
 */
class CategoryName
{
    /**
     * @var string
     */
    private $categoryName;

    /**
     * @param $categoryName
     */
    public function __construct($categoryName)
    {
        $this->validate($categoryName);
        $this->categoryName = (string)$categoryName;
    }

    /**
     * @param $categoryName
     *
     * @throws \InvalidArgumentException
     */
    private function validate($categoryName)
    {
        $validator = new CategoryNameValidator();

        if (false === $validator->isValid($categoryName)) {
            $errors = $validator->getErrors();
            throw new InvalidArgumentException(implode(' ', array_pop($errors)));
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->categoryName;
    }

    /**
     * @param CategoryName $object
     *
     * @return bool
     */
    public function equals(self $object)
    {
        return $this->get() === $object->get();
    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->categoryName;
    }
}
