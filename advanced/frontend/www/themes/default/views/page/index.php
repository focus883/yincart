<?php$this->pageTitle = Yii::app()->name . ' - ' . $page->title;$this->breadcrumbs = array(    '帮助中心' => array('/page/helpcenter'),    $page->title,);?><div class="pageWrap">    <h2><?php echo $page->title ?></h2>    <?php echo $page->content ?></div>