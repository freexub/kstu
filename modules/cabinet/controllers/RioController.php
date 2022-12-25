<?php

namespace app\modules\cabinet\controllers;

use app\modules\cabinet\models\Article;
use app\modules\cabinet\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class RioController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Article models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $tab=0)
    {

        $labels = [
            0 => 'Русский',
            1 => 'Каказхский',
            2 => 'Английский',
        ];
        $views = [
            0 => 'ru',
            1 => 'kk',
            2 => 'en',
        ];
        for ($i=0; 3 > $i; $i++){
            $items[$i] = [
                'label' => $labels[$i],
                'url' => 'view?id='.$id.'&tab='.$i,
                'options' => ['style' =>'background-color: red;'],
                'active' => $tab == $i,
            ];
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'items' => $items,
            'views' => $views[$tab],
        ]);
    }

    public function actionFile($id, $type){
       $model = $this->findModel($id);
       $model->getArticleFile($type);
    }

    public function actionDecide($id){
        $model = $this->findModel($id);
//        return $this->renderAjax('decide',[
        return $this->render('decide',[
            'model'=>$model
        ]);
    }
    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->satus = 100;
        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
