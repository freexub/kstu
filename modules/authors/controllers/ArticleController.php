<?php

namespace app\modules\authors\controllers;

use app\models\Article;
use app\models\ArticleSearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use Yii;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
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
        $dataProvider->query->andWhere([
            'autor_id' => Yii::$app->user->id
        ]);

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
    public function actionView($id)
    {
        if ($id == Yii::$app->user->id) {
        }
            return $this->render('view2', [
                'model' => $this->findModel($id),
            ]);

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Article();
        $check = new UploadForm();
        $article = new UploadForm();
        $authors = new UploadForm();

        if ($this->request->isPost) {
            $article->file = UploadedFile::getInstance($model, 'documentFile');
            $check->file = UploadedFile::getInstance($model, 'checkFile');
            $authors->file = UploadedFile::getInstance($model, 'authorsFile');

            if ($model->load($this->request->post())) {

                $date = date("d-m-Y_h-m-s");
                $path = Yii::getAlias('@app') . '/runtime/uploads/';

                if ($article->file && $article->validate()) {
                    $article->file->saveAs($path.'article/' . $date. '_' .$article->file->baseName . '_article.' . $article->file->extension);
                    $model->documentFile = $date. '_' . $article->file->baseName . '.' . $article->file->extension;
                }

                if ($check->file && $check->validate()) {
                    $check->file->saveAs($path.'check/' . $date. '_' .$check->file->baseName . '_check.' . $check->file->extension);
                    $model->checkFile =  $date. '_' . $check->file->baseName . '.' . $check->file->extension;
                }

                if ($authors->file && $authors->validate()) {
                    $authors->file->saveAs($path.'authors/' . $date. '_' .$authors->file->baseName . '_authors.' . $authors->file->extension);
                    $model->authorsFile =  $date. '_' . $authors->file->baseName . '.' . $authors->file->extension;
                }

                $model->autor_id = Yii::$app->user->id;

                if ($model->save()){
                    Yii::$app->session->setFlash('success', Yii::t('app_article', 'Ваша статья успешно загружена!'));
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    var_dump($model->errors);die();
                    Yii::$app->session->setFlash('warning', "warning!!! warning!!! warning!!!");
                    return $this->redirect(['create']);
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionGetFile($id, $type = ''){
        $model = $this->findModel($id);
        if ($model->autor_id == Yii::$app->user->id){
            $fileOnPath = '';
            switch ($type){
                case 'documentFile':
                    $fileOnPath = 'article/' . $model->documentFile;
                    break;
                case 'documentShortFile':
                    $fileOnPath = 'article_short/' . $model->documentShortFile;
                    break;
                case 'checkFile':
                    $fileOnPath = 'check/' . $model->checkFile;
                    break;
                case 'reviewFile':
                    $fileOnPath = 'review/' . $model->reviewFile;
                    break;
                case 'plagiatFile':
                    $fileOnPath = 'antiplagiat/' . $model->plagiatFile;
                    break;
                case 'authorsFile':
                    $fileOnPath = 'authors/' . $model->authorsFile;
                    break;
            }

            $file = Yii::getAlias('@app') . '/runtime/uploads/'.$fileOnPath;
            // проверка существования файла
            if (file_exists($file)) {
                // формирование заголовков, необходимых для скачивания файла
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file ));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: '.filesize($file));

                // чтение файла и отдача его на загрузку
                readfile($file);
            } else {
                echo 'Файл не найден';
            }
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $check = new UploadForm();
        $article = new UploadForm();
        $authors = new UploadForm();

        if ($this->request->isPost && $model->load($this->request->post())) {
            $article->file = UploadedFile::getInstance($model, 'documentFile');
            $check->file = UploadedFile::getInstance($model, 'checkFile');
            $authors->file = UploadedFile::getInstance($model, 'authorsFile');

            $date = date("d-m-Y_h-m-s");
            $path = Yii::getAlias('@app') . '/runtime/uploads/';

            if ($article->file && $article->validate()) {
                $article->file->saveAs($path.'article/' . $date. '_' .$article->file->baseName . '_article.' . $article->file->extension);
                $model->documentFile = $date. '_' . $article->file->baseName . '.' . $article->file->extension;
            }

            if ($check->file && $check->validate()) {
                $check->file->saveAs($path.'check/' . $date. '_' .$check->file->baseName . '_check.' . $check->file->extension);
                $model->checkFile =  $date. '_' . $check->file->baseName . '.' . $check->file->extension;
            }

            if ($authors->file && $authors->validate()) {
                $authors->file->saveAs($path.'authors/' . $date. '_' .$authors->file->baseName . '_authors.' . $authors->file->extension);
                $model->authorsFile =  $date. '_' . $authors->file->baseName . '.' . $authors->file->extension;
            }

            $model->autor_id = Yii::$app->user->id;


            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
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
        $this->findModel($id)->delete();

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
