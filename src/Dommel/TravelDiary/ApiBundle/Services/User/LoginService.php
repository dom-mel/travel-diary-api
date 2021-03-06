<?php
namespace Dommel\TravelDiary\ApiBundle\Services\User;

use Doctrine\ORM\EntityManager;
use Dommel\TravelDiary\ApiBundle\Entity\UserEntity;
use Dommel\TravelDiary\ApiBundle\Services\Security\SecurityService;

class LoginService
{

    private $entityManager;
    private $securityService;

    public function __construct(EntityManager $entityManager, SecurityService $securityService)
    {
        $this->entityManager = $entityManager;
        $this->securityService = $securityService;
    }

    public function login($email, $password)
    {

        $password = $this->securityService->hash($password);

        $user = $this->entityManager->getRepository('DommelTravelDiaryApiBundle:UserEntity')
                ->findOneBy(array('email' => $email, 'password' => $password));

        if ($user === null)
        {
            throw new LoginException();
        }

        return $user;
    }



}