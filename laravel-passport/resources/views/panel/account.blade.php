@extends("layouts.app")


@section("content")
<div class="container">
	
	<div class="row">	
		<div class="col-sm-12 col-md-6 col-lg-6">
		<div class="title2 m-b-md">
		Update Account<hr />
		</div>
		<form method="Post" action="">
			<div class="form-group">				
				Username <P>   
				<input type="text" class="form-control" name="username" placeholder="Enter your new name" required>			
		  </div>
		  
		  <div class="form-group">				
				Password <P>
				<input type="password" class="form-control" name="password" placeholder="Create New Password" required>
			</div>
		  
		  <div class="form-group">				
				Confirm Password<P><input type="password" class="form-control" name="password" placeholder="Repeat password" required>
			</div>
		  
			API Acces Key<P><input type="password" class="form-control" name="token" placeholder="Token" required>

		  <P>
		  <button type="submit" class="btn btn-dark " name="copy">Copy</button>
		  <button type="submit" class="btn btn-primary " name="Generate">Generate</button>
		  
		  <hr />
		  <p>
		  <input type="submit" class="btn btn-success " name="save" value="Save Changes">
		  <input type="submit" class="btn btn-danger" name="delete" value="Delete my account">

		</form>		
		</div>		
		<div class="col-sm-12 col-md-6 col-lg-6">
		</div>
	</div>
</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection