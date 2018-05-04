    <div id='footer-div'>
    	&copy; 2017-2018<br/>
    	Designed By - Brajesh singh
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function () {
	        $('#loginpopup').click(function () {
	            $('#modal1').css('margin','auto')
	            			.modal('show');
	        });

			$('#loginpopup').click(function () {
	            $('#dialog-model')
	            			.css('width','350');
	        });
	       
	        /*$('#btnclose').click(function () {
	            $('#modal1').modal('hide');
	        });*/

	        $('#btncross').click(function () {
	            $('#modal1').modal('hide');
	        });

	        /* modal for message modal*/
	        $('#messagepopup').click(function () {
	            $('#message-modal').css('margin','auto')
	            			.modal('show');
	        });

			$('#messagepopup').click(function () {
	            $('#dialog-model-msg')
	            			.css('width','600');
	        });
	        $('#btnmsgcross').click(function () {
	            $('#message-modal').modal('hide');
	        });
	        $('#btnmsgclose').click(function () {
	            $('#message-modal').modal('hide');
	        });
	        
    	});
    </script>
    <style type="text/css">
    	#footer-div{
    		clear: both;
    	}
    </style>
  </body>
</html>