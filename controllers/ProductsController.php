<?php
/**
 * Created by PhpStorm.
 * User: sashapc
 * Date: 15.08.2017
 * Time: 22:20
 */

namespace app\controllers;




use yii\web\Controller;
use app\models\ProductSearch;
use Yii;
use yii\data\Pagination;


class ProductsController extends Controller
{
    public  function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }


    public  function actionIndex()
    {


        if(Yii::$app->request->isAjax) {
            Debug(Yii::$app->request->get());


            $this->layout = false;
            $searchModel = new ProductSearch();

            $searchModel->price2 = Yii::$app->request->get('ProductSearch')['price2'];

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $model = $dataProvider->sort->attributes;
            return $this->render('ajax',
                [
                    'model' => $model,

                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,

                ]);
        }


        $searchModel = new ProductSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


       
        $model = $dataProvider->sort->attributes;
        
        return $this->render('index',
            [
               'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,

                
            ]);
    }
}