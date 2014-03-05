$(function() {
	$( "#datepicker" ).hide();
	$( "#datepicker" ).datepicker();

	$('#schedule').click(function(){
		if($(this).is(":checked")){
			$( "#datepicker" ).show();
		}else{
			$( "#datepicker" ).hide();
		}
	});

	$('#message_main').submit(function(){
		var emails = '';
		$('input[name=emails]').each(function(){
			if($(this).is(":checked")){
				emails = emails + $(this).val() + ",";
			}
		});
		$('input[name=emails]').val(emails);

		var numbers = '';
		$('input[name=numbers]').each(function(){
			if($(this).is(":checked")){
				numbers = numbers + $(this).val() + ",";
			}
		});
		$('input[name=numbers]').val(numbers);

		//console.log($('input:hidden[name=numbers]').val());
		//console.log($('input:hidden[name=emails]').val());

	});




$('#userlist #delete').on('click',function(){
var currentelement=$(this);
var id=$(this).siblings("#userid").val();
 $.ajax({
			type: "POST",
			url: "deleteuser.php",
			data: { userid: id }
				})
  .done(function( msg ) {
  if(msg==1)
  {
   
   currentelement.closest('tr').remove();
 
}

});
});

var name = $( "#name" ),
      address = $( "#address" ),
      phone = $( "#phone" ),
	  username = $( "#username" ),
      password = $( "#password" ),
      email = $( "#email" ),
      allFields = $( [] ).add( name ).add( address ).add( username ).add( phone ).add( password ).add( email ),
      tips = $( ".validateTips" );
	  
function checkNull( o, n) {
      if ( $.trim(o.val()).length < 1 ) {
        o.addClass( "ui-state-error" );
        updateTips( n + " must cannot be empty ");
        return false;
      } else {
        return true;
      }
    }
	
	function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }


$( "#createform" ).dialog({
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
		 $( '#createform' ).dialog( "close" );
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
	  
	   $( "#create-user" )
      .click(function() {
        $( "#createform" ).dialog( "open" );
      });

       

      


      ////group js
	  
	 var selectedusers='';


$( "#selectable" ).selectable({
stop: function() {
var result = $( "#select-result" ).empty();
selectedusers='';
var flag=1;
$( ".ui-selected", this ).each(function(index,value) {
 var index = $( "#selectable li" ).index( this );
 var ele=$( "#selectable li" ).eq(index);
 if(flag==1)
 {
 selectedusers +=ele.attr('data-userid');
result.append(ele.text());
}
else
{
 selectedusers +=','+ele.attr('data-userid');
result.append( " , " + ele.text());
}
flag++;
});
}
});




// dialog for group 

 $( ".accordion" ).accordion({
collapsible: true
});

$( ".create-form-group" ).dialog({
      autoOpen: false,
      height:'auto',
      width: '550px',
      modal: true,
      buttons: {
        "Create new group": function() {
		
	var grpname=$('#grpName').val();
var members=selectedusers;


$.ajax({
			type: "POST",
			url: "ajaxgrp.php",
			data: { name: grpname,members:members}
				})
		  .done(function( msg ) {
		  	$('.notificationbox').removeClass();
		  if(msg==1)
		  {

$('#notificationbox').html('New group created successfully');
$('#notificationbox').addClass('bg-success');


		  }
		  else
		  {

		  	$('#notificationbox').html('Error while creating group');
$('#notificationbox').addClass('bg-danger');
		  }

		  $( '.create-form-group' ).dialog( "close" );
	  });

          
        
      },
	  Cancel: function() {
          $( this ).dialog( "close" );
        }
		},
      close: function() {
      
      }
	  
	  });
	  
	   $( "#create-group" )
      .click(function() {
        $( ".create-form-group" ).dialog( "open" );
      });

$(".grp-users button").on("click",function(){

var lielement=$(this).parent('li');
console.log(lielement);
var ids=$(this).attr('data-id').split(',');
var grpid=ids[1];
var userid=ids[0];
$.ajax({
			type: "POST",
			url: "deleteuserfromgrp.php",
			data: { grpid: grpid,userid:userid}
				})
		  .done(function( msg ) {
		  	$('.notificationbox').removeClass();
		  if(msg==1)
		  {

$('#notificationbox').html('User removed from group');
$('#notificationbox').addClass('bg-success');
lielement.remove();

		  }
		  else
		  {

		  	$('#notificationbox').html('Error while removing user');
$('#notificationbox').addClass('bg-danger');
		  }

		
	  });

})


    });
