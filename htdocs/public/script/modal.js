"use strict";


const ViewModal = (ModalID) => {
    const Modal = document.querySelector(`div.modal[data-modal-id='${ModalID}']`);
    const ModalInner = document.querySelector(`div.modal[data-modal-id='${ModalID}'] .modal_inner`);

    const ModalType = Modal.dataset.modalType;
    console.log(ModalInner);

    switch(ModalType){
        case "normal":
                console.log("normal modal");
            break;

        case "mini":
            console.log("Mini");
            break;
    }
}

const CloseModal = (ModalID) => {

}
