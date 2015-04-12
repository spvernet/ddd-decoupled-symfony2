<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:06 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Infrastructure\Factory\BlogPost;

use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\Factory\PostFactoryInterface;
use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\Post;
use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\PostBody;
use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\PostId;
use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\PostTitle;
use NilPortugues\MyBoundedContext\Entity\Model\User\UserId;
use DateTime;

/**
 * Class PostFactoryInterface
 * @package NilPortugues\MyBoundedContext\Infrastructure\Factory\BlogPost
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
