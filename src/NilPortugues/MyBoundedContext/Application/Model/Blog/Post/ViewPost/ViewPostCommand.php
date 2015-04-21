<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:58 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\Blog\Post\ViewPost;

/**
 * Class ViewPostCommand
 * @package NilPortugues\MyBoundedContext\Application\Model\Blog\Post\ViewPost
 */
class ViewPostCommand
{
    /**
     * @var string
     */
    private $postId;

    /**
     * @param $postId
     */
    public function __construct($postId)
    {
        $this->postId = (string)$postId;
    }

    /**
     * @return string
     */
    public function getPostId()
    {
        return $this->postId;
    }
}
