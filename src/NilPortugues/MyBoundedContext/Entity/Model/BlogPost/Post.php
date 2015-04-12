<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 12:59 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\BlogPost;

use DateTime;
use NilPortugues\MyBoundedContext\Entity\Model\User\UserId;

/**
 * Class Post
 * @package NilPortugues\MyBoundedContext\Entity\Model\Post
 */
class Post
{
    /**
     * @var PostId
     */
    private $postId;

    /**
     * @var \NilPortugues\MyBoundedContext\Entity\Model\User\UserId
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
     * @param PostId    $id
     * @param UserId    $authorId
     * @param PostTitle $title
     * @param PostBody  $body
     * @param DateTime  $createdAt
     */
    public function __construct(PostId $id, UserId $authorId, PostTitle $title, PostBody $body, DateTime $createdAt = null)
    {
        $this->postId = $id;
        $this->authorId = $authorId;
        $this->postTitle = $title;
        $this->postBody = $body;
        $this->createdAt = (null === $createdAt) ? new DateTime() : new DateTime($createdAt);
    }

    /**
     * @return \NilPortugues\MyBoundedContext\Entity\Model\User\UserId
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
     * @return \NilPortugues\MyBoundedContext\Entity\Model\BlogPost\PostBody
     */
    public function getPostBody()
    {
        return $this->postBody;
    }

    /**
     * @param \NilPortugues\MyBoundedContext\Entity\Model\BlogPost\PostBody $postBody
     *
     * @return $this
     */
    public function setPostBody(PostBody $postBody)
    {
        $this->postBody = $postBody;
        return $this;
    }

    /**
     * @return \NilPortugues\MyBoundedContext\Entity\Model\BlogPost\PostId
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @return \NilPortugues\MyBoundedContext\Entity\Model\BlogPost\PostTitle
     */
    public function getPostTitle()
    {
        return $this->postTitle;
    }

    /**
     * @param \NilPortugues\MyBoundedContext\Entity\Model\BlogPost\PostTitle $postTitle
     *
     * @return $this
     */
    public function setPostTitle(PostTitle $postTitle)
    {
        $this->postTitle = $postTitle;
        return $this;
    }
}