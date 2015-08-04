$(document).ready(function() {
  function getMessages() {
    $.post("/api/chat.php", {
      action: "getMessages"
    }, function(data) {
      alert(data.101.message);
    }, "json")
  }
  getMessages();
  //setInterval(getMessages, 5000);
});
