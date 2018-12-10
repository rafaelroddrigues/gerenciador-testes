$(document).ready(function(){
    	$('#addButton').on('click', function(){
		// get the last element which ID starts with ^= "text"
		var $actionDiv = $('div[id^="stepActionDiv"]:last');
		var $expectedResultsDiv = $('div[id^="stepExpectedResultsDiv"]:last');
		var $separadorDiv = $('div[id^="separador"]:last');

		// Read the Number from that element's ID (i.e: 3 from "text3")
		// And increment that number by 1
		var divId = parseInt( $actionDiv.prop("id").match(/\d+/g), 10 ) +1;
		var expectedResultId = parseInt( $expectedResultsDiv.prop("id").match(/\d+/g), 10 ) +1;
		var separadorId = parseInt( $separadorDiv.prop("id").match(/\d+/g), 10 ) +1;

		// Clone it and assign the new ID (i.e: from num 4 to ID "text4")
		var $newActionDiv = $actionDiv.clone().prop('id', 'stepActionDiv'+divId );
		$newActionDiv.find('label#action').html("Action "+divId);
		$newActionDiv.find('select').each(function() {
			 $(this).attr("name",'action'+divId);
		});
		$newActionDiv.find('label[name^="text"]').each(function() {
			$(this).remove();
		});
		$newActionDiv.find('input#textDin').each(function() {
			$(this).remove();
		});
		var $newExpectedResultDiv = $expectedResultsDiv.clone().prop('id', 'stepExpectedResultsDiv'+divId );
		$newExpectedResultDiv.find('label').html("Web Selector  "+divId);
		$newExpectedResultDiv.find(':input').attr("name",'expected_results'+divId).val("");
		var $newSeparadorDiv = $separadorDiv.clone().prop('id', 'separador'+divId );

		// Finally insert element wherever you want
		$separadorDiv.after( $newExpectedResultDiv );
		$separadorDiv.after( $newActionDiv );
		var $addExpectedResultsDiv = $('div[id^="stepExpectedResultsDiv"]:last');
		$addExpectedResultsDiv.after( $newSeparadorDiv );
	});
	
	$('#removeButton').on('click', function(){
		if(typeof $('#stepsGroup').children().get(3) === "undefined")
			return false;
		var $currentParentDiv = $(this).closest('div');
		var $childrenDivs = $('#stepsGroup').children();
		$('div[id^="stepActionDiv"]:last').remove();
		$('div[id^="stepExpectedResultsDiv"]:last').remove();
		$('div[id^="separador"]:last').remove();
	});
	
	$(document).on('change',"select",function() {
    var $currentParentDiv = $(this).closest('div');
	var $divParentId = $(this).closest('div').parent().closest('div').attr('id');
	var $divParentIdOnly = $divParentId.substring($divParentId.length - 1);
	if (this.value == 1) {
       $($currentParentDiv).append("<label name=\"text" + $divParentIdOnly + "\">Text " + $divParentIdOnly + "</label> <input type=\"text\" name=\"text" + $divParentIdOnly + "\" id=\"textDin\" required=\"required\" oninvalid=\"this.setCustomValidity('This field cannot be left empty')\" oninput=\"this.setCustomValidity('')\"/>");
	} else
       $("[name=text" + $divParentIdOnly + "]").remove();
    });
});
