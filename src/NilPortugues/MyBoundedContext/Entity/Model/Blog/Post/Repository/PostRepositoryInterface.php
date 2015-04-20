<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 1:40 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContext\Entity\Model\Blog\Post\Repository;

use NilPortugues\MyBoundedContext\Entity\Model\Blog\Post\PostId;

/**
 * Interface PostRepositoryInterface
 * @package NilPortugues\MyBoundedContext\Entity\Model\Blog\Post\Repository
 */
interface PostRepositoryInterface
{
    /**
     * @param PostId $postId
     *
     * @return PostId
     * @throws PostNotFoundException
     */
    public function find(PostId $postId);
}
