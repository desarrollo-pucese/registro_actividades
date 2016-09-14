<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'Control de actividades',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems = [
                    ['label' => 'Inicio', 'url' => ['/site/index']],
                    ['label' => 'Cuenta', 'url' => ['/user/settings/account']],
                    //['label' => 'FRONTEND', 'url' => '../../frontend/web','visible' => Yii::$app->user->identity->isAdmin || Yii::$app->user->can('admin'),],
                ];
                $menuItems[] = [
                    'label' => 'ADMINISTRACION',
                    'visible' => Yii::$app->user->identity->isAdmin || Yii::$app->user->can('admin'),
                    'items' => [
                        ['label' => 'Usuarios', 'url' => ['/user/admin/index'],],
                        ['label' => 'Organigrama', 'url' => ['/organigrama']],
                        ['label' => 'Prioridades', 'url' => ['/prioridad']],
                        ['label' => 'Estados', 'url' => ['/estado']],
                        ['label' => 'Actividades', 'url' => ['/actividades']],
                    ],
                ];
                $menuItems[] = [
                    'label' => 'REPORTES',
                    'visible' => Yii::$app->user->identity->isAdmin || Yii::$app->user->can('admin'),
                    'items' => [
                        ['label' => 'Semanales', 'url' => ['/actividades/semana'],],                        ['label' => 'Mensuales', 'url' => ['/actividades/mes'],],
                        ['label' => 'Anuales', 'url' => ['/actividades/anio'],],
                    ],
                ];
                $menuItems[] = [
                    'label' => 'AUDITORIA',
                    'visible' => Yii::$app->user->identity->isAdmin || Yii::$app->user->can('admin'),
                    'items' => [
                        ['label' => 'Accesos', 'url' => ['/audit/entry'],],
                        
                        ['label' => 'Acciones', 'url' => ['/audit/trail'],],
                    ],
                ];

                $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link']
                        )
                        . Html::endForm()
                        . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
<?=
Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])
?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; PUCESE <?= date('Y') ?></p>

                <!--p class="pull-right">< ?= Yii::powered() ?></p-->
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
