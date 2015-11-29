<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
		<div class="page-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="portlet box portlet-blue">
						<div class="portlet-header">
							<div class="caption">Create Event</div>
							<div class="tools"><i class="fa fa-chevron-up"></i><i data-toggle="modal" data-target="#modal-config" class="fa fa-cog"></i><i class="fa fa-refresh"></i></div>
						</div>
						<div class="portlet-body">
							<!--form role="form" method="post" id="create_eventform" class="form-horizontal"-->
							<form method="post" enctype="multipart/form-data" id="create_eventform" class="form-horizontal">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-md-12">Event Title</label>
											<div class="col-md-12">
												<input type="text" value="<?php echo isset($event->title)? $event->title :'' ?>" placeholder="Enter Title" name="title" class="form-control"/>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group"><label class="col-md-3 control-label">Category</label>
											<div class="col-md-9">
												<select name="category" class="form-control">
													<option>Option 1</option>
													<option>Option 2</option>
													<option>Option 3</option>
													<option>Option 4</option>
													<option>Option 5</option>
												</select>
											</div>
										</div>
										<div class="form-group"><label class="col-md-3 control-label">Starts On</label>
											<div class="col-md-9"><input value="<?php echo isset($event->start_date)? $event->start_date :'' ?>" type="text" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" name="start_date" class="datepicker-default form-control"></div>
										</div>
										<div class="form-group"><label class="col-md-3 control-label">First Prize</label>
											<div class="col-md-9">
												<div class="input-icon"><i class="fa fa-trophy"></i><input value="<?php echo isset($event->prize_one_amt)? $event->prize_one_amt :'' ?>" type="text" placeholder="First Prize" name="prize_one_amt" class="form-control"/></div>
											</div>
										</div>
										<div class="form-group"><label class="col-md-3 control-label">Prize Detail</label>
											<div class="col-md-9">
												<textarea rows="3" name="prize_one_detail" class="form-control"><?php echo isset($event->prize_one_detail)? $event->prize_one_detail :'' ?></textarea>
											</div>
										</div>
										<div class="form-group"><label class="col-md-3 control-label">Third Prize</label>
											<div class="col-md-9">
												<div class="input-icon"><i class="fa fa-trophy"></i><input value="<?php echo isset($event->prize_three_amt)? $event->prize_three_amt :'' ?>" type="text" placeholder="Third Prize" name="prize_three_amt" class="form-control"/></div>
											</div>
										</div>
										<div class="form-group"><label class="col-md-3 control-label">Prize Detail</label>
											<div class="col-md-9">
												<textarea rows="3" name="prize_three_detail" class="form-control"><?php echo isset($event->prize_three_detail)? $event->prize_three_detail :'' ?></textarea>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group"><label class="col-md-3 control-label">Sub Category</label>
											<div class="col-md-9">
												<select class="form-control" name="subcategory" disabled="disabled">
													<option>Option 1</option>
													<option>Option 2</option>
													<option>Option 3</option>
													<option>Option 4</option>
													<option>Option 5</option>
												</select>
											</div>
										</div>
										<div class="form-group"><label class="col-md-3 control-label">Ends On</label>
											<div class="col-md-9"><input value="<?php echo isset($event->start_date)? $event->start_date :'' ?>" type="text" data-date-format="mm-dd-yyyy" name="end_date" placeholder="mm-dd-yyyy" class="datepicker-default form-control"></div>
										</div>
										<div class="form-group"><label class="col-md-3 control-label">Second Prize</label>
											<div class="col-md-9">
												<div class="input-icon"><i class="fa fa-trophy"></i><input value="<?php echo isset($event->prize_two_amt)? $event->prize_two_amt :'' ?>" type="text" placeholder="Second Prize" name="prize_two_amt" class="form-control"/></div>
											</div>
										</div>
										<div class="form-group"><label class="col-md-3 control-label">Prize Detail</label>
											<div class="col-md-9">
												<textarea rows="3"  name="prize_two_detail" class="form-control"><?php echo isset($event->prize_two_detail)? $event->prize_two_detail :'' ?></textarea>
											</div>
										</div>
										
										<div class="form-group"><label for="eventImg" class="col-md-3 control-label">Event Image</label>
											<div class="col-md-9"><input name="eventImg" id="eventImg" type="file"/>
												<p class="help-block">**Maintain Ratio.</p></div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group"><label class="col-md-12">Details</label>
											<div class="col-md-12"><textarea rows="3" name="detail" class="form-control"><?php echo isset($event->detail)? $event->detail :'' ?></textarea></div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group"><label class="col-md-12">Rules</label>
											<div class="col-md-12"><textarea rows="3" name="rules" class="form-control"><?php echo isset($event->rules)? $event->rules :'' ?></textarea></div>
										</div>
									</div>
									<div class="form-actions">
                                        <div class="col-md-offset-4 col-md-8">
											<input type="hidden" value="<?php echo $event->id; ?>" name="eventId">
                                            <button type="submit" class="btn btn-success">Save</button>
                                            &nbsp;
                                            <button type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
