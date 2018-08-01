<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .vertical-center {
            height: 99%;
            width: 100%;

            text-align: center;
            /* align the inline(-block) elements horizontally */
            font: 0/0 a;
            /* remove the gap between inline(-block) elements */
        }

        .vertical-center:before {
            /* create a full-height inline block pseudo=element */
            content: ' ';
            display: inline-block;
            vertical-align: middle;
            /* vertical alignment of the inline element */
            height: 99%;
        }

        .vertical-center>.container {
            max-width: 100%;
            display: inline-block;
            vertical-align: middle;
            /* vertical alignment of the inline element */
            font: 16px/1 "Helvetica Neue", Helvetica, Arial, sans-serif;
            /* <-- reset the font property */
        }

        @media (max-width: 768px) {
            .vertical-center:before {
                /* height: auto; */
                display: none;
            }
            
        }
        * {
            text-align: center;
        }

        .center-pills {
            display: flex;
            justify-content: center;
        }
      
    </style>
    <link rel="stylesheet" href="css/all.css">
    <script>
        function getQuestion(question) {
            $.ajax({
                url: "questionTemplate.php?max="+question,
                success: function(result) {
                    $("#questionField").html(result);
                }
            });
        }
        $(document).ready(function() {
            var cookieValue = $.cookie("first");
            if(cookieValue!="no")$('.tool_tip').tooltip({trigger:'manual'}).tooltip('show');
            $("[closer*='tip']").click(function(){$.cookie("first","no");$('.tool_tip').tooltip('hide');});
            $("#questionCount").val('0').change();
            $('#questionCount').on('change', function(e) {
                $("#questionField").empty();
                if (this.value == 0) return;
                getQuestion(this.value);
                $(e.target).attr('disabled', true);
            });
            $(document).on('click', "button[class*='close']", function(e) {
                var answerclass = $(e.target);
                answerclass.prop('disabled', true);
                answerclass.parent().parent().find('*').attr('disabled', true);
            });
            $(document).on('click', "button[class*='rest-answer']", function(e) {
                var answerclass = $(e.target);
                answerclass.prop('disabled', true);
                answerclass.parent().parent().parent().find('*').attr('disabled', false);
            });
            $(document).on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                if(button.hasClass("std-info")){
                var recipient = button.data('whatever');
                var modal = $(this)
                $.ajax({
                type: "POST",
                url: "Statistics.php?qid="+recipient,
                success: function(result) {
                    $("#statistic-container").html(result);
                }
            });
                return;
                }
            });
            $("#addSubject").submit(function(eventObj) {

                return true;
            });
            $("[id*='addStudent']").click(function() {
                var o = '<input style="margin-top:1%;" type="email" class="form-control" id="UserEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email[]" required>'
                $(this).before(o);
            });

            $("#copy").on("click", function() {
                ctc("#copytarget");
                $(".alert").alert('close');
            });
            $("[class*='copy']").on("click", function() {
                $(this).popover('show');
                 ctc(this);
                 setTimeout(function () {
                      $("[class*='copy']").popover('hide');
                 }, 1000);
            });
            $('#addEamilModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                $("[class*='subIdModal']").val(recipient);
            });
           
            function ctc(element) {
                    var $temp = $("<input>");
                    $("body").append($temp);
                    $temp.val($(element).val()).select();
                    document.execCommand("copy");
                    $temp.remove();
            }
            
        });
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="description" content="Online Examination System">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>