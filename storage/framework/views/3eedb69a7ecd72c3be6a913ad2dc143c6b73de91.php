<?php $__env->startSection('sadrzaj'); ?>

<div id="fh5co-product">
		<div class="container">
			
			
			<?php if(session('success')): ?>
	        	<div class="alert alert-success"><?php echo e(session('success')); ?></div>
	        <?php endif; ?>
	        
			

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Naslov</th>
					        <th>Tekst</th>
					        <th>Cena</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<?php $__currentLoopData = $popusti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    		<tr>
					    			<td><?php echo e($p->naslov); ?></td>
					    			<td><?php echo e($p->tekst); ?></td>
					    			<td><?php echo e($p->cena); ?> &euro;</td>
					    		</tr>
					    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    </tbody>
					 </table>
				</div>
			</div>
		</div>
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>