<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:01 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\BlogPost;

use InvalidArgumentException;
use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\Validator\PostTitleValidator;

/**
 * Class PostTitle
 * @package NilPortugues\MyBoundedContext\Entity\Model\Post
 */
class PostTitle
{
    /**
     * @var string
     */
    private $postTitle;

    /**
     * @param $postTitle
     */
    public function __construct($postTitle)
    {
        $this->validate($postTitle);
        $this->postTitle = (string)$postTitle;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->postTitle;
    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->postTitle;
    }

    /**
     * @param PostTitle $object
     *
     * @return bool
     */
    public function equals(self $object)
    {
        return $this->get() === $object->get();
    }


    /**
     * @param $postTitle
     *
     * @throws \InvalidArgumentException
     */
    private function validate($postTitle)
    {
        $validator = new PostTitleValidator();

        if (false === $validator->isValid($postTitle)) {
            throw new InvalidArgumentException(implode(' ', array_pop($validator->getErrors())));
        }
    }
}