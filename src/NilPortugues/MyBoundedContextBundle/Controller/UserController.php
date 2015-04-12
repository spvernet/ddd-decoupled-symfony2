<?php

namespace NilPortugues\MyBoundedContextBundle\Controller;

use NilPortugues\MyBoundedContext\Application\Model\User\ViewUser\ViewUserRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserController
 * @package NilPortugues\MyBoundedContextBundle\Controller
 */
class UserController extends Controller
{
    const VIEW_USER = 'nil_portugues.my_bounded_context.application.model.user.view_user.view_user_use_case';
    const TWIG_VIEW_USER = 'NilPortuguesMyBoundedContextBundle:User:user.html.twig';

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewUserAction(Request $request)
    {
        try {
            $viewUser = $this->get(self::VIEW_USER);

            return $this->render(
                self::TWIG_VIEW_USER,
                ['user' =>  $viewUser->execute(new ViewUserRequest($request->get('id')))]
            );
        } catch (\InvalidArgumentException $e) {
            return $this
                ->render(self::TWIG_VIEW_USER, ['error_msg' => $e->getMessage()])
                ->setStatusCode(404);
        }
    }
}
