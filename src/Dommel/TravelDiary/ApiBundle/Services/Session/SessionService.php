<?php
namespace Dommel\TravelDiary\ApiBundle\Services\Session;

use Doctrine\ORM\EntityManager;
use Dommel\TravelDiary\ApiBundle\Entity\SessionEntity;
use Dommel\TravelDiary\ApiBundle\Entity\UserEntity;

class SessionService
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    function createSession(UserEntity $user)
    {
        $session = new SessionEntity();
        $session->setUser($user);
        $session->setCreated(new \DateTime());
        $session->setSessionId(md5($user->getEmail() . $user->getId() . time()));
        $this->entityManager->persist($session);
        $this->entityManager->flush($session);
        return $session;
    }

    /**
     * @param $sessionId
     * @return SessionEntity
     */
    function useSession($sessionId)
    {
        $session = $this->entityManager->getRepository('DommelTravelDiaryApiBundle:SessionEntity')
                ->findActive($sessionId, new \DateInterval('PT6H'));
        return $session;
    }

    function deleteOldSessions() {
        $this->entityManager->getRepository('DommelTravelDiaryApiBundle:SessionEntity')
            ->deleteSessions(new \DateInterval('PT6H'));
    }

    function logout($sessionId) {
        $this->entityManager->getRepository('DommelTravelDiaryApiBundle:SessionEntity')
            ->deleteSession($sessionId);
    }

}