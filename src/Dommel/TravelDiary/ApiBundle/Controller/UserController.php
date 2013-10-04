<?php

namespace Dommel\TravelDiary\ApiBundle\Controller;
use Dommel\TravelDiary\ApiBundle\Entity\UserEntity;
use Dommel\TravelDiary\ApiBundle\Services\User\LoginException;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;


class UserController extends FOSRestController {

    private $data = array('success' => true);

    public function loginAction(Request $request) {
        $userName = $request->request->get('user');
        $password = $request->request->get('password');

        try {
            $user = $this->login($userName, $password);
        } catch (LoginException $e) {
            $this->data['success'] = false;
            return $this->handleView($this->view($this->data));
        }

        $session = $this->createSession($user);

        $this->data['user'] = $user;
        $this->data['session'] = $session;

        $view = $this->view($this->data);
        return $this->handleView($view);
    }

    private function login($user, $password) {
        $loginService = $this->get('login_service');
        return $loginService->login($user, $password);
    }

    private function createSession(UserEntity $user) {
        $sessionService = $this->get('session_service');
        return $sessionService->createSession($user);
    }

    public function currentAction(Request $request) {
        $sessionId = $request->query->get('e


        ');
        $sessionService = $this->get('session_service');
        $session = $sessionService->useSession($sessionId);

        if ($session === null) {
            $this->data['success'] = false;
            $view = $this->view($this->data);
            $view->setFormat('json');
            return $this->handleView($view);
        }

        $session->getUser()->setPassword('');
        $this->data['user'] = $session->getUser();

        $view = $this->view($this->data);
        $view->setFormat('json');
        return $this->handleView($view);
    }

}