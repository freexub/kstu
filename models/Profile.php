<?php

namespace app\models;

use Yii;
use mdm\admin\components\Configs;
use mdm\admin\models\Assignment;

/**
 * This is the model class for table "profile".
 *
 * @property int $user_id
 * @property string $fullName_ru
 * @property string $fullName_kk
 * @property string $fullName_en
 * @property int $status
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullName_ru', 'fullName_kk', 'fullName_en'], 'required'],
            [['status'], 'integer'],
            [['fullName_ru', 'fullName_kk', 'fullName_en'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'fullName_ru' => Yii::t('app', 'ФИО на казахском языке'),
            'fullName_kk' => Yii::t('app', 'ФИО на русском языке'),
            'fullName_en' => Yii::t('app', 'ФИО на английском языке'),
            'status' => Yii::t('app', 'Статус'),
        ];
    }

    public function getFullName(){
        switch (Yii::$app->language){
            case 'ru':
                return $this->fullName_ru;
                break;
            case 'kk':
                return $this->fullName_kk;
                break;
            case 'en':
                return $this->fullName_en;
                break;
        }
    }

    public function getTypesInTabel($user_id){
        $array = $this->getTypes($user_id);
        $r = '';
        $i=0;
        if ($array != null){
            foreach (array_keys($array) as $key){
                if ($i==0){$i++; continue;}
                $r .= '<tr>
                           <th scope="row">'.$i++.'</th>
                           <td>'.$key.'</td>
                           <td><a href="update-type?type='.$key.'&user_id='.$user_id.'" class="btn btn-danger">'.Yii::t('app', 'Удалить').'</a></td>
                       </tr>';
                }
        }
        return $r;
    }

    public function getTypesLabel($user_id){
        $array = $this->getTypes($user_id);
        $r = '';
        if ($array != null){
            foreach (array_keys($array) as $key){
                switch ($key){
                    case 'author':
                        $r .= '<span class="badge badge-primary">'.Yii::t('app', 'Автор').'</span> ';
                        break;
                    case 'editorial':
                        $r .= '<span class="badge badge-primary">'.Yii::t('app', 'Редколлегия').'</span> ';
                        break;
                    case 'rio':
                        $r .= '<span class="badge badge-primary">'.Yii::t('app', 'РИО').'</span> ';
                        break;
                    case 'reviewer':
                        $model = JournalReviewer::findOne(['user_id'=>$user_id]);
                        if (isset($model->user_id))
                            $r .= '<span class="badge badge-primary">'.Yii::t('app', 'Рецинзент').'</span> ';
                        else
                            $r .= '<span class="badge badge-danger">'.Yii::t('app', 'Рецинзент').' (категория не выбрана)</span> ';
                        break;
                    case 'admin':
                        $r .= '<span class="badge badge-primary">'.Yii::t('app', 'Администратор').'</span> ';
                        break;
                }

            }
        }

        return $r;
//        return $this->findUserRule($user_id);
    }

    public function getTypes($user_id = 0){
        if ($user_id == 0)
            $user_id = $this->user_id;
        return $this->findUserRule($user_id);
    }

    static function findUserRule($user_id)
    {
        $item = Configs::authManager()->getRolesByUser($user_id);
        if ($item !== null) {
            return $item;
        }
        return null;
    }

    public function getRevoke($type)
    {
        $model = new Assignment($this->user_id);
        if ($model->revoke([$type])) {
            return true;
        }
        return false;
    }

    public function getAssign($type)
    {
        $model = new Assignment($this->user_id);
        if ($model->assign([$type])) {
            return true;
        }
        return false;
    }
}
