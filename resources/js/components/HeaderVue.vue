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
                <button type="button" @click="handleLogout">Sair</button>
            </div>
        </div>
    </header>

    <!-- Modal start -->
    <div>
        <vue-final-modal v-model="showModal" classes="modal-container" content-class="modal-content">
            <div class="modal__title">
                <span>NOVO CHAMADO</span>
            </div>

            <div class="modal__category-department">
                <button class="category-button"> <img src="images\icon_category.png" alt=""> Categoria <img
                        class="icon-arrow-down" src="\images\icons_arrow-down.png" alt=""> </button>
                <button class="department-button"> <img src="images\icon_departament.png" alt=""> Departamento <img
                        class="icon-arrow-down" src="\images\icons_arrow-down.png" alt=""></button>
            </div>

            <div class="modal__input">
                <input class="title-input" type="text" placeholder="Título">
                <input class="description-input" type="text " placeholder="Descrição">
            </div>

            <div class="modal__add-cancel">
                <button class="add-button"> <img src="images\add-button.png" alt="">Adicionar</button>
                <button class="cancel-button"> <img src="images\cancel-button.png" alt="">Cancelar</button>
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
    }),
    methods: {
        handleLogout() {
            window.location.href = '/login';
        }
    }
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
    width: 820px;
}

.modal__title {
    text-align: center;
    margin-top: 25px;
    margin-bottom: 35px;

}

.modal__title span {
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

.modal__category-department {
    display: flex;
    text-align: left;
    margin-left: 50px;
}

.modal__category-department .category-button {
    width: 140px;
    height: 40px;
    display: flex;
    background: $green-color;
    border-radius: 8px;
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    font-size: 15px;
    line-height: 18px;
    color: #FFFFFF;
    padding-top: 12px;

}

.modal__category-department .department-button {
    width: 168px;
    height: 40px;
    display: flex;
    background: $green-color;
    border-radius: 8px;
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    font-size: 15px;
    line-height: 18px;
    color: #FFFFFF;
    padding-top: 12px;
    margin-left: 19px;
}

.modal__category-department img {
    margin: 0 auto;
}

.modal__category-department .icon-arrow-down {
    padding-top: 2px;
}

.modal__input {
    display: flex;
    flex-direction: column;
    width: 692px;
    margin-left: 50px;

}

.modal__input .title-input {
    height: 40px;
    margin-top: 52px;
    margin-bottom: 40px;
    border: 2px solid $green-color;
    border-radius: 8px;
    background-color: rgba(0, 207, 128, 0.13);
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    backdrop-filter: blur(4px);
    padding-left: 5px;
}

.modal__input .description-input {
    height: 235px;
    margin-bottom: 37px;
    border: 2px solid $green-color;
    border-radius: 8px;
    background-color: rgba(0, 207, 128, 0.13);
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    backdrop-filter: blur(4px);
    padding-left: 5px;

}

.modal__add-cancel {
    display: flex;
    // text-align: left;
    margin-left: 50px;
}

.modal__add-cancel .add-button {
    width: 119px;
    height: 35px;
    display: flex;
    background: $green-color;
    border-radius: 8px;
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    font-size: 15px;
    line-height: 18px;
    color: #FFFFFF;
    padding-top: 9px;
    margin-right: 433px;
}

.modal__add-cancel .cancel-button {
    width: 119px;
    height: 35px;
    display: flex;
    background: $white-color;
    border: 1px solid #00CF80;
    border-radius: 8px;
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    font-size: 15px;
    line-height: 18px;
    color: $green-color;
    padding-top: 12px;
    margin-left: 19px;
}

.modal__add-cancel img {
    margin: 0 auto;
    margin-right: 8px;
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
                width: 300px;
                height: 55px;
                border: 4px solid $white-color;
                border-radius: 8px;
                text-align: center;
                margin-top: 23px;

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
                position:absolute;
                width: 182px;
                height: 48px;
                margin-top: 26px;
                right:10px;
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
