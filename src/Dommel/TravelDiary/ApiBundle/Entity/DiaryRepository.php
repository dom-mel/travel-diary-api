<?php

namespace Dommel\TravelDiary\ApiBundle\Entity;

use Doctrine\ORM\EntityRepository;

class DiaryRepository extends EntityRepository {

    public function getDiariesWithoutRefs(UserEntity $user) {

        return $this->getEntityManager()->createQuery('
            SELECT partial d.{id, title}
            FROM DommelTravelDiaryApiBundle:DiaryEntity d
            WHERE d.user = :user
        ')->setParameter('user', $user)
        ->getArrayResult();


    }

}
