<template>
    <form @submit.prevent="handleSubmit">
        <div class="row">
            <div class="nomedep">
                <span>Nome</span>
                <input v-model="name" type="text" required>
            </div>
            <div class="nomeger">
                <span>Nome do Gerente</span>
                <input v-model="managerName" type="text">
            </div>
        </div>
        <div class="botaocadastrar">
            <button type="submit" class="cadastrar">
                Cadastrar departamento
            </button>
        </div>
    </form>

    <span>Lista de Departamentos</span>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Departamentos
                </th>
                <th scope="col" class="px-6 py-3">
                    ID Gerente
                </th>
                <th scope="col" class="px-6 py-3">
                    ID Departamento
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="depto in departList" :key="depto.nome" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{depto.nome}}
                </th>
                <td class="px-6 py-4">
                    {{depto.id_gerente}}
                </td>
                <td class="px-6 py-4">
                    {{depto.id}}
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
            }
        },
        mounted(){

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




                //alert(JSON.stringify({ name: this.name, managerName: this.managerName }, null, 2));
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
</style>
