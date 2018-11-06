$(function() {
    $("#all-projects").click(function () {
        $("#projects").show();
        $("#all-projects-table").show();
        $("#project-table").hide();
        $("#my-projects-table").hide();
        $("#shared-projects-table").hide();
        $("#program-toolbar").hide();
        $("#program").hide();
    });

    $("#my-projects").click(function () {
        $("#projects").show();
        $("#all-projects-table").hide();
        $("#project-table").hide();
        $("#my-projects-table").show();
        $("#shared-projects-table").hide();
        $("#program").hide();
    });

    $("#shared-projects").click(function () {
        $("#projects").show();
        $("#all-projects-table").hide();
        $("#project-table").hide();
        $("#my-projects-table").hide();
        $("#shared-projects-table").show();
        $("#program-toolbar").hide();
        $("#program").hide();
    });

    $("#new-project").click(function () {
        $("#projects").hide();
        $("#program").show();
        $("#program-toolbar").show();
    });

});
