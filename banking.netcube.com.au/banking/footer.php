    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
    <!-- Morris Charts JavaScript 
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    <script src="js/bscript.js"></script>-->
    
<div class="modal fade popupBox" id="myModalErrorMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-padding">
		<div class="modal-content">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="myModalErrorMsgClose"></button>
		<div class="modal-body"> 
        <!--popupBox3 start-->
			<div style="display:;">         
            <div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3 class="popup-one-big" id="myModalErrorMsgInfo" style="text-align: center">
					<span>
						Your credit check application is being processed.
					</span>
					</h3>  
				</div>
				<div align="center" style="padding-top: 20px">
	                <input type="button" class="btn btn-primary" value="Close" onClick="$('#myModalErrorMsgClose').eq(0).trigger('click')">
				</div>
				<!--  -->
				<div class="line">
				</div>
				<p style="padding:15px">
					To close this window, please press keyboard button "ESC" or click on button "Close". 
				</p>
                <a href="#" data-toggle="modal" data-target="#myModalErrorMsg" id="myModalErrorMsgOpen"></a>
			</div>
        </div>
        <!--popupBox3 over--> 
		</div>
		</div>
	</div>
</div>
    </body>
    
    </html>