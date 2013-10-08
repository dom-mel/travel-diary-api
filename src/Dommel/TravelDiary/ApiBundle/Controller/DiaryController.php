<?php

namespace Dommel\TravelDiary\ApiBundle\Controller;

use Dommel\TravelDiary\ApiBundle\Entity\DiaryEntity;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class DiaryController extends FOSRestController {

    private $data = array('success' => true);
    /*
     * GET/PUT/DELETE /diary/:id
     * GET /diaries
     * POST /diary/create
     */

    public function getDiaryAction($id) {
        $request = $this->getRequest();
        $session = $this->get('session_service')->useSession($request->query->get('session', ''));
        $session->getUser(); // Hacky

        $diary = $this->get('diary_service')->getDiary($id);

        if ($diary === null) {
            $this->data['success'] = false;
        } else {
            $this->data['diary'] = $diary;
        }
        return $this->handleView($this->view($this->data));
    }

    public function createAction(Request $request) {
        $session = $this->get('session_service')->useSession($request->request->get('session', ''));

        $diary = new DiaryEntity();
        $diary->setUser($session->getUser());
        $diary->setTitle($request->request->get('title', ''));
        $diary->setText($request->request->get('text', ''));

        if ($this->get('diary_service')->create($diary)) {
            $this->data['diaryId'] = $diary->getId();
        } else {
            $this->data['success'] = false;
        }

        return $this->handleView($this->view($this->data));
    }

    public function getDiariesAction(Request $request) {
        $session = $this->get('session_service')->useSession($request->query->get('session', ''));

        $this->data['diaries'] = $this->get('diary_service')->getDiaries($session->getUser());

        return $this->handleView($this->view($this->data));
    }

}
