 $(document).ready(function(){
   $('#reg_form').submit(function(e){
    //console.log('submitted')

    $.ajax({
      type: "POST",
      url: "response.php",
      data: $("#reg_form").serialize(),
      success: function(data){
        console.log(data)
      }
      
    })

    //e.preventDefault();
   })
  })
