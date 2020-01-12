<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Management', 'options' => ['class' => 'header']],
                    ['label' => 'Users', 'icon' => 'user-o', 'url' => ['/user/index'], 'active' => Yii::$app->controller->id == 'user'],
                    ['label' => 'Shop', 'icon' => 'folder', 'items' => [
                        ['label' => 'Brands', 'icon' => 'file-o', 'url' => ['/shop/brand/index'], 'active' => Yii::$app->controller->id == 'shop/brand'],
                        ['label' => 'Tags', 'icon' => 'file-o', 'url' => ['/shop/tag/index'], 'active' => Yii::$app->controller->id == 'shop/tag'],
                        ['label' => 'Categories', 'icon' => 'file-o', 'url' => ['/shop/category/index'], 'active' => Yii::$app->controller->id == 'shop/category'],
                        ['label' => 'Characteristic', 'icon' => 'file-o', 'url' => ['/shop/characteristic/index'], 'active' => Yii::$app->controller->id == 'shop/characteristic'],
                        ['label' => 'Products', 'icon' => 'file-o', 'url' => ['/shop/product/index'], 'active' => Yii::$app->controller->id == 'shop/product'],
                        ['label' => 'Menus', 'icon' => 'file-o', 'url' => ['/shop/menu/index-root-node'], 'active' => Yii::$app->controller->id == 'shop/menu'],
                    ]],
                ],
            ]
        ) ?>

    </section>

</aside>
