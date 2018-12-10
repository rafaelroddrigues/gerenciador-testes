window.onload = function onOpen()
  {
    var id = 1;
    while (document.getElementById("output"+id)) {
      var pre = document.getElementById("output"+id);
      pre.innerHTML = "Available";
      id+=1;
    }
  }

  function prepareButton(id)
  { 
    var pre = document.getElementById(id);
    var jpre = $(pre);

    $(jpre).parent().siblings().children('div').text("Running");
    var execution = $(jpre).attr('id');

    var executiontc = execution.split('-');
    for (i = 0; i < executiontc.length; i++) { 
      if (i == 0)
        var ws = executiontc[i];
      if (i == 1)
        var pj = executiontc[i];
      if (i == 2)
        var tc = executiontc[i];
      if (i > 2)
        tc = tc + '-' + executiontc[i];
    }

    var url = '/webroot/automation_result_procOpen.php';
  		// The jQuery way to do an ajax request
  		$.ajax({            
    		type: "GET",
    		url: url,
    		data: {
    			workspace: ws,
    			project: pj,
    			testcase: tc
    		},
    		success: function(html){
    	  		// html contains the literal response from the server
              $(jpre).parent().siblings().children('div').text(html);
    		}
  		});
  }
