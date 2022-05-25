<template>
 <div class="container-content">
    <div class="img-logo">
        <img src="../../assets/imgs/logo.png" alt="">
    </div>
    <div class="login">
        <div class="text-conta">
            <span>Entre em sua conta</span>
        </div>
        <div class="item-login">
            <label class="text-login">Login</label><br>
            <input v-model="user" type="text" class="input-login" id="user">
        </div>
        <div>
            <label class="text-login">Senha</label><br>
            <input v-model="pass" type="password" class="input-login" id="pass">
        </div>
        <div class="checkbox">
            <input type="checkbox" class="check">
            <label class="text-lembre">Lembre-se de mim</label>
        </div>
        <div class="button">
            <button @click="login()" class="btn-entrar">
                Entrar
            </button>
        </div>
    </div>
</div>
</template>

<style scoped>
body {
    background-color: #040491;
}

        .login {
            width: 344px;
            background-color: #E0E0E0;
            border-radius: 20px;
            margin-top: 20px;
            padding: 32px;

        }

        .container-content {
            width: 100%;
            height: 100vh;
            background: #040491;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .input-login {
            margin-top: 7px;
            width: 100%;
            height: 40px;
            border-radius: 4px;
            border: 1px solid #E0E0E0;
        }

        .text-login {
            font-size: 16px;
            font-family: 'montserrat';
            font-weight: 400;
        }

        .text-conta {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 32px;
            font-size: 20px;
            font-family: 'Montserrat';
            font-weight: 700;
        }
        .item-login{
            margin-bottom: 16px;
        }
        .text-lembre{
            font-family: 'Montserrat';
            font-weight: 400;
            align-content: center;
        }
        .check{
            width: 20px;
            height: 20px;
            border:none;

        }
        .checkbox{
            margin-top: 16px;
            display: flex;
            align-items: center;
        }
        .btn-entrar{
            width: 100%;
            height: 40px;
            background-color: #00CF80;
            color: #ffffff;
            border: none;
            border-radius: 4px;
        }
        .button{
            margin-top: 40px;
        }
        .img-logo{

        }

</style>
<script>
    import axios from "axios";
    export default {
        data(){
            return {
                user:null,
                pass:null
            }
        },
        methods:{
            login(){
                axios.post("/api/auth", {
                     email: this.user,
                     senha: this.pass
                 }).then(data => {
                            console.log(data.data);
                        if(data.data === false ){
                            alert("Usuário ou senha incorretos");
                        }else{
                        window.location.href = "/home";
                        }
                 }).catch(error => {
                     console.log(error);
                 });
            }
        }
    }
</script>
