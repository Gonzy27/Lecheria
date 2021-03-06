<?php

namespace app\controllers;

use Yii;
use app\models\Detalleventa;
use app\models\DetalleventaSearch;
use app\models\Producto;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalleventaController implements the CRUD actions for Detalleventa model.
 */
class DetalleventaController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Detalleventa models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new DetalleventaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detalleventa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Detalleventa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) {
        $model = new Detalleventa();
        
        $model->idVenta = $id;
        $model->precioFinal = 0;
        $detalleVenta=Null;
        if ($model->load(Yii::$app->request->post())){
            $detalleVenta = \app\models\Detalleventa::findBySql("Select * from DetalleVenta d where d.idProducto = ".$model->idProducto." and  d.idVenta = ". $model->idVenta)->one();
        }
        if($detalleVenta!=NULL){
            $producto = Producto::findOne($detalleVenta->idProducto);
            $producto->stock=$producto->stock+$detalleVenta->cantidad;
              $producto->save();
              $model = $this->findModel($detalleVenta->idDetalle);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->precioFinal = $model->producto->precio * $model->cantidad;
            $producto = Producto::findOne($model->idProducto);
            $producto->stock=$producto->stock-$model->cantidad;
            $producto->save();
            $model->save();
            return $this->redirect(['venta/view', 'id' => $model->idVenta]);
        }
        return $this->renderAjax('create', [
                    'model' => $model,
                    'accion' => 'crear',
        ]);
    }

    /**
     * Updates an existing Detalleventa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        
    $model = $this->findModel($id);
    $detalleVenta=Null;
        if ($model->load(Yii::$app->request->post())){
            $detalleVenta = \app\models\Detalleventa::findBySql("Select * from DetalleVenta d where d.idProducto = ".$model->idProducto." and  d.idVenta = ". $model->idVenta)->one();
        }
        if($detalleVenta!=NULL){
            $producto = Producto::findOne($detalleVenta->idProducto);
            $producto->stock=$producto->stock+$detalleVenta->cantidad;
              $producto->save();
              $model = $this->findModel($detalleVenta->idDetalle);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->precioFinal = 0;
            $model->precioFinal = $model->producto->precio * $model->cantidad;
            $producto = Producto::findOne($model->idProducto);
            $producto->stock=$producto->stock-$model->cantidad;
            $producto->save();
            $model->save();
            return $this->redirect(['venta/view', 'id' => $model->idVenta]);
        }

        return $this->renderAjax('update', [
                    'model' => $model,
                    'accion' => 'actualizar',
        ]);
    }

    /**
     * Deletes an existing Detalleventa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
  public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['venta/view', 'id' => $model->idVenta]);
    }

    /**
     * Finds the Detalleventa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Detalleventa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Detalleventa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
