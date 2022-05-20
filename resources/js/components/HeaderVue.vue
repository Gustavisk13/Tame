<template>

    <header>
        <div class="header-content">
            <div id="logo">
                <img src="\images\Logo.png" alt="">
            </div>
            <div id="call-button">
                <button @click="showModal = true">Abrir chamado</button>
            </div>
            <div id="exit-button">
                <button src="">Sair</button>
            </div>
        </div>
    </header>

    <!-- Modal start -->
    <div>
        <vue-final-modal v-model="showModal" classes="modal-container" content-class="modal-content">
            <div class="modal__title">
                <span>NOVO CHAMADO</span>
            </div>
            
            <div class="modal__content">
                <p>Vue Final Modal is a renderless, stackable, detachable and lightweight modal component.</p>
            </div>
        </vue-final-modal>
    </div>

</template>

<!-- Modal JS start -->
<script>
import { VueFinalModal } from "vue-final-modal";
export default {
    components: {
        VueFinalModal
    },
    data: () => ({
        showModal: false
    })
}
</script>

<!-- Modal style -->

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

::v-deep .modal-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

::v-deep .modal-content {
    display: flex;
    flex-direction: column;
    margin: 0 1rem;
    padding: 1rem;
    border: 2px solid $blue-color;
    border-radius: 15px;
    background: #fff;
}

.modal__title {
    text-align: center;
    margin-top: 25px;
    margin-bottom: 35px;
    
}

.modal__title span{
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    font-size: 30px;
    line-height: 37px;
    color: $blue-color;
    border: 2px solid $blue-color;
    background: rgba(4, 4, 145, 0.1);
    padding: 11.5px 18px 11.5px 18px;
    border-radius: 8px;
    
}
</style>

<style scoped>
.dark-mode div::v-deep .modal-content {
    border-color: #2d3748;
    background-color: #1a202c;
}
</style>
<!-- Header style -->
<style lang="scss" scoped>
@import '../../sass/_variables.scss';

header {
    width: 100%;
    background-color: $blue-color;
    height: 103px;

    .header-content {
        display: flex;
        justify-content: space-around;


        #logo {
            height: 60px;
            margin-top: 17px;

        }

        #call-button {

            button {
                color: $white-color;
                background-color: transparent;
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 700;
                font-size: 18px;
                line-height: 22px;
                width: 240px;
                height: 48px;
                border: 1px solid $white-color;
                border-radius: 8px;
                text-align: center;
                margin-top: 28px;

                // button img{
                //     margin: 0;
                //     text-align: center;
                // }
            }

            button:hover {
                background-color: #050d9d;
            }
        }

        #exit-button {
            button {
                width: 182px;
                height: 48px;
                margin-top: 28px;
                color: $white-color;
                background-color: $green-color;
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 700;
                font-size: 18px;
                line-height: 22px;
                border-radius: 8px;
                text-align: center;
            }

            button:hover {
                background-color: #1fdb90;
            }
        }
    }
}
</style>