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

}
