<?php
namespace Dommel\TravelDiary\ApiBundle\Entity;

use DateTime;
use Doctrine\ORM\EntityRepository;

class SessionRepository extends EntityRepository {

    public function deleteSessions(\DateInterval $maxAge) {
        $query = $this->getEntityManager()->createQuery('
            DELETE FROM DommelTravelDiaryApiBundle:SessionEntity se
            WHERE se.created < :age
        ');

        $age = new DateTime();
        $age = $age->sub($maxAge);
        $query->setParameter('age', $age);
        $query->execute();
    }

    public function findActive($sessionId, \DateInterval $maxAge) {
        $query = $this->getEntityManager()->createQuery('
            SELECT DommelTravelDiaryApiBundle:SessionEntity se
            WHERE se.sessionId = :sessionId
            AND se.created < :age
        ');

        $age = new DateTime();
        $age = $age->sub($maxAge);
        $query->setParameter('age', $age);
        $query->setParameter('sessionId', $sessionId);
        return $query->getOneOrNullResult();
    }

    public function deleteSession($sessionId) {
        $this->getEntityManager()->createQuery('
            DELETE FROM DommelTravelDiaryApiBundle:SessionEntity se
            WHERE se.sessionId = :sessionId
        ')->setParameter('sessionId', $sessionId)->execute();
    }

}
