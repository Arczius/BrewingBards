document.addEventListener("DOMContentLoaded", function () {
    var toggles = document.getElementsByClassName('switch-btn');

    function switchToggle(elementName) {
        var switchElm = document.querySelector('[data-name='+ elementName +']');
        if ( switchElm.dataset.toggle == "true" ) {
            switchElm.dataset.toggle = "false";
        } else {
            switchElm.dataset.toggle = "true";
        }
    }

    for (let i = 0; i < toggles.length; i++) {
        let elmName = toggles[i].dataset.name;
        toggles[i].addEventListener('click', function(){switchToggle(elmName)});
    }
  });