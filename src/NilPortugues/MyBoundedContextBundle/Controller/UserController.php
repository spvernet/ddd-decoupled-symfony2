<?php

namespace NilPortugues\MyBoundedContextBundle\Controller;

use NilPortugues\MyBoundedContext\Application\User\SignUp\Command\SignUpUserCommand;
use NilPortugues\MyBoundedContext\Application\User\View\Command\ViewUserCommand;
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
            $commandBus->handle(
                new SignUpUserCommand(
                    $request->get('email'),
                    $request->get('username')
                )
            );

            $code = 200;
            $render = ['user' => $commandBus->getResult()];
        } catch (\Exception $e) {

            $code = 400;
            print_r('Validation error, do redirect!<br><br><pre>');
            print_r($commandBus->getErrors());
            die();
        }

        return $this->render(self::TWIG_VIEW_USER, $render)->setStatusCode($code);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewUserAction(Request $request)
    {
        $commandBus = $this->get(self::VALIDATION_BUS);

        try {
            $commandBus->handle(new ViewUserCommand($request->get('id')));

            $code = 200;
            $render = ['user' => $commandBus->getResult()];

        } catch (\Exception $e) {
            $code = 404;
            $render = ['error_msg' => $commandBus->getErrors()];
        }

        return $this->render(self::TWIG_VIEW_USER, $render)->setStatusCode($code);
    }
}
