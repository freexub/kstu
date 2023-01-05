<?php

namespace app\modules\cabinet\controllers;

use app\models\UploadForm;
use app\modules\cabinet\models\Article;
use app\modules\cabinet\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class EditorialController extends Controller
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
        $dataProvider->query->andWhere(['>','status',2]);

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
        $model = $this->findModel($id);

        if ($model->load($this->request->post())){
            $model->status = 7;
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app_article', 'Назначен рецинзент: ' . $model->reviewerUser->fullName));
                return $this->redirect(['index']);
            }
        }

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
            'model' => $model,
            'items' => $items,
            'views' => $views[$tab],
        ]);
    }

    public function actionFile($id, $type){
       $model = $this->findModel($id);
       $model->getArticleFile($type);
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
