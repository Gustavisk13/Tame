<template>
    <form @submit.prevent="handleSubmit">
        <div class="row">
            <div class="nomedep">
                <span>Nome</span>
                <input id="idNome" v-model="name" type="text" required>
            </div>
            <div class="nomeger">
                <span>ID do Gerente</span>
                <input id="idGerente" v-model="managerName" type="text">
            </div>
        </div>
        <div class="botaocadastrar">
            <button id="idBotao" type="submit" class="cadastrar">
                Cadastrar departamento
            </button>
        </div>
    </form>
    <div class="text-center">
        <h1><b>Lista de Departamentos</b></h1>
    </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">

            <tr>
             <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Departamentos
                </th>
                <th scope="col" class="px-6 py-3">
                    ID Gerente
                </th>
                <th scope="col" class="px-6 py-3">

                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="depto in departList" :key="depto.nome" class="bg-white border-b">
                <th scope="row" class="px-6 py-4">
                    {{depto.id}}
                </th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{depto.nome}}
                </td>
                <td class="px-6 py-4">
                    {{depto.id_gerente}}
                </td>

                <td class="px-1 py-4">
                    <button @click="handleEdit(depto)" class = "edit"></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
    import axios from "axios";
    export default {
        data() {
            return {
                name: null,
                managerName: null,
                departList:[],
                currendEdit: null,
            }
        },
        mounted(){
                this.currendEdit = 0;
                axios.get("/api/departamentos", {
                }).then(data => {
                     if(data.status == 200){
                        console.log(data.data.length);
                        for (let i = 0; i < data.data.length; i++) {
                            this.departList.push(data.data[i]);
                        }
                        console.log(this.departList);
                     }else{
                         console.log("erro ao tentar recuper lista de departamentos");
                     }

                }).catch(error => {
                    console.log(error);
                });

        },
        methods: {
            handleSubmit() {
                if (this.currendEdit != null){

                    var nomeEdit;
                    var gerenteEdit;
                    var holders = document.getElementById("idNome").placeholder;
                    var valor = document.getElementById("idNome").value;

                    if(valor == ""){
                        nomeEdit = holders;
                    }else{
                        nomeEdit = valor;
                    }

                    var holders = document.getElementById("idGerente").placeholder;
                    var valor = document.getElementById("idGerente").value;

                    if(valor == ""){
                        gerenteEdit = holders;
                    }else{
                        gerenteEdit = valor;
                    }

                    axios.put("/api/departamentos/"+this.currendEdit, {
                        nome: nomeEdit,
                        id_gerente: gerenteEdit
                    }).then(data => {
                        if(data.status ==200){
                            window.location.reload();
                        }
                        console.log(data);
                    }).catch(error => {
                        console.log(error);
                    });
                }else{
                    axios.post("/api/departamentos", {
                        nome: this.name,
                        id_gerente: this.managerName
                    }).then(data => {
                        if(data.status ==201){
                            window.location.reload();
                        }

                        console.log(data);
                    }).catch(error => {
                        console.log(error);
                    });
                    this.currendEdit = 0;
                    document.getElementById("idBotao").innerHTML = "Cadastrar departamento";

                }
                //alert(JSON.stringify({ name: this.name, managerName: this.managerName }, null, 2));
            },
            handleEdit(value){

                document.getElementById("idNome").placeholder = value.nome;
                document.getElementById("idGerente").placeholder = value.id_gerente;

                document.getElementById("idNome").value = value.nome;
                document.getElementById("idGerente").value = value.id_gerente;
                document.getElementById("idBotao").innerHTML = "Editar";


                this.currendEdit = value.id;

            }
        },
    }
</script>

<style scoped>
.nomedep {
    display: flex;
    flex-direction: column;
    width: 624px;
}

.nomeger {
    display: flex;
    flex-direction: column;
    width: 624px;
    margin-left: 24px;
}

.row {
    flex-direction: row;
    display: flex;
    padding: 0 95px 0 147px;
    font-family: 'montserrat';
    font-weight: 400;
    font-size: 16px;
}

h1 {
    font-size: 28px;
    color: rgba(42,42,42,255);
    padding-top: 10px;
    margin-bottom: 5px;
}

input {
    margin-top: 7px;
    max-width: 624px;
    width: 100%;
    height: 40px;
    background-color: #fff;
    border-radius: 5px;
    border: 1px solid #E0E0E0;
}

.cadastrar {
    background-color: #00CF80;
    color: #fff;
    border: none;
    padding: 10px 46px 10px 46px;
    margin-top: 24px;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 700;
}

.botaocadastrar {
    align-items: center;
    text-align: center;
}

.edit{
    background-size:  15px 15px;
    width: 15px;
    height: 15px;
    background-image : url('../../../assets/imgs/icon.png');
    color: #fff;
}
</style>
