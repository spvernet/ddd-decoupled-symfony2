<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 4/12/15
 * Time: 6:06 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\MyBoundedContextBundle\Controller;

use NilPortugues\MyBoundedContext\Application\Model\BlogPost\ViewPost\ViewPostRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class BlogPostController
 * @package NilPortugues\MyBoundedContextBundle\Controller
 */
class BlogPostController extends Controller
{
    const VIEW_POST = 'nil_portugues.my_bounded_context.application.model.blog_post.view_post.view_post_use_case';
    const TWIG_VIEW_POST = 'NilPortuguesMyBoundedContextBundle:BlogPost:post.html.twig';

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewPostAction(Request $request)
    {
        try {
            $viewPost = $this->get(self::VIEW_POST);

            return $this->render(
                self::TWIG_VIEW_POST,
                ['post' =>  $viewPost->execute(new ViewPostRequest($request->get('id')))]
            );
        } catch (\InvalidArgumentException $e) {
            return $this
                ->render(self::TWIG_VIEW_POST, ['error_msg' => $e->getMessage()])
                ->setStatusCode(404);
        }
    }
}
