<?php

namespace portalium\site\controllers\web;

use portalium\site\models\Preference;
use portalium\site\models\PreferenceSearch;
use portalium\site\models\Setting;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\data\ActiveDataProvider;
/**
 * PreferenceController implements the CRUD actions for Preference model.
 */
class PreferenceController extends \portalium\web\Controller
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
     * Lists all Preference models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PreferenceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Preference model.
     * @param int $id_preference Id Preference
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_preference)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_preference),
        ]);
    }

    /**
     * Creates a new Preference model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Preference();
        $model->id_user=Yii::$app->user->id;
        $model->id_workspace=Yii::$app->workspace->id;


        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_preference' => $model->id_preference]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Preference model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_preference Id Preference
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_preference)
    {
        $model = $this->findModel($id_preference);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_preference' => $model->id_preference]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Preference model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_preference Id Preference
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_preference)
    {
        $this->findModel($id_preference)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Preference model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_preference Id Preference
     * @return Preference the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_preference)
    {
        if (($model = Preference::findOne(['id_preference' => $id_preference])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionFindIsPereference()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Setting::find()->where(['is_preference' => 1]),
        ]);

        return $this->render('ispreference', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
