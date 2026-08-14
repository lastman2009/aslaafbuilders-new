<?php include './header.php'; ?>
<?php include './aside.php'; ?>


<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default card-view add_product add_tags">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Add Tags</label>
                                    <div class="mt-10">
										<select multiple data-role="tagsinput">
											<option value="Amsterdam">Amsterdam</option>
											<option value="Washington">Washington</option>
											<option value="Sydney">Sydney</option>
										</select>
									</div>
                                </div>
								<div class="form-group">
                                    <label class="control-label mb-10 text-left">Description</label>
                                    <textarea class="form-control textarea-product" rows="5"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="button" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- /Row -->







    <?php include './footer.php'; ?>

