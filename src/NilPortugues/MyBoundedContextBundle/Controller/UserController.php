<?php

namespace NilPortugues\MyBoundedContextBundle\Controller;

use NilPortugues\MyBoundedContext\Application\Model\User\SignUp\SignUpUserCommand;
use NilPortugues\MyBoundedContext\Application\Model\User\View\ViewUserCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserController
 * @package NilPortugues\MyBoundedContextBundle\Controller
 */
class UserController extends Controller
{
    const VALIDATION_BUS = 'validation_bus';

    const TWIG_VIEW_USER = 'NilPortuguesMyBoundedContextBundle:User:viewUser.html.twig';
    const TWIG_REGISTER_USER = 'NilPortuguesMyBoundedContextBundle:User:newUser.html.twig';


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newUserAction()
    {
        return $this->render(self::TWIG_REGISTER_USER);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerUserAction(Request $request)
    {
        $commandBus = $this->get(self::VALIDATION_BUS);

        try {
            $response = $commandBus->handle(
                new SignUpUserCommand($request->get('email'), $request->get('username'))
            );

            return $this->render(self::TWIG_VIEW_USER, ['user' => $response]);
        } catch (\Exception $e) {
            print_r($commandBus->getErrors());
            die();
        }
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewUserAction(Request $request)
    {
        $commandBus = $this->get(self::VALIDATION_BUS);

        try {
            $response = $commandBus->handle(new ViewUserCommand($request->get('id')));
            return $this->render(self::TWIG_VIEW_USER, ['user' => $response]);
        } catch (\Exception $e) {
            return $this
                ->render(self::TWIG_VIEW_USER, ['error_msg' => $commandBus->getErrors()])
                ->setStatusCode(404);
        }
    }
}
