<?php$this->pageTitle = Yii::app()->name . ' - 新闻中心';$this->breadcrumbs = array(    '新闻中心',);?><div class="box" style="min-height:335px;padding:0 10px">    <h3>All News</h3>    <div class="box-content article">        <ul>            <?php foreach ($lists as $n) { ?>                <li><span style="float:right;"><?php echo date("M d, Y", $n->create_time) ?></span><?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/bit04.jpg') ?> <?php echo CHtml::link($n->title, array('/article/view', 'id' => $n->article_id)) ?></li>            <?php } ?>        </ul>    </div></div>