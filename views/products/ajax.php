<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
?>


<?php //  Pjax::begin();  ?>
    <div id="LayoutGrid11">
        <div class="row">

            <?php $i = 0; $a = 0;
            foreach ($dataProvider->getModels() as $product) : ?>

                <div class="col-1">
                    <?php if($product->new):  ?>
                        <div class="podnew" style="position: absolute; width: 79px; height: 24px;">
                            <?= Html::img("@web/images/new.png", ['alt' => 'Новинка', 'class'=>'new'])  ?></div>
                    <?php endif;  ?>

                    <?php if($product->sale):  ?>
                        <div class="podnew" style="position: absolute; width: 79px; height: 24px;">
                            <?= Html::img("@web/images/sale.png", ['alt' => 'Новинка', 'class'=>'new'])  ?></div>
                    <?php endif;  ?>
                    <div id="wb_Image1">
                        <img src="/images/disk.jpg" id="Image1" alt="">
                    </div>
                    <div id="wb_Text8">
                        <span id="wb_uid3"><strong><?= $product->price ?> РУБ.</strong></span>
                    </div>
                    <div id="wb_Text11">
                        <span id="wb_uid4"><?= $product->name ?></span>
                    </div>
                    <div id="wb_FontAwesomeIcon6">
                        <div id="FontAwesomeIcon6"><i class="fa fa-shopping-bag">&nbsp;</i></div>
                    </div>
                </div>
                <?php $i++ ?>

                <?php if ($i % 1 == 0): ?>


                    <div class="line2" style="
                                    background-color: #A71F37;
                                    width: 1px;
                                    height: 200px;
                                    margin-top: 40px;
                                     position: static;
                                     float: left;">

                    </div>

                <?php endif; ?>
                <?php if ($i % 3 == 0): ?>
                    <div class="line3" style="background-color: #A71F37; width: 100%;
                            height: 1px; margin-top: 10px; position: static; float: left;"></div>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if(!$dataProvider->getModels()): ?>
                <div id="wb_Text8">
                    <span id="wb_uid3"><strong>Ничего не найдено</strong></span>
                </div>

            <?php endif; ?>
           
            <div class="wert3">
                <?php

                echo \yii\widgets\LinkPager::widget([
                    'pagination'=>$dataProvider->pagination,


                ]);

                ?>
<!--                --><?php //  Pjax::end();  ?>

            </div>
        </div>

    </div>
