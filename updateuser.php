   <div id="updateform" title="update user">
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