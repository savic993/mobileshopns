<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<div class="row">
		<div id="autor">
			<img title="autor" src="slike/slika.jpg" alt="ja"/>
			<h3>Nemanja Savić 21/12</h3>
			<p>Rođen 13.11.1993. godine. Završio srednju tehničku školu 17. septembar u Lajkovcu. 2012. godine upisao višu <a target="_blank" href="http://ict.edu.rs/">ICT školu</a>, na smeru internet tehnologije.</p>	
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>