<?php


namespace app\controllers;



use app\core\Controller;

class StaticPageController extends Controller
{
    public function showLegalNotice()
    {
        return $this->render('legal-notice');
    }

}
