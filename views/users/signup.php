<form  method="post" action="/users/create/" enctype="multipart/form-data">
	<div class="form-group required">
		<label for="firstname">First Name</label>
		<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
	</div>
	<div class="form-group required">
		<label for="lastname">Last Name</label>
		<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
	</div>
	<div class="form-group">
		<label for="phone">Phone</label>
		<input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone">
	</div>
	<div class="form-group required">
		<label for="email">Email address</label>
		<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
	</div>
	<div class="form-group required">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
