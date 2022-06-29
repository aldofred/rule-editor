<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [];
    /* '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Déconnexion (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>', */

    if (Yii::$app->user->isGuest){
        $menuItems[] = ['label' => 'Connexion', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            ['label'=> 'Déconnexion','url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']],
            ['label' => 'Home', 'url' => ['/site/index']],
            /* ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Contact', 'url' => ['/site/contact']], */
            ['label' => 'Règles', 'url' => ['/regle/index']],
            ['label' => 'Type de Règle', 'url' => ['/type-regle/index']],
            ['label' => 'Indicateur', 'url' => ['/indicateur/index']],
            ['label' => 'Conditions', 'url' => ['/condition/index']],
            ['label' => 'Faits', 'url' => ['/fait/index']],
            ['label' => 'Utilisateurs', 'url' => ['//index']],
            ['label' => 'Opérateurs de comparaison', 'url' => ['/operateur-comparaison/index']]
        ];

    }

    //return var_dump($menuItems);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' =>  
            $menuItems
            
            //['label' => 'Liens Règles - Conditions', 'url' => ['/regle-condition/index']],
            
            /* Yii::$app->user->isGuest ? (
                ['label' => 'Connexion', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Déconnexion (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ) */
        
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
