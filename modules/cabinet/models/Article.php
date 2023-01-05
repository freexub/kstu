<?php

namespace app\modules\cabinet\models;

use Yii;
use app\models\Article as Articles;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $autor_id
 * @property int $parent_id
 * @property string $title_ru
 * @property string $title_kk
 * @property string $title_en
 * @property string $keywords_ru
 * @property string $keywords_kk
 * @property string $keywords_en
 * @property string $annotation_ru
 * @property string $annotation_kk
 * @property string $annotation_en
 * @property int $category_id
 * @property string|null $comment
 * @property string $documentFile
 * @property string $checkFile
 * @property string $date_create
 * @property string $date_update
 * @property int $status
 */
class Article extends Articles
{

    public function getArticleFile($type = ''){
        if (Yii::$app->user->can('getFile')){
            $fileOnPath = '';
            switch ($type){
                case 'documentFile':
                    $fileOnPath = 'article/' . $this->documentFile;
                    break;
                case 'documentShortFile':
                    $fileOnPath = 'article_short/' . $this->documentShortFile;
                    break;
                case 'checkFile':
                    $fileOnPath = 'check/' . $this->checkFile;
                    break;
                case 'reviewFile':
                    $fileOnPath = 'review/' . $this->reviewFile;
                    break;
                case 'plagiatFile':
                    $fileOnPath = 'antiplagiat/' . $this->plagiatFile;
                    break;
                case 'authorsFile':
                    $fileOnPath = 'authors/' . $this->authorsFile;
                    break;
                case 'reviewTemplate':
                    $fileOnPath = 'files/review_template.docx';
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
                header('Content-Disposition: attachment; filename='.basename($file));
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

}
