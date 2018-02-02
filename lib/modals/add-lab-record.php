<!-- Treatment Records-->
<div aria-hidden="true" aria-labelledby="myModalLabel-<?php echo $MR['MR_ID']; ?>" role="dialog" tabindex="-1" id="labtest" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel-<?php echo $MR['MR_ID']; ?>">Laboratory Request</h4>
			</div>
		<div class="modal-body">
		<form class="form-horizontal" role="form">
			<div class="form-group">
					<label  class="col-lg-4 control-label">Laboratory Test</label>
					<div class="col-lg-4">
						<select class="form-control">
							<option hidden>Select</option>
							<option>Blood Chemistry</option>
							<option>Fecalysis</option>
							<option>Hematology</option>
							<option>Urinalysis</option>
						</select>
					</div>
				</div>
				<div class="form-group">
				<label  class="col-lg-4 control-label">Test Requested</label>
					<div class="col-lg-4">
						<input type="text"  class="form-control" >
					</div>
				</div>
				<table  class="table table-striped table-advance table-hover" id="example">
					<thead>
					<tr>
						<th class="text-center"><i class="icon-beaker"></i> Laboratory Type</th>
						<th class="text-center"><i class="icon-medkit"></i> Test Requested</th>
					</tr>
					</thead>
					<tbody>
						<tr class="gradeX">
						<td class="text-center">Hemtology</td>
						<td class="text-center">CBC</td>
						</tr>
					</tbody>
			</table>
		</form>
	</div>
	<div class="modal-footer">
		<span id="Error_Message-TRMT-<?php echo $MR['MR_ID']; ?>" style="float: left; font-weight: bold;" class="text-danger"></span>
		<span id="Success_Message-TRMT-<?php echo $MR['MR_ID']; ?>" style="float: left; font-weight: bold;" class="text-success"></span>
		<a data-dismiss="modal" class="btn btn-shadow btn-default">Cancel</a>
		<a class="btn btn-shadow btn-success" onclick="addTreatment(<?php echo $MR['MR_ID']; ?>)"><i class="icon-plus"></i>&nbsp; Add</a>
	</div>
	</div>
	</div>
</div>
<!-- modal -->