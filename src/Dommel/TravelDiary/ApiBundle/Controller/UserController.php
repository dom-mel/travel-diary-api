<?php

namespace Dommel\TravelDiary\ApiBundle\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;


class UserController extends FOSRestController {

    public function loginAction(Request $request) {
        $data = array(
            'user' => '',
            'success' => false
        );

        $user = $request->request->get('user');
        $password = $request->request->get('password');

        if ($user === 'test@example.com' && $password === 'test') {
            $data['success'] = true;
            $data['user'] = 'test@example.com';
        }

        $view = $this->view($data);

        return $this->handleView($view);
    }

}