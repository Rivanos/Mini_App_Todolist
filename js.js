  $("#result").on("change", ".tache", function(){
    if (this.checked) {
      var value = $(this).val();
      console.log(value);
      $.ajax({
        type : "POST",
        url : "contenu.php",
        data : {tache:value},
        success: function(html_response){
          $("#result").html(html_response);

  }
  });
    }
  })


  $("#result").on("change",".archive",function(){
    if (this.checked) {
      var value = $(this).val();
      console.log(value);
      $.ajax({
        type : "POST",
        url : "contenu.php",
        data : {archive:value},
        success : function(hml_response){
          $("#result").html(hml_response);
        }
     });
    }
  })
