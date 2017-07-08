<?php
use hscstudio\mimin\components\Mimin;

$menuItems =
        [
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => '@web/gii','visible' => !Yii::$app->user->isGuest],
                             
              [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'Manajemen User / Group',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                    ['label' => 'App. Route', 'icon' =>  'fa fa-circle-o', 'url' => '@web/mimin/route','visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Role', 'icon' =>  'fa fa-circle-o', 'url' => '@web/mimin/role','visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User', 'icon' => ' fa fa-circle-o', 'url' => '@web/mimin/user','visible' => !Yii::$app->user->isGuest],
                   ]]
                        ,
                   [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'Setting',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
               
                      ['label' => 'Setting Tahun Ajaran', 'icon' => 'fa fa-circle-o', 'url' => "@web/setting/index",],
                   ]],
                   
                   [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'Master',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                     ['label' => 'Tahun Ajaran', 'icon' => 'fa fa-circle-o', 'url' => "@web/thn-ajaran/index",],
                  ['label' => 'Biaya', 'icon' => 'fa fa-circle-o', 'url' => "@web/biaya/index",],
                
                      ['label' => 'Karyawan', 'icon' => 'fa fa-circle-o', 'url' => "@web/karyawan/index",],
                        ['label' => 'Siswa', 'icon' => 'fa fa-circle-o', 'url' => "@web/siswa/index",],      
                   ]]
                        ,
                   [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'Transaksi',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                     ['label' => 'Pembayaran SPP', 'icon' => 'fa fa-circle-o', 'url' => "@web/spp/index",],
                   ]]
                        ,
                   
                ];
 $menuItems = Mimin::filterMenu($menuItems);
        
?>
<aside class="main-sidebar">

    <section class="sidebar">


              
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
