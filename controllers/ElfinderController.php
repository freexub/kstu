<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use alexantr\elfinder\ConnectorAction;
use alexantr\elfinder\TinyMCEAction;

class ElfinderController extends Controller
{
    public function actions()
    {
        return [
            'connector' => [
                'class' => ConnectorAction::class,
                'options' => [
                    'debug ' => true,
                    'bind' => [
                        'upload.presave' => function (&$path, &$name, $src, $elfinder, $volume) {
                            $ext = '';
                            if ($pos = strrpos($name, '.')) {
                                $ext = substr($name, $pos);
                            }
                            $name = uniqid() . $ext; // With your preferred hashing method
                        }
                    ],
                    'roots' => [
                        [
                            'driver' => 'LocalFileSystem',
                            'path' => Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'uploads',
                            'URL' => Yii::getAlias('@web') . '/uploads/',
                            'tmbPath' => 'Thumbnails',
                            'mimeDetect' => 'internal',
                            'imgLib' => 'gd',
                            'uploadAllow' => [
                                'image/png',
                                'image/jpg',
                                'image/pjpeg',
                                'image/jpeg',
                                'image/gif',
                                'image/bmp',
                                'image/webp',
                                'application/pdf',
                                'application/msword', // doc dot
                                'application/vnd.ms-excel', // xls xlt xla
                                'application/vnd.ms-powerpoint', // ppt pot pps ppa
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // docx
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // xlsx
                                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // pptx
                            ],
                            'uploadDeny' => [
                                'all',
                            ],
                            'uploadOrder'=> ['deny', 'allow'],
                            'accessControl' => function ($attr, $path) {
                                // hide files/folders which begins with dot
                                return (strpos(basename($path), '.') === 0) ?
                                    !($attr == 'read' || $attr == 'write') :
                                    null;
                            },
                        ],
                        [
                            'driver' => 'MySQL',
                            'host' => 'localhost',
                            'port' => '3306',
                            'user' => 'root',
                            'pass' => '',
                            'db' => 'kstu',
                            'files_table' => 'elfinder_file',
                            'path' => 1,
                            'URL' => Yii::getAlias('@web') . '/uploads/',
                            'tmbPath' => 'Thumbnails',
                            'accessControl' => 'access'
                        ],
                    ],
                ],
            ],
            'tinymce' => [
                'class' => TinyMCEAction::class,
                'connectorRoute' => 'connector',
            ],
        ];
    }
}