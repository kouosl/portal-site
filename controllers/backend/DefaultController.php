<?php

namespace kouosl\site\controllers\backend;

class DefaultController extends \kouosl\base\controllers\backend\BaseController
{
    public function actionIndex()
    {
        return $this->render('_index');
    }
	
	public function actionError()
    {
        return $this->render('_index');
    }
}
