<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="/FinalProject/css/bootstrap.min.css" >
  <script src="/FinalProject/js/jquery-3.3.1.slim.min.js"></script>
  <script src="/FinalProject/js/jquery.min.js"></script>
  <script src="/FinalProject/js/popper.min.js" ></script>
  <script src="/FinalProject/js/bootstrap.min.js" ></script>   
  <script src="/FinalProject/js/all.js" ></script>   
  <link rel="stylesheet" href="/FinalProject/css/all.css">
  <script>
   
    function getQuestion(question)
    {
      $.ajax({url: question + ".php", success: function(result){
                     $("#questionField").html(result);
                     }});
    }
    $(document).ready(function(){
      $("#questionCount").val('0').change(); 
      $('#questionCount').on('change', function(e) {
        $("#questionField").empty();
        if(this.value==0) return;
        getQuestion("question"+this.value);
        $(e.target).attr('disabled', true);
       });
       $(document).on('click', "button[class*='close']", function(e){
        var answerclass = $(e.target);
        answerclass.prop('disabled', true);
        answerclass.parent().parent().find('*').attr('disabled', true);
      }); 
      $(document).on('click', "button[class*='rest-answer']", function(e){
        var answerclass = $(e.target);
        answerclass.prop('disabled', true);
        answerclass.parent().parent().parent().find('*').attr('disabled', false);
      }); 
      $("#addSubject").submit( function(eventObj) {
     
      return true;
  });
    $("#addStudent").click(function(){
      var o = '<input style="margin-top:1%;" type="email" class="form-control" id="UserEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email[]">'
      $(this).before(o);
    });
    
});
  </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="description" content="LoginPage">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php //  <link rel="stylesheet" type="text/css" media="screen" href="style.css" />?>
 <style>
    *{text-align:center;}
    .center-pills {
    display: flex;
    justify-content: center;
    }
  </style>
  </head>