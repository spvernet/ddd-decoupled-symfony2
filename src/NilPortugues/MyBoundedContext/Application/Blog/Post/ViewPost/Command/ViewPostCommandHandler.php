<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:09 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Blog\Post\ViewPost\Command;

use InvalidArgumentException;
use NilPortugues\CommandBus\CommandHandler;
use NilPortugues\MyBoundedContext\Entity\Blog\Post\Post;
use NilPortugues\MyBoundedContext\Entity\Blog\Post\PostId;
use NilPortugues\MyBoundedContext\Entity\Blog\Post\Repository\PostNotFoundException;
use NilPortugues\MyBoundedContext\Entity\Blog\Post\Repository\PostRepositoryInterface;

/**
 * Class ViewPostCommandHandler
 * @package NilPortugues\MyBoundedContext\Application\Blog\Post\ViewPost
 */
class ViewPostCommandHandler implements CommandHandler
{
    /**
     * @var \NilPortugues\MyBoundedContext\Entity\Blog\Post\Repository\PostRepositoryInterface
     */
    private $postRepository;

    /**
     * @var ViewPostResponse
     */
    private $result;

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param ViewPostCommand $command
     *
     * @return ViewPostResponse
     * @throws \InvalidArgumentException
     */
    public function handle($command)
    {
        try {
            /** @var Post $post */
            $post = $this->postRepository->find(new PostId($command->getPostId()));

            $this->result = new ViewPostResponse(
                $post->getPostId()->get(),
                $post->getAuthorId()->get(),
                $post->getCreatedAt()->format('Y-m-d H:i:s'),
                $post->getPostTitle()->get(),
                $post->getPostBody()->get()
            );
        } catch (PostNotFoundException $e) {
            $this->errors = $e->getMessage();
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
