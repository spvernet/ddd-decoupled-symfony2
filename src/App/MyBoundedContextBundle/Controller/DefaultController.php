<?php

namespace App\MyBoundedContextBundle\Controller;

use App\MyBoundedContext\Application\Model\User\ViewUser\ViewUserRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AppMyBoundedContextBundle:Default:index.html.twig');
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loadUserAction(Request $request)
    {
        try {
            /** @var \App\MyBoundedContext\Application\Model\User\ViewUser\ViewUserUseCase $viewUser */
            $viewUser = $this->get('app.my_bounded_context.application.model.user.view_user.view_user_use_case');

            $request = new ViewUserRequest($request->get('id'));
            $response = $viewUser->execute($request);

            $render = $this->render(
                'AppMyBoundedContextBundle:Default:user.html.twig',
                ['user' => $response]
            );

        } catch (\InvalidArgumentException $e) {
            $render = $this->render(
                'AppMyBoundedContextBundle:Default:user.html.twig',
                ['error_msg' => $e->getMessage()]
            );
        }

        return $render;
    }
}
