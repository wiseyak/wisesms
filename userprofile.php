<?php
include('db.php');

require_once('Common/header.php');
?>


  <h2>User Management</h2>

      <button id="create-user" class='btn btn-success btn-sm'><span class="glyphicon glyphicon-user"></span> Create new user</button>
      
      <div id="createform" title="Create new user">
        <p class="validateTips">All form fields are required.</p>
       
        <form>
          <fieldset>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all form-control" placeholder="Full Name" >
            
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="text ui-widget-content ui-corner-all form-control">
            
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="" class="text ui-widget-content ui-corner-all form-control">
            
            <label for="phone">Phone No</label>
            <input type="text" name="phone" id="phone" value="" class="text ui-widget-content ui-corner-all form-control">
        	  
            <label for="nickname">Nickname</label>
            <input type="text" name="nickname" id="nickname" class="text ui-widget-content ui-corner-all form-control">
            
            <label for="username">UserName</label>
            <input type="text" name="username" id="username" value="" class="text ui-widget-content ui-corner-all form-control">
            
            <label for="Password">Password</label>
            <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all form-control">
          	
            <label for="Role">Role</label>
          	<select name="Role" id="role" class='form-control'>
          	   <option value="Admin">Administrator</option>
          	   <option value="user">User</option>
          	</select>
            
            <label for="sex">Gender</label>
          	<select name="sex" id="sex" class='form-control'>
               <option value="M">Male</option> 
               <option value="F">Female</option> 
               <option value="T">Third</option> 
            </select>

          </fieldset>
        </form>
      </div>
   

      <div>
      <table id="userlist" class="table table-striped">
      <tr><th>Name</th><th>Address</th><th>Mobile</th><th>Role</th><th>Action</th></tr>
      <?php
          $record=getActiveUsers();
          while($row=mysql_fetch_assoc($record))
           {
            echo "<tr><td>".$row['Name']."</td><td>".$row['Address']."</td><td>".$row['Mobile']."</td><td>".$row['Role']."<td><button id='edit' class='btn btn-xs'>Edit</button> <button id='delete' class='btn btn-danger btn-xs'>Delete</button><input type='hidden' id='userid' value='".$row['id']."'></td></tr>";
          }

      ?>
      </table>
      </div>
  <script type="text/javascript">
  $("#userlist #edit").click(function(){
        console.log('test edit');
         $( "#updateform" ).dialog( "open" );
      });
  
  $( "#updateform" ).dialog({
      autoOpen: false,
      height:'auto',
      width: 400,
      modal: true,
      buttons: {
        "Create new user": function() {
    
    var name1=$("#name").val();
    var address1=$("#address").val();
    var phone1=$("#phone").val();
    var nickname1=$("#nickname").val();
    var username1=$("#username").val();
    var password1=$("#password").val();
    var role1=$("#role").val();
    var email1=$("#email").val();
    var sex1=$("#sex").val();
    
    
    
    var bValid = true;
          allFields.removeClass( "ui-state-error" );
 
          bValid = bValid && checkNull( name, "Name" );
          bValid = bValid && checkNull( address, "Address" );
          bValid = bValid && checkNull( phone, "phone" );
      bValid = bValid && checkNull( username, "Username" );
          bValid = bValid && checkNull( password, "Password" );
          bValid = bValid && checkNull( email, "Email" );
     if ( bValid ) {
        $.ajax({
      type: "POST",
      url: "createuser.php",
      data: { name: name1, address: address1,phone: phone1, nickname: nickname1,username: username1, password: password1,role:role1,email:email1,sex:sex1 }
    })
      .done(function( msg ) {
      var res=msg.split(',');

       if(res[0]==1)
     {
     var htmltext="<tr><td>"+name1+"</td><td>"+address1+"</td><td>"+phone1+"</td><td>"+role1+"<td><button id='edit' class='btn btn-xs'>Edit</button> <button id='delete' class='btn btn-xs btn-danger'>delete</button><input type='hidden' id='userid' value='"+res[1]+"'></td></tr>";
    $('#userlist').append(htmltext);
     }
     else{}
     $( '#updateform' ).dialog( "close" );
    });
  }
          
        
      },
    Cancel: function() {
          $( this ).dialog( "close" );
        }
    },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }
    
    });
      

      </script>
     
      
<style>
    label, input { display:block; }
    input.text { margin-bottom:10px; width:95%; padding: .4em; }
    fieldset{ padding:0; border:0; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; }
  #createform{display:none; font-size: 12px;}
  #updateform{display:none; font-size: 12px;}
  #create-user{margin-bottom: 20px;}
  .form-control{height: 30px;}
  </style>
<?php require_once('Common/footer.php'); ?>

