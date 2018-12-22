
<html>
<head>
<title>Primary window</title>
<style>
.up {
  background: black;
}
.down {
  background: red;
}
</style>
</head>
<body>



<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
<script>
function ajaj(){
  var name = 'impshum';
  $.ajax({
    type: "POST",
    data: {
      name: name
    },
    url: 'show.php',
    success: function(data) {
      console.log(data);
    },
    error: function(error) {
      console.log(error);
    }
  });
}

var notes = window.open('show.html', 'newwindow', 'width=300,height=250');

function go(){
  $(notes.document).find('.msg').text('FUCK');
}


</script>

</body>
</html>
