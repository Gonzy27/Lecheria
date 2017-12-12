<?php

namespace app\controllers;

use Yii;
use app\models\Venta;
use app\models\VentaSearch;
use app\models\Detalleventa;
use app\models\DetalleventaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Systemuser;
    use kartik\mpdf\Pdf;
/**
 * VentaController implements the CRUD actions for Venta model.
 */
class VentaController extends Controller
{
    /**
     * @inheritdoc
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
            'access' => [
                'class' =>\yii\filters\AccessControl::className(),
                'only' => ['index','update','create','view','delete'],
                'rules' => [
                    [
                        'actions' => ['index','update','create','view','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule,$action){
                            return \app\models\Systemuser::isUserAmin(Yii::$app->user->identity->username);
                        }
                    ],[
                        'actions' => ['index','update','create','view','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule,$action){
                            return \app\models\Systemuser::isUserSuperAmin(Yii::$app->user->identity->username);
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Venta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VentaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     /**
     * Displays a single Venta model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new DetalleventaSearch();
        $searchModel->idVenta=$id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel2' => $searchModel,
            'dataProvider2' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Venta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Venta();

        $model->fecha=date("y-m-d");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idVenta]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Venta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idVenta]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Venta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionReport() {
    // get your HTML raw content without any layouts or scripts
    $ventas = Venta::find()->all();
    foreach ($ventas as $venta){
        $searchModel = new DetalleventaSearch();
        $searchModel->idVenta=$venta->idVenta;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $total[]=DetalleventaSearch::getTotal($dataProvider->models,'precioFinal');
    }
    $content = $this->renderPartial('reporte',[
        'data' => $ventas,
        'total' => $total, 
    ]);
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_UTF8, 
        // A4 paper format
        //'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        //'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
       // 'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Lecheria Hanamichi'],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['Lecheria'], 
            'SetFooter'=>['Hanamichi'],
        ]
    ]);
     return $pdf->render(); 
    }
    /**
     * Finds the Venta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Venta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
