<?php
namespace Dommel\TravelDiary\ApiBundle\Services\User;
use Doctrine\ORM\EntityManager;
use Dommel\TravelDiary\ApiBundle\Entity\UserEntity;
use Dommel\TravelDiary\ApiBundle\Services\Security\SecurityService;

/**
 * @author Dominik Eckelmann
 */
class RegisterService
{

    private $entityManager;
    private $securityService;

    public function __construct(EntityManager $entityManager, SecurityService $securityService)
    {
        $this->entityManager = $entityManager;
        $this->securityService = $securityService;
    }

    public function register($email, $password)
    {
        $user = new UserEntity();
        $user->setEmail($email);
        $user->setPassword($this->securityService->hash($password));
        $this->entityManager->persist($user);
        $this->entityManager->flush($user);
    }
}
