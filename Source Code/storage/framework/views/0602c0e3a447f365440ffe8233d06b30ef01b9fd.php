<?php $__env->startSection('content'); ?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>  <?php echo e(trans('labels.languages')); ?> <small><?php echo e(trans('labels.ListingAllLanguages')); ?>...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li class="active"> <?php echo e(trans('labels.languages')); ?></li>
    </ol>
  </section>
  
  <!--  content -->
  <section class="content"> 
    <!-- Info boxes --> 
    
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?php echo e(trans('labels.ListingAllLanguages')); ?> </h3>
            <div class="box-tools pull-right">
            	<a href="<?php echo e(URL::to('admin/manageAppLabel')); ?>" type="button" style="display:inline-block; width: auto;" class="btn btn-block btn-primary android-hide"><?php echo e(trans('labels.ManageLabels')); ?></a>
                <a href="<?php echo e(URL::to('admin/addLanguages')); ?>" type="button" style="display:inline-block; width: auto; margin-top: 0;" class="btn btn-block btn-primary"><?php echo e(trans('labels.AddLanguage')); ?></a>
            </div>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">              		
				  <?php if(count($errors) > 0): ?>
					  <?php if($errors->any()): ?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo e($errors->first()); ?>

						</div>
					  <?php endif; ?>
				  <?php endif; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th><?php echo e(trans('labels.ID')); ?></th>
                      <th><?php echo e(trans('labels.Language')); ?></th>
                      <th><?php echo e(trans('labels.Icon')); ?></th>
                      <th><?php echo e(trans('labels.Code')); ?></th>
                      <th><?php echo e(trans('labels.Action')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(count($result['languages'])>0): ?>
                    <?php $__currentLoopData = $result['languages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$languages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($languages->languages_id); ?></td>
                            <td><?php echo e($languages->name); ?></td>
                            <td><img src="<?php echo e(asset('').'/'.$languages->image); ?>" width="25px" alt=""></td>
                            <td><?php echo e($languages->code); ?></td>
                            <td><a data-toggle="tooltip" data-placement="bottom" title=" <?php echo e($languages->name); ?>" href="editLanguages/<?php echo e($languages->languages_id); ?>" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                            <a data-toggle="tooltip" data-placement="bottom" title=" <?php echo e($languages->name); ?>" id="deleteLanguageId" languages_id ="<?php echo e($languages->languages_id); ?>" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                           </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php else: ?>
                   <tr>
                   		<td colspan="5"><?php echo e(trans('labels.Nolanguageexist')); ?></td>
                   </tr>
                   <?php endif; ?>
                  </tbody>
                </table>
                <div class="col-xs-12 text-right">
                	<?php echo e($result['languages']->links()); ?>

                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
        <!-- deletelanguagesModal -->
	<div class="modal fade" id="deleteLanguagesModal" tabindex="-1" role="dialog" aria-labelledby="deleteLanguagesModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="deleteLanguagesModalLabel"><?php echo e(trans('labels.DeleteLanguages')); ?></h4>
		  </div>
		  <?php echo Form::open(array('url' =>'admin/deletelanguage', 'name'=>'deletelanguages', 'id'=>'deletelanguages', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

				  <?php echo Form::hidden('action',  'delete', array('class'=>'form-control')); ?>

				  <?php echo Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'languages_id')); ?>

		  <div class="modal-body">						
			  <p><?php echo e(trans('labels.confrimLanguageDelete')); ?></p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('labels.Close')); ?></button>
			<button type="submit" class="btn btn-primary" id="deletelanguages"><?php echo e(trans('labels.Delete')); ?></button>
		  </div>
		  <?php echo Form::close(); ?>

		</div>
	  </div>
	</div>
    
    <!--  row --> 
    
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>