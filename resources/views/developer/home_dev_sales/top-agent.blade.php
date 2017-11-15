<div class="panel panel-default">
	<div class="panel-body">
		<h2 class="text-uppercase bottom20">Top 5 Agents</h2>
		<table class="table table-striped table-bordered" style="width: 100%">
			<thead class="bg-blue">
				<tr>
					<th>Nama</th>
					<th>Email</th>
					<th>Telepon</th>
					<th>Jumlah Pengajuan</th>
				</tr>
			</thead>
			<tbody>
				@for ($i = 1; $i <= 5; $i++)
					<tr>
						<td>John Doe</td>
						<td>johndoe@domain.com</td>
						<td>08123456789</td>
						<td>60</td>
					</tr>
				@endfor
			</tbody>
		</table>
	</div>
</div>