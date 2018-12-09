


document.getElementById("changebutton").addEventListener("click", function() {

  var api_key = document.getElementById("account_number").value;
	
  chrome.storage.sync.set({
    'api_key': api_key
  },
  function(){
    alert('API Key  Saved!');
  });
 

	document.getElementById("account_number").value ="HACK_VALUE12345";
});