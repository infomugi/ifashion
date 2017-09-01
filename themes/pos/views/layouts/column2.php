<?php $this->beginContent('//layouts/main'); ?>
<BR>
	<BR>
		<div class="row-fluid">
			<div class="span9">
				<div class="main table-responsive">
					<?php echo $content; ?>
				</div><!-- content -->
			</div>

			<div class="span3">
				<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>'Menu',
					));
				$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'sidebar'),
					));
				$this->endWidget();
				?>
			</div><!-- sidebar span3 -->
		</div>
		<?php $this->endContent(); ?>
