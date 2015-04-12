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

use NilPortugues\MyBoundedContext\Application\Model\BlogPost\ViewPost\ViewPostCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class BlogPostController
 * @package NilPortugues\MyBoundedContextBundle\Controller
 */
class BlogPostController extends Controller
{
    const VALIDATION_BUS = 'validation_bus';
    const TWIG_VIEW_POST = 'NilPortuguesMyBoundedContextBundle:BlogPost:post.html.twig';

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewPostAction(Request $request)
    {
        $commandBus = $this->get(self::VALIDATION_BUS);

        try {
            $response = $commandBus->handle(new ViewPostCommand($request->get('id')));
            return $this->render(self::TWIG_VIEW_POST, ['post' =>  $response]);
        } catch (\Exception $e) {
            return $this
                ->render(self::TWIG_VIEW_POST, ['error_msg' => $commandBus->getErrors()])
                ->setStatusCode(404);
        }
    }
}
