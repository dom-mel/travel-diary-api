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
        $age->sub($maxAge);
        $query->setParameter('age', $age);
        $query->execute();
    }

}
