<script type="text/javascript">    $(document).ready(function() {	$("#LinkOrder").click(function(event) {	    $('#orderForm').submit();	});	/*	 * 暴力清除商品浏览历史记录！	 */	$("#clearRec").click(function(event) {	    $.ajax({		url: "<?php echo Yii::app()->createUrl('/item/clearHistory') ?>",		async: false	    }),	    $(".recent").html("").append("<div style='padding:20px'>没有商品浏览记录!</div>");	});	/*	 * 加入进货单 	 */	$("#LinkPurchase").click(function(event) {	    $.ajax({		type: "POST",		url: "<?php echo Yii::app()->createUrl('/cart/addCart') ?>",		data: "item_id=" +<?php echo $model->item_id ?> + "&qty=" +<?php echo $model->min_number ?>,		success: function() {		    alert("成功加入采购单");		}	    })	});    });</script><?php$this->pageTitle = $model->title . ' - ' . Yii::app()->name . ' - 查看商品';$this->breadcrumbs = array(    '商品列表' => array('/item-list-all'),    $model->category->name => array('/item/index', 'category_id' => $model->category->id),    $model->title,);?><div class="item-detail background-color-0">    <div class="item-detail-summary clearfix">        <div class="col-span-4">            <div class="item-detail-img">                <a id="single_image" href="<?php echo $model->getMainPicUrl() ?>">		    <?php echo $model->getMainPic() ?></a>            </div>                <p align="center">点击可以查看清晰大图</p>            <!-- JiaThis Button BEGIN -->            <div id="jiathis_style_32x32">                <a class="jiathis_button_qzone"></a>                <a class="jiathis_button_tsina"></a>                <a class="jiathis_button_tqq"></a>                <a class="jiathis_button_renren"></a>                <a class="jiathis_button_kaixin001"></a>                <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>                <a class="jiathis_counter_style"></a>            </div>            <script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>            <!-- JiaThis Button END -->        </div>        <div class="col-span-8">	    <?php echo CHtml::beginForm(array('/cart/addToCart'), 'POST', array('id' => 'orderForm')) ?>            <div class="item-detail-title">                <h3><?php echo $model->title ?></h3>            </div>            <div class="item-detail-meta">		<?php echo CHtml::hiddenField('id', $model->item_id) ?>		<?php echo CHtml::hiddenField('pic_url', $model->getSmallThumb()) ?>		<?php echo CHtml::hiddenField('sn', $model->sn) ?>    		<?php echo CHtml::hiddenField('title', $model->title) ?>		<?php echo CHtml::hiddenField('name', $model->item_id) ?>		<?php echo CHtml::hiddenField('price', $model->shop_price) ?>                <ul>                    <li class="price1">建议零售价：<?php echo $model->currency . $model->market_price ?></li>                    <li class="price2">批发价：<em><?php echo $model->currency . $model->shop_price ?></em></li>                    <li class="sn">商品编号：<?php echo $model->sn ?></li>                    <li class="unit">计量单位：<?php echo $model->unit ?></li>                    <li class="min_number">最少订货量：<?php echo $model->min_number ?> <?php echo $model->unit ?></li>                    <li class="stock">库存：<?php echo $model->stock ?> <?php echo $model->unit ?></li>                    <li class="click_count">浏览次数：<?php echo $model->click_count ?>次</li>                    <li>			<div style='width:150px;margin:0'>我要订购：<input type="number" value="<?php echo $model->min_number ?>" name="qty" class='background-color-4 input-small' style='border-color:#e66f69;color:#fff;margin-top:5px'></div>		    </li>		</ul>            </div>            <div class="d-action clearfix">                <dl class="clearfix">                    <dd class="d-btn-buy">                        <a data-type="order" title="点击此按钮，到下一步确认购买信息。" target="_self" href="#" id="LinkOrder" class="btn btn-primary"  rel="nofollow" >立即购买</a>                    </dd>                    <dd class="d-btn-add">                        <a data-type="purchase"  class="btn btn-info" id="LinkPurchase" href="#" target="_self" title="加入进货单" rel="nofollow">加入进货单</a>                    </dd>                </dl>            </div>	    <?php echo CHtml::endForm(); ?>	    <div class="nav btn-group background-color-5">		<div class="table-cell">		    <div class="btn btn-small arrow-left-white-large background-color-hover-6"></div>		</div>		<div class="table-cell full-width">		    <div class="btn btn-large cursor-default">同类推荐</div>		</div>		<div class="table-cell">		    <div class="btn btn-small arrow-right-white-large no-border background-color-hover-6"></div>		</div>	    </div>            <div class="recommend-item-list">		<?php		$cri = new CDbCriteria(array(		    'condition' => 'item_id != ' . $model->item_id . ' and category_id =' . $model->category_id,		    'limit' => '3'		));		$items = Item::model()->findAll($cri);		if ($items) {		    echo '<ul>';		    foreach ($items as $i) {			?>			<li>			    <div class="image"><?php echo $i->getRecommendThumb() ?></div>			    <div class="title"><?php echo $i->getTitle() ?></div>			    <div class="clear"></div>			    <div class="price">零售价：<span class="currency"><?php echo $i->currency ?></span><em><?php echo $i->market_price ?></em></div>			    <div class="price">批发价：<span class="currency"><?php echo $i->currency ?></span><em><?php echo $i->shop_price ?></em></div>			</li>			<?php		    }		    echo '</ul>';		} else {		    ?>    		<p style="text-align:center">没有找到同类其他商品!</p>		<?php } ?>	    </div>	</div>	<div class="clearfix"></div>	<div class=''>	    <div class="item-detail-content">		<div class="col-span-8 background-color-0" style="overflow:hidden">		    <?php//		    $this->widget('zii.widgets.jui.CJuiTabs', array(//			'tabs' => array(//			    '商品详情' => $this->renderPartial("_desc", array("model" => $model), true),////                '支付方式' => array('content' => 'Content for tab 2', 'id' => 'tab2'),//			    '支付方式' => $this->renderPartial("_payment", array("model" => $model), true),//			    // panel 3 contains the content rendered by a partial view//			    '配送方式' => $this->renderPartial("_shipping", array("model" => $model), true),//			    '常见问题' => $this->renderPartial("_faq", array("model" => $model), true),//			),//			// additional javascript options for the tabs plugin//			'options' => array(//			    'collapsible' => true,//			),//		    ));		    ?>		    <ul class="nav nav-tabs background-color-6" id="myTab">			<li class="active"><a href="#home">商品详情</a></li>			<li><a href="#profile">支付方式</a></li>			<li><a href="#messages">配送方式</a></li>			<li><a href="#settings">常见问题</a></li>		    </ul>		    <div class="tab-content">			<div class="tab-pane active" id="home"><?php echo $this->renderPartial("_desc", array("model" => $model), true) ?></div>			<div class="tab-pane" id="profile"><?php echo $this->renderPartial("_payment", array("model" => $model), true) ?></div>			<div class="tab-pane" id="messages"><?php echo $this->renderPartial("_shipping", array("model" => $model), true) ?></div>			<div class="tab-pane" id="settings"><?php echo $this->renderPartial("_faq", array("model" => $model), true) ?></div>		    </div>		    <script>			$(function() {			    $('#myTab a').click(function(e) {				e.preventDefault();				$(this).tab('show');			    })			})		    </script>		</div>		<div class="col-span-4 background-color-0">		    <div class="nav btn-group background-color-6">			<div class="table-cell">			    <div class="btn btn-small three-white-bars"></div>			</div>			<div class="table-cell full-width">			    <div class="btn btn-large cursor-default">最近浏览过的商品</div>			</div>			<div class="table-cell">			    <div class="btn btn-large background-color-hover-6">				<a id="clearRec" href="javascript:void(0)">清空</a>			    </div>			</div>		    </div>		    <div class="recent-item-list">			<?php $this->widget('widgets.default.WItemHistory') ?>		    </div>		    <div class="nav btn-group background-color-6">			<div class="table-cell">			    <div class="btn btn-small three-white-bars"></div>			</div>			<div class="table-cell full-width">			    <div class="btn btn-large cursor-default">相关资讯</div>			</div>		    </div>		    <div class="box-content">		    </div>	    </div>	</div>    </div></div></div>