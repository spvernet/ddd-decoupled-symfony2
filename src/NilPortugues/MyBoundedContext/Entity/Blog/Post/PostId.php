<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:00 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Blog\Post;

use InvalidArgumentException;
use NilPortugues\MyBoundedContext\Entity\Blog\Post\Validator\PostIdValidator;
use NilPortugues\Uuid\Uuid;

/**
 * Class PostId
 * @package NilPortugues\MyBoundedContext\Entity\Post
 */
class PostId
{
    /**
     * @param string $id
     */
    public function __construct($id = null)
    {
        if (null !== $id) {
            $this->validate($id);
        }

        $this->id = (null === $id) ? Uuid::create() : $id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->id;
    }

    /**
     * @param PostId $object
     *
     * @return bool
     */
    public function equals($object)
    {
        return $object->get() === $this->get();
    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->id;
    }

    /**
     * @param $id
     *
     * @throws \InvalidArgumentException
     */
    private function validate($id)
    {
        $validator = new PostIdValidator();

        if (false === $validator->isValid($id)) {
            $errors = $validator->getErrors();
            throw new InvalidArgumentException(implode(' ', array_pop($errors)));
        }
    }
}
