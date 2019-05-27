<!DOCTYPE html>
<html>
<header>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script>


$( "#form1" ).submit(function( event ) {
 
  // Stop form from submitting normally
  event.preventDefault();
 
  // Get some values from elements on the page:
  var $form = $( this ),
    term = $form.serialize,
    url = $form.attr( "action" );
 
  // Send the data using post
  var posting = $.post( url, term );
 
  // Put the results in a div
  posting.done(function( data ) {
    var content = $( data ).find( "#content" );
    alert(content);
/*     $( "#result" ).empty().append( content ); */
  });
});

$(function() {
    $( "#dialog-message" ).dialog({
		width:  screen.width*2/5,
		height: screen.height*2/5, 
		modal: true,
		show: {
	        effect: "blind",
	        duration: 2000
	    },
		hide: {
	        effect: "explode",
	        duration: 2000
		},
		buttons: {
        	Ok: function() {
          	$( this ).dialog( "close" );
        	}
     	},
        close: function() {
            alert("Jerry");
        }
    });
  });
</script>
</header>

<body>

<div id="dialog-message" title="Thank you">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    A member of our team will be in contact with you shortly.
  </p>
  <p>
    Please click OK and return to <b>NetCube Main Page</b>.
  </p>
</div>

<form method="post" action="http://mynewsletter.asia/form.php?form=13" id="form1" name="form1">
	<input type="hidden" name="email" value="bran.zhang@netcube.com.au" />
	<input type="hidden" name="format" value="h" />
    <input type="hidden" name="CustomFields[2]" value="test1">
	<input type="hidden" name="CustomFields[4]" value="0422222222">
	<input type="hidden" name="CustomFields[9]" value="GOOADW">

    <input id="mysubmit" type="submit" value="Submit By Form" /><br />
    <input id="mysubmit2" type="submit" value="Submit By Input Name" /><br />
</form>


<div id="result"></div>

</body>
</html>
