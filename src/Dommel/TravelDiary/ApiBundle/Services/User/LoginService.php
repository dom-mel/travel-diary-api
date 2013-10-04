<?php
namespace Dommel\TravelDiary\ApiBundle\Services\User;

use Doctrine\ORM\EntityManager;
use Dommel\TravelDiary\ApiBundle\Entity\UserEntity;

class LoginService {

    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function login($email, $password) {

        $password = $this->hash($password);

        $user = $this->entityManager->getRepository('DommelTravelDiaryApiBundle:UserEntity')
                ->findOneBy(array('email' => $email, 'password' => $password));

        if ($user === null) {
            throw new LoginException();
        }

        return $user;
    }

    private function hash($text) {
        return hash('sha512', $text);
    }

}