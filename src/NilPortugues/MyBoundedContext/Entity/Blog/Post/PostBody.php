<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:02 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Blog\Post;

use InvalidArgumentException;
use NilPortugues\MyBoundedContext\Entity\Blog\Post\Validator\PostBodyValidator;

/**
 * Class PostBody
 * @package NilPortugues\MyBoundedContext\Entity\Blog\Post
 */
class PostBody
{
    /**
     * @var string
     */
    private $postBody;

    /**
     * @param $postBody
     */
    public function __construct($postBody)
    {
        $this->validate($postBody);
        $this->postBody = (string)$postBody;
    }

    /**
     * @param $postBody
     *
     * @throws \InvalidArgumentException
     */
    private function validate($postBody)
    {
        $validator = new PostBodyValidator();

        if (false === $validator->isValid($postBody)) {
            $errors = $validator->getErrors();
            throw new InvalidArgumentException(implode(' ', array_pop($errors)));
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->postBody;
    }

    /**
     * @param PostBody $object
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
        return $this->postBody;
    }
}
