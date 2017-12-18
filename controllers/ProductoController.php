<?php

namespace app\controllers;

use Yii;
use app\models\Producto;
use app\models\ProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\data\ActiveDataProvider;
    use kartik\mpdf\Pdf;
/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
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
public function actionReport() {
    // get your HTML raw content without any layouts or scripts
    $productos = Producto::find()->all();
    $content = $this->renderPartial('reporte',[
        'data' => $productos,
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
 
    // return the pdf output as per the destination setting
    return $pdf->render(); 
}
    /**
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producto model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Producto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idProducto]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idProducto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionGrafico()	{
	$dataProvider = new ActiveDataProvider([
		'query' => \app\models\Detalleventa::findBySql("SELECT * , SUM(detalleventa.cantidad) as cantidad FROM detalleventa JOIN producto WHERE detalleventa.idProducto = producto.idProducto GROUP BY detalleventa.idProducto "),
	    'pagination' => false
	]);
	
	return $this->render('pie', [
		'dataProvider' => $dataProvider
	]);
}

    /**
     * Deletes an existing Producto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
