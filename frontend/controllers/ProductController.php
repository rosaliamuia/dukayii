<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Product;
use frontend\models\Productbrand;
use frontend\models\Productcategory;
use frontend\models\Productimages;
use frontend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $image = new Productimages();
     

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($this->saveImage($model->productId, Yii::$app->request->post()['Productimages'])) {

            
            return $this->redirect(['view', 'id' => $model->productId]);
        }
    }


        return $this->render('create', [
            'model' => $model,
            'image' => $image
        ]);
    }


        
        
    
    /**
     * 
     * @param  $productId
     * @param  $imagedata
     */
    public function saveImage($productId,$imagedata){
        
        $model = new Productimages();
                
        if($model->load(["Productimages"=>['imagePath'=>$imagedata['imagePath']]])){
            //generates images with unique names
            $imageName = bin2hex(openssl_random_pseudo_bytes(10));
            $model->imagePath = UploadedFile::getInstance($model, 'imagePath');
            //saves file in the root directory
            $model->imagePath->saveAs('uploads/'.$imageName.'.'.$model->imagePath->extension);
            //save in the db
            $model->imagePath='uploads/'.$imageName.'.'.$model->imagePath->extension;
            $model->productId = $productId;
            if($model->save()){
                return true;
            }
        }
        return false;
    }


    public function actionAck()
    {
        return $this->render('ack');
    }




public function actionAddbrand()
{
    $model = new \frontend\models\Productbrand();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate() &&$model->save()) {
            // form inputs are valid, do something here
            return $this->redirect(['create']);
        }
    }

    return $this->renderAjax('addbrand', [
        'model' => $model,
    ]);
}

   

    public function actionAddcat()
{
    $model = new \frontend\models\Productcategory();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate() &&$model->save()) {
            // form inputs are valid, do something here
            return $this->redirect(['create']);
        }
    }

    return $this->renderAjax('addcat', [
        'model' => $model,
    ]);
}




    public function actionAddcolor()
{
    $model = new \frontend\models\Productcolor();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate() && $model->save()) {
            // form inputs are valid, do something here
            return $this->redirect(['create']);
        }
    }

    return $this->renderAjax('addcolor', [
        'model' => $model,
    ]);
}

public function actionUom()
{
    $model = new \frontend\models\Productuom();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate() && $model->save()) {
            // form inputs are valid, do something here
            return $this->redirect(['create']);
        }
    }

    return $this->renderAjax('uom', [
        'model' => $model,
    ]);
}

// public function actionImage()
// {
//     $model = new \frontend\models\Productimages();

//     if ($model->load(Yii::$app->request->post())) {
//         if ($model->validate() && $model->save()) {
//             // form inputs are valid, do something here
//             return $this->redirect(['create']);
//         }
//     }

//     return $this->render('image', [
//         'model' => $model,
//     ]);
// }

public function actionImage()
{
    $model = new \frontend\models\Productimages();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {

            // form inputs are valid, do something here
            return $this->redirect(['view']);
      
    }

    return $this->render('image', [
        'model' => $model,
    ]);
}


    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->productId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
