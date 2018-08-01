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
            function copyToClipboard(elem) {
                // create hidden text element, if it doesn't already exist
                var targetId = "_hiddenCopyText_";
                var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
                var origSelectionStart, origSelectionEnd;
                if (isInput) {
                    // can just use the original source element for the selection and copy
                    target = elem;
                    origSelectionStart = elem.selectionStart;
                    origSelectionEnd = elem.selectionEnd;
                } else {
                    // must use a temporary form element for the selection and copy
                    target = document.getElementById(targetId);
                    if (!target) {
                        var target = document.createElement("textarea");
                        target.style.position = "absolute";
                        target.style.left = "-9999px";
                        target.style.top = "0";
                        target.id = targetId;
                        document.body.appendChild(target);
                    }
                    target.textContent = elem.textContent;
                }
                // select the content
                var currentFocus = document.activeElement;
                target.focus();
                target.setSelectionRange(0, target.value.length);

                // copy the selection
                var succeed;
                try {
                    succeed = document.execCommand("copy");
                } catch (e) {
                    succeed = false;
                }
                // restore original focus
                if (currentFocus && typeof currentFocus.focus === "function") {
                    currentFocus.focus();
                }

                if (isInput) {
                    // restore prior selection
                    elem.setSelectionRange(origSelectionStart, origSelectionEnd);
                } else {
                    // clear temporary content
                    target.textContent = "";
                }
                return succeed;
            }
        });
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="description" content="Online Examination System">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            text-align: center;
        }

        .center-pills {
            display: flex;
            justify-content: center;
        }
    </style>
</head>