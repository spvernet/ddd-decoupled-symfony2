<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:09 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\BlogPost\ViewPost;

use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\Post;
use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\Repository\PostNotFoundException;
use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\Repository\PostRepositoryInterface;
use InvalidArgumentException;
use NilPortugues\MyBoundedContext\Entity\Model\BlogPost\PostId;

/**
 * Class ViewPostCommandHandler
 * @package NilPortugues\MyBoundedContext\Application\Model\BlogPost\ViewPost
 */
class ViewPostCommandHandler
{
    private $postRepository;
    
    /**
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param ViewPostCommand $request
     *
     * @return ViewPostResponse
     * @throws \InvalidArgumentException
     */
    public function handle(ViewPostCommand $request)
    {
        try {
            /** @var Post $post  */
            $post = $this->postRepository->find(new PostId($request->getPostId()));

            return new ViewPostResponse(
                $post->getPostId()->get(),
                $post->getAuthorId()->get(),
                $post->getCreatedAt()->format('Y-m-d H:i:s'),
                $post->getPostTitle()->get(),
                $post->getPostBody()->get()
            );
        } catch (PostNotFoundException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }
}
