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

    public function getDiaryWithoutUser($id) {
        return $this->getEntityManager()->createQuery('
            SELECT d.id as id, d.title as title, d.text as text
            FROM DommelTravelDiaryApiBundle:DiaryEntity d
            WHERE d.id = :id
        ')->setParameter('id', $id)
            ->getOneOrNullResult();
    }

}
