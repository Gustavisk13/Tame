<template>

    <header>
        <div class="header-content">
            <div id="logo">
                <img src="\images\Logo.png" alt="">
            </div>
            <div id="call-button">
                <button>Abrir chamado</button>
            </div>
            <div id="exit-button">
                <button src="">Sair</button>
            </div>
        </div>
    </header>

</template>

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