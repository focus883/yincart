<?php$this->pageTitle = Yii::app()->name . ' - ' . $page->title;$this->breadcrumbs = array(    'HelpCenter' => array('/page/helpcenter'),    $page->title,);?><div id="customer-login">    <div class="row" style='padding:0 10px'>        <h2 class='title'><?php echo $page->title ?></h2>        <?php echo $page->content ?>    </div></div>