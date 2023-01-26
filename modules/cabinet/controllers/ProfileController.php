<?php

namespace app\modules\cabinet\controllers;

use app\models\JournalCategory;
use Yii;
use app\models\JournalReviewer;
use app\models\Profile;
use app\models\ProfileSearch;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
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
     * Lists all Profile models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param int $user_id User ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($user_id)
    {
        $journalReviewer = new JournalReviewer();
        return $this->render('view', [
            'model' => $this->findModel($user_id),
            'journalReviewer' => $journalReviewer,
        ]);

    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionUpdateType($type,$user_id,$u=0)
    {
        if ($this->request->isGet) {
            $profile = Profile::findOne($user_id);

            if ($u == 0){
                if ($profile->getRevoke($type)){
                    if ($type == 'Рецензент'){
                        $model = JournalReviewer::find()->where(['user_id'=>$user_id])->one();
                        $model->delete();
                    }
                    \Yii::$app->session->setFlash('warning', \Yii::t('app', 'Роль <b>'.$type.'</b> удалена'));
                    return $this->redirect(\Yii::$app->request->referrer);
                }
            }else{
//                var_dump($_GET);die();
                if ($profile->getAssign($type)){

                    if ($type == 'Рецензент'){
                        $model = new JournalReviewer();
                        $model->user_id = $user_id;
                        $model->journal_category_id = (int)$_GET["JournalReviewer"]["journal_category_id"];
                        $model->save();
                    }
                    \Yii::$app->session->setFlash('success', \Yii::t('app', 'Роль <b>'.$type.'</b> добавлена'));
                    return $this->redirect(\Yii::$app->request->referrer);
                }else{
                    \Yii::$app->session->setFlash('danger', \Yii::t('app', 'Роль уже была назначена'));
                    return $this->redirect(\Yii::$app->request->referrer);
                }
            }
        }

    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $user_id User ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($user_id)
    {
        $model = $this->findModel($user_id);
        $user = User::findOne($user_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $user_id User ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($user_id)
    {
//        $this->findModel($user_id)->delete();
        $user = User::findOne($user_id);
        $user->status = 0;
        $user->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $user_id User ID
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id)
    {
        if (($model = Profile::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
