document.addEventListener("DOMContentLoaded", function () {
    var toggles = document.getElementsByClassName('modal-btn');

    function switchModal(elementName) {
        var switchElm = document.querySelector('.modal[data-modal='+ elementName +']');
        if ( switchElm.dataset.toggle == "true" ) {
            switchElm.dataset.toggle = "false";
        } else {
            switchElm.dataset.toggle = "true";
        }
    }

    for (let i = 0; i < toggles.length; i++) {
        let elmName = toggles[i].dataset.modal;
        toggles[i].addEventListener('click', function(){switchModal(elmName)});
    }
  });