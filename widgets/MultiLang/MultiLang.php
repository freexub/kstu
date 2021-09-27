<?php
namespace app\widgets\MultiLang;

use yii\helpers\Html;

class MultiLang extends \yii\bootstrap4\Widget
{
    public $cssClass;
    public function init(){}

    public function run() {

        return $this->render('view', [
            'cssClass' => $this->cssClass,
        ]);

    }
}