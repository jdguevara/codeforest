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
        $("#program-toolbar").hide();
        $("#program").hide();
    });

    $("#shared-projects").click(function () {
        $("#projects").show();
        $("#all-projects-table").hide();
        $("#project-table").hide();
        $("#my-projects-table").hide();
        $("#shared-projects-table").show();
        $("#program").hide();
        $("#program-toolbar").hide();
    });

    $("#new-project").click(function () {
        $("#projects").hide();
        $("#program").show();
        $("#program-toolbar").show();
    });

    $(".project-link").click(function () {
        $("#projects").hide();
        $("#program").show();
        $("#program-toolbar").show();
    });

    const $code_textarea = document.querySelector('#code_textarea');
    const $code = document.querySelector('code');
    const $code_language = document.querySelector('#code-language-menu');
    const $toolbar_language = document.querySelector('.toolbar-item span');

    const typeHandler = function(e) {
        $code.innerHTML = e.target.value.replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
        Prism.highlightAll($code);
    };

    const languageHandler = function(e) {
      $code.className = 'language-' + e.target.value;
      $toolbar_language.innerHTML = e.target.innerHTML;
      Prism.highlightAll($code);
    };

    $code_textarea.addEventListener('input', typeHandler); // register for oninput
    $code_textarea.addEventListener('propertychange', typeHandler); // for IE8
    $code_textarea.addEventListener('onchange', typeHandler); // for pasting
    $code_language.addEventListener('click', languageHandler);
});

