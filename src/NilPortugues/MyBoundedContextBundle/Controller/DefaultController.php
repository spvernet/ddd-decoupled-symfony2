<?php

namespace NilPortugues\MyBoundedContextBundle\Controller;

use NilPortugues\MyBoundedContext\Application\Model\User\ViewUser\ViewUserRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package NilPortugues\MyBoundedContextBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(
            'NilPortuguesMyBoundedContextBundle:Default:index.html.twig'
        );
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loadUserAction(Request $request)
    {
        try {
            /** @var \NilPortugues\MyBoundedContext\Application\Model\User\ViewUser\ViewUserUseCase $viewUser */
            $viewUser = $this->get(
                'nil_portugues.my_bounded_context.application.model.user.view_user.view_user_use_case'
            );

            $request = new ViewUserRequest($request->get('id'));
            $response = $viewUser->execute($request);

            $render = ['user' => $response];

        } catch (\InvalidArgumentException $e) {
            $render = ['error_msg' => $e->getMessage()];
        }

        return $this->render(
            'NilPortuguesMyBoundedContextBundle:Default:user.html.twig',
            $render
        );
    }
}
