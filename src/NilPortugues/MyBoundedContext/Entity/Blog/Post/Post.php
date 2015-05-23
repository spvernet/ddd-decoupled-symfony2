<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 12:59 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Blog\Post;

use DateTime;
use NilPortugues\MyBoundedContext\Entity\User\UserId;

/**
 * Class Post
 * @package NilPortugues\MyBoundedContext\Entity\Post
 */
class Post
{
    /**
     * @var PostId
     */
    private $postId;

    /**
     * @var \NilPortugues\MyBoundedContext\Entity\User\UserId
     */
    private $authorId;

    /**
     * @var PostTitle
     */
    private $postTitle;

    /**
     * @var PostBody
     */
    private $postBody;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @param PostId $id
     * @param UserId $authorId
     * @param PostTitle $title
     * @param PostBody $body
     * @param DateTime $createdAt
     */
    public function __construct(
        PostId $id,
        UserId $authorId,
        PostTitle $title,
        PostBody $body,
        DateTime $createdAt = null
    ) {
        $this->postId = $id;
        $this->authorId = $authorId;
        $this->postTitle = $title;
        $this->postBody = $body;
        $this->createdAt = (null === $createdAt) ? new DateTime() : $createdAt;
    }

    /**
     * @return \NilPortugues\MyBoundedContext\Entity\User\UserId
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \NilPortugues\MyBoundedContext\Entity\Blog\Post\PostBody
     */
    public function getPostBody()
    {
        return $this->postBody;
    }

    /**
     * @param \NilPortugues\MyBoundedContext\Entity\Blog\Post\PostBody $postBody
     *
     * @return $this
     */
    public function setPostBody(PostBody $postBody)
    {
        $this->postBody = $postBody;
        return $this;
    }

    /**
     * @return \NilPortugues\MyBoundedContext\Entity\Blog\Post\PostId
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @return \NilPortugues\MyBoundedContext\Entity\Blog\Post\PostTitle
     */
    public function getPostTitle()
    {
        return $this->postTitle;
    }

    /**
     * @param \NilPortugues\MyBoundedContext\Entity\Blog\Post\PostTitle $postTitle
     *
     * @return $this
     */
    public function setPostTitle(PostTitle $postTitle)
    {
        $this->postTitle = $postTitle;
        return $this;
    }
}
