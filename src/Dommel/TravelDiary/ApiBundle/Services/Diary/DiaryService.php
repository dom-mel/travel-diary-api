<?php

namespace Dommel\TravelDiary\ApiBundle\Services\Diary;

use Doctrine\ORM\EntityManager;
use Dommel\TravelDiary\ApiBundle\Entity\DiaryEntity;
use Dommel\TravelDiary\ApiBundle\Entity\UserEntity;

class DiaryService
{

    /*** @var EntityManager */
    private $entityManager;

    function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param DiaryEntity $diary Diary to create
     * @return bool
     */
    public function create(DiaryEntity $diary)
    {

        if ($diary->getTitle() === '')
        {
            return false;
        }

        $this->entityManager->persist($diary);
        $this->entityManager->flush($diary);

        return true;
    }

    public function getDiaries(UserEntity $user) {
        return $this->entityManager->getRepository('DommelTravelDiaryApiBundle:DiaryEntity')
                ->getDiariesWithoutRefs($user);
    }
}
