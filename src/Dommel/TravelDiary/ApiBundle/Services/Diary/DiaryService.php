<?php

namespace Dommel\TravelDiary\ApiBundle\Services\Diary;

use Doctrine\ORM\EntityManager;
use Dommel\TravelDiary\ApiBundle\Entity\DiaryEntity;
use Dommel\TravelDiary\ApiBundle\Entity\PhotoEntity;
use Dommel\TravelDiary\ApiBundle\Entity\UserEntity;
use dflydev\markdown\MarkdownParser;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

    public function getDiaries(UserEntity $user)
    {
        return $this->entityManager->getRepository('DommelTravelDiaryApiBundle:DiaryEntity')
                ->getDiariesWithoutRefs($user);
    }

    public function getDiary($id)
    {
        $diary = $this->entityManager->getRepository('DommelTravelDiaryApiBundle:DiaryEntity')
            ->getDiaryWithoutUser($id);

        $markdownParser = new MarkdownParser();
        $diary['text_html'] = $markdownParser->transformMarkdown($diary['text']);
        return $diary;
    }

    public function getDiaryEntity($id, UserEntity $user) {
        return $this->entityManager->getRepository('DommelTravelDiaryApiBundle:DiaryEntity')
                ->findOneBy(array(
                        'id' => $id,
                        'user' => $user
                    ));
    }

    public function addPhoto(DiaryEntity $diary, UploadedFile $photo, $options)
    {
        $photoEntity = new PhotoEntity();
        $photoEntity->setDiary($diary);
        $photoEntity->setMime($photo->getMimeType());
        $photoEntity->setSize($photo->getSize());
        $this->entityManager->persist($photoEntity);
        $this->entityManager->flush($photoEntity);

        if ($photo->getError() !== UPLOAD_ERR_OK) {
            return false;
        }
        $photo->move($this->getPhotoPath(), $photoEntity->getId());

        return true;
    }

    private function getPhotoPath() {
        return __DIR__ . "/../../../../../../data/images";
    }
}
