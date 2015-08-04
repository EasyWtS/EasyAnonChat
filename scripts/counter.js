$(document).ready(function() {
  function setOnline() {
    $.post("/api/counter.php", {
      action: "setOnline"
    }, function(data) {
      $("#online").text(data.response);
    }, "json")
  }
  setOnline();
  setInterval(setOnline, 5000);
});
