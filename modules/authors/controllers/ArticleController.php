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
        $dataProvider->query->andWhere(['autor_id' => Yii::$app->user->id]);
        $dataProvider->query->andWhere(['<', 'status', 100]);
        $dataProvider->query->orderBy('id DESC');

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
        $model = $this->findModel($id);
        if ($model->autor_id == Yii::$app->user->id) {
            return $this->render('view2', [
                'model' => $model,
            ]);
        }else{
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $userId = Yii::$app->user->id;
        $model = new Article();
        $article = new UploadForm();
        $authors = new UploadForm();
//        $check = new UploadForm();

        if ($this->request->isPost) {
//            $check->file = UploadedFile::getInstance($model, 'checkFile');
            $article->file = UploadedFile::getInstance($model, 'documentFile');
            $authors->file = UploadedFile::getInstance($model, 'authorsFile');

            if ($model->load($this->request->post())) {

                $date = date("d-m-Y_h-m-s");
                $path = Yii::getAlias('@app') . '/runtime/uploads/';

                if ($article->file && $article->validate()) {
                    $model->documentFile = $date. '_' . $userId . '_article' . '.' . $article->file->extension;
                    $article->file->saveAs($path.'article/' . $model->documentFile);
                }

                if ($authors->file && $authors->validate()) {
                    $model->authorsFile =  $date. '_' . $userId . '_authors' . '.' . $authors->file->extension;
                    $authors->file->saveAs($path.'authors/' . $model->authorsFile );
                }

//                if ($check->file && $check->validate()) {
//                    $model->checkFile =  $date. '_' . $userId . '_check'  . '.' . $check->file->extension;
//                    $check->file->saveAs($path.'check/' . $model->checkFile);
//                }

                $model->autor_id = Yii::$app->user->id;
                $model->status = 1;

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

    public function actionFile($type){
        if ($type == 'authorsTemplate'){
            $fileOnPath = 'files/authors_template.xlsx';
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
        }else{
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    public function actionGetFile($id, $type = ''){
        $model = $this->findModel($id);
        if ($model->autor_id == Yii::$app->user->id){
            $fileOnPath = '';
            switch ($type){
                case 'documentFile':
                    $fileOnPath = 'article/' . $model->documentFile;
                    break;
                case 'checkFile':
                    $fileOnPath = 'check/' . $model->checkFile;
                    break;
                case 'authorsFile':
                    $fileOnPath = 'authors/' . $model->authorsFile;
                    break;
                case 'authorsTemplate':
                    $fileOnPath = 'files/authors_template.xlsx';
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
        $userId = Yii::$app->user->id;
        $model = $this->findModel($id);
        if ($model->autor_id == $userId && $model->status < 3){
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
                    $model->documentFile = $date. '_' . $userId . '_article.' . $article->file->extension;
                    $article->file->saveAs($path.'article/' . $model->documentFile);
                }

                if ($check->file && $check->validate()) {
                    $model->checkFile =  $date. '_' . $userId . '_check.' . $check->file->extension;
                    $check->file->saveAs($path.'check/' . $model->checkFile);
                }

                if ($authors->file && $authors->validate()) {
                    $model->authorsFile =  $date. '_' . $userId . '_authors.' . $authors->file->extension;
                    $authors->file->saveAs($path.'authors/' . $model->authorsFile);
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
                $model->autor_id = $user_id;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
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
        if ($model->autor_id == Yii::$app->user->id) {
            if ($model->delete()){
                $fileOnPath = Yii::getAlias('@app') . '/runtime/uploads/';
                /**
                 * Доделать проверку существования файлов
                 */
                die();
                unlink($fileOnPath.'article/'.$model->documentFile);
                unlink($fileOnPath.'article/'.$model->checkFile);
                unlink($fileOnPath.'article/'.$model->authorsFile);
            }
        }
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
