<template>

    <header>
        <div class="header-content">
            <div id="logo">
                <h1>Ta<span>me</span></h1>
                <p>Task Management Environment</p>
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
            font-family: 'LT Wave';
            font-style: normal;
            font-weight: 700;
            height: 60px;
            margin-top: 17px;

            h1 {
                color: $white-color;
                font-size: 48px;
                line-height: 55px;
            }

            h1 span {
                color: $green-color;
                font-size: 48px;
                line-height: 55px;
            }

            p {
                margin-top: -5px;
                color: $white-color;
                font-size: 8px;
                line-height: 9px;
            }
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