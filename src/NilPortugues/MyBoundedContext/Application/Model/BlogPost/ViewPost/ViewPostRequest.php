<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 3/21/15
 * Time: 4:58 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Application\Model\BlogPost\ViewPost;

/**
 * Class ViewPostRequest
 * @package NilPortugues\MyBoundedContext\Application\Model\BlogPost\ViewPost
 */
class ViewPostRequest
{
    private $postId;

    /**
     * @param $postId
     */
    public function __construct($postId)
    {
        $this->postId = $postId;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }
}
