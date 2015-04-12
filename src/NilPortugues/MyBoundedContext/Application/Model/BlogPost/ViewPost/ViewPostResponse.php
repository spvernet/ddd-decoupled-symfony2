<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 5:02 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\BlogPost\ViewPost;

/**
 * Class ViewPostResponse
 * @package NilPortugues\MyBoundedContext\Application\Model\BlogPost\ViewPost
 */
class ViewPostResponse
{
    /**
     * @var string
     */
    private $postId;
    /**
     * @var string
     */
    private $authorId;
    /**
     * @var string
     */
    private $createdAt;
    /**
     * @var string
     */
    private $postTitle;

    /**
     * @var string
     */
    private $postBody;

    /**
     * @param string $postId
     * @param string $authorId
     * @param string $createdAt
     * @param string $postTitle
     * @param string $postBody
     */
    public function __construct($postId, $authorId, $createdAt, $postTitle, $postBody)
    {
        $this->postId = (string) $postId;
        $this->authorId = (string) $authorId;
        $this->createdAt = (string) $createdAt;
        $this->postTitle = (string) $postTitle;
        $this->postBody = (string) $postBody;
    }

    /**
     * @return string
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getPostBody()
    {
        return $this->postBody;
    }

    /**
     * @return string
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @return string
     */
    public function getPostTitle()
    {
        return $this->postTitle;
    }
}
