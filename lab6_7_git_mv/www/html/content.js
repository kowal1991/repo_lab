alert("linsert");
function restore_options(){
  chrome.storage.sync.get({
    'api_key': ''
  },
  function(items){
    document.getElementById('myxtest').value = items.api_key;
    alert(items.api_key);
  });
}
restore_options();
