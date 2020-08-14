<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\form\Form;
use app\core\middlewares\AuthMiddleware;
use app\core\Model;
use app\core\Request;
use app\core\Response;
use app\models\Article;
use app\models\LoginForm;
use app\models\User;

class SiteController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function home()
    {
        return $this->render('home', [
            'name' => 'OG'
        ]);
    }

    public function login(Request $request)
    {
        $loginForm = new LoginForm();
        if ($request->getMethod() === 'post') {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->session->setFlash('success', 'Successfully logged in!');
                Application::$app->response->redirect('/');
                return;
            }
        }
        //      $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $registerModel = new User();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                return 'Show success page';
            }

        }
        //$this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function createArticle(Request $request)
    {
        $articleModel = new Article();
        $user = new User();
        $articleModel->author = $_SESSION['user'];
        if($request->getMethod() === 'post'){
            $articleModel->loadData($request->getBody());
            if($articleModel->validate() && $articleModel->save()){
                Application::$app->session->setFlash('articleCreated', 'New article is successfully created');
                Application::$app->response->redirect('article-detail-page');
                return 'Show article detail page';
            }
        }
//        var_dump($_SESSION['user']);
//        var_dump($user);
//        var_dump($articleModel);
        return $this->render('create-new-article',[
            'model' => $articleModel
        ]);
    }

    public function article(Request $request)
    {
        $userId = $_SESSION['user'];
        $where = ['id' => $userId];
        $articleModel = new Article();
        $articleModel->author = $userId;
        $articleModel->findOneArticle($where);

        if($request->getMethod() === 'post'){

        }
        //var_dump($articleModel);
        return $this->render('article-detail-page', [
            'model' => $articleModel
        ]);

        /**
         * TODO
         * findArticleById
         * findAllCommentsByArticleId
         * createComment
         * deleteCommentForCurrentArticleFromAuthor
         */
    }

    public function articles()
    {
        /**
         * TODO
         * findAllArticles
         * findAllCommentsByArticleId
         * createComment
         * deleteCommentForCurrentArticleFromAuthor
         */
        $data = [];
        $articleModels = [];
        $articleModel = new Article();
        $data = Article::findAll();
//        var_dump($data);
//        foreach ($data as $article){
//            $articleModel->id = (int)$article['id'];
//            $articleModel->title = $article['title'];
//            $articleModel->imagelink = $article['imagelink'];
//            $articleModel->content = $article['content'];
//            $articleModel->author = (int)$article['author'];
//            $articleModel->created_at = $article['created_at'];
//            $articleModels['$article'] = $articleModel;
//        }
//        var_dump($articleModels);
        return $this->render('overview', [
            'model' => $articleModel
        ], 'pagination');
    }

}
