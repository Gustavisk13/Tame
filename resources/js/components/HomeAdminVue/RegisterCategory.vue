<template>
    <form @submit.prevent="handleSubmit">
        <label for="name" id="nomep">Categoria</label>
        <div id="nomediv">
            <input v-model="categoria" type="text" name="name1" id="name" required>
        </div>
        <label for="name" id="nomep">Categoria Pai</label>
        <div id="nomediv">
            <input v-model="pai" type="text" name="name2" id="name">
            <input type="submit" value="Cadastrar categoria" />
        </div>
    </form>
    <span>Lista de Categorias</span>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Categorias
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID Pai
                    </th>
                     <th scope="col" class="px-6 py-3">
                        ID Categoria
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="categ in categList" :key="categ.nome"
                    class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ categ.nome }}
                    </th>
                    <td class="px-6 py-4">
                        {{ categ.id_categoria_pai }}
                    </td>
                    <td class="px-6 py-4">
                        {{ categ.id }}
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
            categoria: null,
            pai: null,
            categList: []
        }
    },
    mounted() {
        axios.get("/api/categorias", {
        }).then(data => {
            if (data.status == 200) {
                console.log(data.data.length);
                for (let i = 0; i < data.data.length; i++) {
                    this.categList.push(data.data[i]);
                }
                console.log(this.categList);
            } else {
                console.log("erro ao tentar recuper lista de categorias");
            }

        }).catch(error => {
            console.log(error);
        });
    },
    methods: {
        handleSubmit() {
            axios.post("/api/categorias", {
                nome: this.categoria,
                id_categoria_pai: this.pai
            }).then(data => {
                console.log(data);
                window.location.reload();
            }).catch(error => {
                console.log(error);
            });
        },
    }
}
</script>

<style scoped>
#nomediv {
    margin-top: 8px;

    display: flex;
    gap: 24px;
}

#nomep {
    color: #515151;
}

#name {
    height: 40px;
    width: 601px;
    border-color: #E0E0E0;
    border-radius: 5px;
    border: 1px solid #E0E0E0;
}

input[type="submit"] {
    width: 300px;
    height: 40px;
    background: #00CF80;
    color: rgb(255, 255, 255);
    font-size: 15px;
    font-family: 'Montserrat', sans-serif;
    border: 7px solid #00CF80;
    border-radius: 8px;
    font-weight: 700;
    cursor: pointer;
}
</style>
