function getQuestion(t) {
    $.ajax({
        url: "questionTemplate.php?max=" + t,
        success: function(t) {
            $("#questionField").html(t)
        }
    })
}
$(document).ready(function() {
    function t(t) {
        var e = $("<input>");
        $("body").append(e), e.val($(t).val()).select(), document.execCommand("copy"), e.remove()
    }
    "no" != $.cookie("first") && $(".tool_tip").tooltip({
        trigger: "manual"
    }).tooltip("show"), $("[closer*='tip']").click(function() {
        $.cookie("first", "no"), $(".tool_tip").tooltip("hide")
    }), $("#questionCount").val("0").change(), $("#questionCount").on("change", function(t) {
        $("#questionField").empty(), 0 != this.value && (getQuestion(this.value), $(t.target).attr("disabled", !0))
    }), $(document).on("click", "button[class*='close']", function(t) {
        var e = $(t.target);
        e.prop("disabled", !0), e.parent().parent().find("*").attr("disabled", !0)
    }), $(document).on("click", "button[class*='rest-answer']", function(t) {
        var e = $(t.target);
        e.prop("disabled", !0), e.parent().parent().parent().find("*").attr("disabled", !1)
    }), $("#refresh-subjects").click(function() {
        $("#subject-container").html(""), $.ajax({
            url: "subjectsCreator.php",
            success: function(t) {
                $("#subject-container").html(t)
            }
        })
    }), $(document).on("show.bs.modal", function(t) {
        var e = $(t.relatedTarget);
        if (e.hasClass("std-info")) {
            var o = e.data("whatever");
            $(this);
            $.ajax({
                type: "POST",
                url: "Statistics.php?qid=" + o,
                success: function(t) {
                    $("#statistic-container").html(t)
                }
            })
        }
    }), $("[id*='addStudent']").click(function() {
        $(this).before('<input style="margin-top:1%;" type="email" class="form-control" id="UserEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email[]" required>')
    }), $("#copy").on("click", function() {
        t("#copytarget"), $(".alert").alert("close")
    }), $("[class*='copy']").on("click", function() {
        $(this).popover("show"), t(this), setTimeout(function() {
            $("[class*='copy']").popover("hide")
        }, 1e3)
    }), $("#addEamilModal").on("show.bs.modal", function(t) {
        var e = $(t.relatedTarget).data("whatever");
        $("[class*='subIdaModal']").val(e)
    })
});