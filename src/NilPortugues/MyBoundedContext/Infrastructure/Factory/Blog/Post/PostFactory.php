<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:06 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Infrastructure\Factory\Blog\Post;

use DateTime;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Post\Factory\PostFactoryInterface;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Post\Post;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Post\PostBody;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Post\PostId;
use NilPortugues\MyBoundedContext\Entity\Model\Blog\Post\PostTitle;
use NilPortugues\MyBoundedContext\Entity\Model\User\UserId;

/**
 * Class PostFactoryInterface
 * @package NilPortugues\MyBoundedContext\Infrastructure\Factory\Blog\Post
 */
class PostFactory implements PostFactoryInterface
{
    /**
     * @param      $id
     * @param      $authorId
     * @param      $title
     * @param      $body
     * @param null $createdAt
     *
     * @return Post
     */
    public static function create($id, $authorId, $title, $body, $createdAt = null)
    {
        return new Post(
            new PostId($id),
            new UserId($authorId),
            new PostTitle($title),
            new PostBody($body),
            (null === $createdAt) ? new DateTime() : new DateTime($createdAt)
        );
    }
}
