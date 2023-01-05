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
class ReviewerController extends Controller
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
        $dataProvider->query->andWhere(['reviewUser' => Yii::$app->user->id]);
        $dataProvider->query->andWhere(['status'=>7]);

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
        $review = $model->reviewFile;
        $date = date("d-m-Y_h-m-s");
        $path = Yii::getAlias('@app') . '/runtime/uploads/review/';

//            var_dump($shortFile);die();
        if ($model->load($this->request->post())){
            $userId = $model->reviewUser;
            if (!empty($_FILES['Article']['name']['reviewFile'])){
                $reviewFile = new UploadForm();
                $reviewFile->file = UploadedFile::getInstance($model, 'reviewFile');

                if (!empty($review)){
                    if (file_exists($path.$review))
                        unlink($path.$review);
                }
                if ($reviewFile->file && $reviewFile->validate()) {
                    $model->reviewFile = $date . '_' . $userId . '_review.' . $reviewFile->file->extension;
                    $reviewFile->file->saveAs($path . $model->reviewFile);
                }
            }else{
                $model->reviewFile = $review;
            }
//            var_dump($_POST);die();
            switch ($_POST["Article"]["stat"]){
                case '1':
                    $model->status = 9;
                    break;
                case '2':
                    $model->status = 12;
                    break;
                case '3':
                    $model->status = 8;
                    break;
            }

            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app_article', 'Решение по статье принято! Статус: ' . $model->statuses->name_ru));
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

    public function actionFile($id=0, $type){
        if ($id == 0)
            $model = new Article();
        else
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
