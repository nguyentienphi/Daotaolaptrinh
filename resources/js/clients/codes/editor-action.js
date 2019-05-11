$(document).ready(function(){
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	var codeEditorElement = $(".codemirror-textarea")[0];
    var editor = CodeMirror.fromTextArea(codeEditorElement, {
        mode: "application/x-httpd-php",
        lineNumbers: true,
        matchBrackets: true,
        theme: "ambiance",
        lineWiseCopyCut: true,
        undoDepth: 200
      });
    editor.setValue('<?php\necho "Hello World!";\n \n\n\n\n?>');

	$(document).on('click', '#run', function(e){
		e.preventDefault();
		$("#error").html("").hide();
		var editorCode = editor.getValue();

		if(editorCode != ''){
    		$.ajax({
    			url: '/write-code',
    			type: 'POST',
    			dataType: 'json',
    			data: {"input":editorCode},
    			success:function(response){
    				alert(response.success)
    			},
    			complete:function(){
    				$.ajax({
    					url: '/show-code',
    					type: 'GET',
    					success:function(response){
    						console.log("response:  "+response);
    						$("#result").html(response)	;
    					},
    					error:function(response){
                            var errors = JSON.parse(response.responseText);
                            $('#result').html(errors.message)
                        }
    				});
    			}
    		});
		} else{
			$("#error").html("Code should not be empty").show();
		}

	});

	$(document).on('click', '#refresh', function(e){
		e.preventDefault();
		$("#error").html("").hide();
		location.reload();
	});

    $(document).on('click', '.code-app', function () {
        var element = $(this).closest('div').find('.code-app')
        $(element).each(function () {
            $(this).removeClass('code-active')
        })

        $(this).addClass('code-active')
    })
});
