<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 2:15 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Infrastructure\Persistence\InMemory\BlogPost;

use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\Post;
use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\PostId;
use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\Repository\PostNotFoundException;
use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\Repository\PostRepositoryInterface;
use NilPortugues\MyBoundedContext\Infrastructure\Factory\BlogPost\PostFactory;

/**
 * Class PostRepository
 * @package NilPortugues\MyBoundedContext\Infrastructure\Persistence\InMemory\BlogPost
 */
class PostRepository implements PostRepositoryInterface
{
    /**
     * @var array
     */
    private $db = [];

    /**
     * @param array $posts
     */
    public function __construct(array $posts)
    {
        foreach ($posts as $post) {
            $postId = $post['postId'];
            $this->db[$postId] = PostFactory::create(
                $postId,
                $post['authorId'],
                $post['title'],
                $post['body'],
                $post['createdAt']
            );
        }
    }

    /**
     * @param PostId $postId
     *
     * @return Post
     * @throws PostNotFoundException
     */
    public function find(PostId $postId)
    {
        $postId = $postId->get();
        if (false === array_key_exists($postId, $this->db)) {
            throw new PostNotFoundException(sprintf('Post with id %s not found', $postId));
        }

        return clone $this->db[$postId];
    }
}
