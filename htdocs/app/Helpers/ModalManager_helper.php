<?php

class ModalManager
{
    private $ModalAmount;

    public function __construct()
    {
        $this->ModalAmount = 0;
        $this->InjectScript();
    }


    public function MakeModalButton(){
        ?>
            onclick="ViewModal(<?php echo $this->ModalAmount ?>)"
        <?php
    }

    public function CreateNormalModal(
        $Title = null,
        $Content = null,
        $Footer = null,
    ){
        ?>
        <div class="modal b fixed top-0 left-0 h-screen w-screen flex justify-center items-center z-10" data-modal-id="<?php echo $this->ModalAmount ?>" data-modal-type="normal">
            <div class="modal_inner w-full max-w-lg h-full max-h-80 bg-white">
                <header class="bg-cyan-400 w-full max-h-fit p-4 flex flex-wrap">
                    <div class="w-11/12">
                        <?php
                            if(isset($Title)){
                                ?>

                                <h3 class="text-2xl">
                                <?php
                                echo $Title;
                                ?>
                                </h3>

                                <?php
                            }
                        ?>
                    </div>
                    <div class="grow">
                        <button
                            onclick="CloseModal(<?php echo $this->ModalAmount;?>)"
                        >
                            <i class="fa-solid fa-cross text-xl"></i>
                        </button>
                    </div>
                </header>

                <main class="w-full p-4">
                    <?php
                        if(isset($Content)){
                            echo $Content;
                        }
                    ?>

                </main>

                <?php if(isset($Footer)) {?>
                <footer class="text-xl w-full p-4">
                    <?php echo $Footer ?>
                </footer>
                <?php
                }

                ?>
            </div>
        </div>
        <?php

        $this->ModalAmount++;
    }

    public function CreateQuestionModal(
        $Question = null,
        $LinkPage = null,
    ){

    }

    public function InjectScript(){
        echo "<script src='" . base_url() . "/script/modal.js'></script>";
    }
}
