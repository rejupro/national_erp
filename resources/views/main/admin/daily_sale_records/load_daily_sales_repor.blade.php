<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<h4 class="modal-title" id="modalLabel">View Details</h4>
	</div>
	<div class="modal-body">
		<table class="table">
			<tbody>
				<tr style="background: rgba(50, 181, 61, 0.5)!important; font-size: 14px; text-align: center; font-weight: 400;">
					<th style="width:auto;">Visitor Name</th>
					<td class="center">{{ $report->employee_name }}</td>
					<th style="width:auto;">Visiting Date</th>
					<td class="center">{{ date('d-m-Y', strtotime($report->contract_date)) }}</td>
				</tr>
				<tr>
					<th style="width:auto;">Company Name</th>
					<td class="center">{{ $report->company_name }}</td>
				</tr>
				<tr>
					<th style="width:auto;">Contract Person</th>
					<td class="center">{{ $report->contract_name }}</td>
				</tr>
				<tr>
					<th style="width:auto;">Contract Email</th>
					<td class="center">{{ $report->contract_email }}</td>
				</tr>
				<tr>
					<th style="width:auto;">Designation</th>
					<td class="center">{{ $report->contract_designation }}</td>
				</tr>
				<tr>
					<th style="width:auto;">Contract No.</th>
					<td class="center">{{ $report->contract_mobile }}</td>
				</tr>
				<tr>
					<th style="width:auto;">Interested Product</th>
					<td class="center">{{ $report->interested_product }}</td>
				</tr>
				<tr>
					<th style="width:auto;">Address</th>
					<td class="center">{{ $report->contract_address }}</td>
				</tr>
				<tr>
					<th style="width:auto;">Comments</th>
					<td class="center">{{ $report->comments }}</td>
				</tr>
				<tr>
					<th style="width:auto;">Record Entry Date</th>
					<td class="center">{{ date('d-m-Y', strtotime($report->created_at)) }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-flat bg-purple" data-dismiss="modal">Close</button>
	</div>
</div>