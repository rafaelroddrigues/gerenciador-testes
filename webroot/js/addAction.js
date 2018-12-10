$(document).ready(function(){
    var counter = 2;
    $("#addButton").click(function () {
        if(counter==0){
            counter=1;
        }
    	var newTextBoxDivAction = $(document.createElement('div')).attr({id:'stepActionDiv' + counter, 'class':'small-6 columns text-center'});
    	newTextBoxDivAction.after().html('<label>Action '+ counter + '</label>' + '<select name="action' + counter + '" id="testcasesteps-action">' + '<option hidden selected></option><option value="click">Click</option><option value="type">Type</option><option value="hover">Hover</option><option value="pressKey">Press Key</option>' + '</select>');
        var newTextBoxExpectedResultsDiv = $(document.createElement('div')).attr({id:'stepExpectedResultsDiv' + counter, 'class':'small-6 columns text-center'});
        newTextBoxExpectedResultsDiv.after().html('<label>Web Selector '+ counter + '</label>' + '<input type="text" name="expected_results' + counter + '" id ="testcasesteps-expected-results">');
    	newTextBoxDivAction.appendTo("#stepsGroup");
        newTextBoxExpectedResultsDiv.appendTo("#stepsGroup");
    	counter++;
    });
    $("#removeButton").click(function () {
        if(counter==0){
            alert("No more steps to remove!");
            return false;
        }
    	counter--;
        $("#stepActionDiv" + counter).remove();
        $("#stepExpectedResultsDiv" + counter).remove();
    });
});