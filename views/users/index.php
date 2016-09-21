			<h1>Users</h1>
			<table class="table table-striped table-bordered">
					<thead>
					    <tr>    
					        <th width="10%" class="tnombre">Full Name</th>
					        <th width="10%">E-mail</th>
					        <th width="10%">Phone</th>
					    </tr>
				    </thead>
				    <tbody>
					 <?
						foreach($this->usersList as $key => $value) {
							echo '<tr>';	
							echo '<td>'. $value['firstname'] .' '. $value['lastname'] . '</td>';
							echo '<td>'. $value['email'] . '</td>';
							echo '<td>'. $value['phone'] . '</td>';
							echo '</tr>';
							
						}	
					?>	
				    </tbody>
				</table>
