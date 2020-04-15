<?php
namespace mvc\Controller;

class Category extends \mvc\Engine\Controller
{
    public function index()
    {
        $model = new \mvc\Model\Category();
        $categories = $model->getAll();
        $view = new \mvc\View\Category();
        $view->categories = $categories;
        $view->renderHTML('index','front/category/');

    }

    public function add()
    {
        $model = new \mvc\Model\Category();
        if(!empty($_POST))
        {
            $model->insert($_POST);
            $this->redirect($this->generateUrl('category/index'));

        }
        else 
        {
            $view = new \mvc\View\Category();
            $view->renderHTML('add','front/category');
        }
    }

    public function delete()
    {
        $model = new \mvc\Model\Category();
        $model->delete($_GET['id']);;
        $this->redirect($this->generateUrl('category\index'));
    }
}