<html>
  <head>
    <title>View</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <body>
	
	  <div class="container"><br><br><br>
	  
	     <h3 align="center">Insert data using codeigniter</h3><br />
		 
		  <form method="post" action="<?php echo base_url()?>main/form_validation">
		  
		  <?php
		  
		  if($this->uri->segment(2) == "inserted"){
			  
			  
			  echo '<p class="text-success">Data inserted</p>';
			  
		  }
		  
		  
		  
		  ?>
		  
		  
		  
		  <div class="form-group">
		  <label>Enter First name</label>
		  <input type="text" name="first_name" class="form-control">
		  <span class="text-danger"><?php echo form_error("first_name"); ?>
		  </span>
		  </div>
		  
		  <div class="form-group">
		  <label>Enter last name</label>
		  <input type="text" name="last_name" class="form-control">
		  <span class="text-danger"><?php echo form_error("last_name"); ?>
		  </span>
		  </div>
	     
		   <div class="form-group">
		  
		  <input type="submit" name="insert" value="Insert" class="btn btn-info"/>
		  </div>
		  
		 </form>
		 <br><br>
		 <h3>Fetch data from table using codeigniter</h3>
		 <div class="table-responsive">
		  <table class="table table-bordered">
		  <tr>
		   <th>First Name</th>
		   <th>Last Name</th>
		   <th>Delete</th>
		  </tr>
		  <?php
            if($fetch_data->num_rows()>0)	
            {
              foreach($fetch_data->result() as $row)
			  {

              ?>
              <tr>
                <td><?php echo $row->first_name;?></td>
				
                <td><?php echo $row->last_name;?></td>
				<td><a href="#" class="delete_data" first_name="<?php echo $row->first_name;?>">Delete</a></td>
              </tr>				
		      <?php
			  }
			}
			else
			{
              ?>
                <tr>
                 <td colspan="3">No data found</td>
                </tr>
          <?php  
			}

          ?>			
		</table>
        </div>
        <script>
         $(document).ready(function(){
          $('.delete_data').click(function(){
          var first_name=$(this).attr("first_name");
          if(confirm("Are you sure you want to delete this?")){

              window.location="<?php echo base_url(); ?>main/delete_data/"+first_name;

          }		  
          else{
              
			   return false;
           
		  }		   
		  
		  });
		  
		 });
			  
			  
		</script>	  
			  
			  
	 </body>  
	 
	 </html>