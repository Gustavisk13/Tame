<template>
    <form class="formulario" @submit.prevent="handleSubmit">
        <div class="mb-6 grid gap-4 grid-cols-4 grid-rows-2">
            <div class="col-span-2" id="nome">
                <label class="block">Nome completo</label>
                <input id="idName" v-model="name" type="text" name="nome"  />
            </div>
            <div id="telefone">
                <label class="block">Telefone</label>
                <input id="idPhone"  v-model="phone" type="tel" name="telefone"  v-maska="'(##) # ####-####'"/>
            </div>
            <div id="perfil">
                <label class="block">Perfil</label>
                    <div>
                        <select id="depProfile">
                            <option selected disabled>Selecione um perfil</option>
                            <option value="U">Usuário</option>
                            <option value="SS">Administrador</option>
                        </select>
                    </div>
            </div>
            <div id="dep">
                <label class="block">Departamento </label>
                    <div>
                        <select id="depUser">
                            <option selected disabled>Selecione um departamento</option>
                            <option v-for="dept in departments" :value="dept.id">
                                {{ dept.nome }}
                            </option>

                        </select>
                    </div>
            </div>

            <div id="email">
                <label class="block">E-mail</label>
                <input id="idEmail" v-model="email" type="email" name="email"  />
            </div>
            <div id="senha">
                <label class="block">Senha</label>
                <input id="idPassword" v-model="password" type="password" name="senha"  />
            </div>
            <div id="cadastra-container">
                <input id="cadastra" type="submit" value="Cadastrar funcionário" />
            </div>
        </div>


    </form>
    <div class="text-center">
        <h1><b>Lista de Funcionarios</b></h1>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Matricula
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Departamento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telefone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Perfil
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Senha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        E-mail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Criação
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in employeelist" :key="user.nome" class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{user.id}}
                    </th>
                    <td class="px-6 py-4">
                        {{deptParse(user.id_departamento)}}
                    </td>
                    <td class="px-6 py-4">
                        {{user.nome}}
                    </td>
                    <td class="px-6 py-4">
                        {{user.telefone}}
                    </td>
                    <td class="px-6 py-4">
                        {{user.perfil}}
                    </td>
                    <td class="px-6 py-4">
                        {{user.senha}}
                    </td>
                    <td class="px-4 py-4">
                        {{user.email}}
                    </td>
                    <td class="px-5 py-4">
                        {{user.created_at}}
                    </td>
                    <td class="px-1 py-4">
                        <button @click="handleEdit(user)" class = "edit"></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
.formulario {
    width: 100%;
}

h1 {
    font-size: 28px;
    color: rgba(42,42,42,255);
    padding-top: 10px;
    margin-bottom: 5px;
}

label {
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 20px;
    color: #515151;
    margin-bottom: 7px;
}

input {
    width: 100%;
    height: 40px;
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    padding-left: 8px;
}

select{
    width: 100%;
    height: 40px;
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
}

#cadastra {
    width: 100%;
    height: 40px;
    background: #00cf80;
    border-radius: 6px;
    font-family: "Montserrat", sans-serif;
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 20px;
    color: #ffffff;
    margin-top: auto;
    cursor: pointer;
    border: 1px solid #00cf80;
}

#cadastra-container{
    display: flex;
    align-items: flex-end;
}

.edit{
    background-size:  15px 15px;
    width: 15px;
    height: 15px;
    background-image : url('../../../assets/imgs/icon.png');
    color: #fff;
}

</style>

<script>

import axios from 'axios';
import { maska } from 'maska';

export default {
    directives:{
        maska
    },
    data() {
        return {
            name: null,
            phone: null,
            position: null,
            profile: null,
            department: null,
            email: null,
            password: null,
            departments:[],
            employeelist:[],
            currentEdit:null,
        };
    },
    mounted() {
        this.currentEdit = 0;

        axios.get('/api/departamentos')
             .then(data =>{
                this.departments = data.data;
             }),
        axios.get('/api/usuarios')
             .then(data=>{
                if (data.status == 200) {
                    for (let i = 0; i < data.data.length; i++) {
                        data.data[i].created_at = data.data[i].created_at.substr(0,10);
                        this.employeelist.push(data.data[i]);
                    }
                }else{
                    console.log("Erro ao tentar buscar funcionarios");
                }
             })
             .catch(error => {
                 console.log(error);
             });

    },
    methods: {
        handleSubmit() {
            if (this.currendEdit != null){

                    var nomeEdit;
                    var emailEdit;
                    var telefoneEdit;
                    var senhaEdit;

                    var holders = document.getElementById("idName").placeholder;
                    var valor = document.getElementById("idName").value;

                    if(valor == ""){
                        nomeEdit = holders;
                    }else{
                        nomeEdit = valor;
                    }


                    var holders = document.getElementById("idPhone").placeholder;
                    var valor = document.getElementById("idPhone").value;

                    if(valor == ""){
                        telefoneEdit = holders;
                    }else{
                        telefoneEdit = valor;
                    }


                    var holders = document.getElementById("idEmail").placeholder;
                    var valor = document.getElementById("idEmail").value;

                    if(valor == ""){
                        emailEdit = holders;
                    }else{
                        emailEdit = valor;
                    }


                    var holders = document.getElementById("idPassword").placeholder;
                    var valor = document.getElementById("idPassword").value;

                    if(valor == ""){
                        senhaEdit = holders;
                    }else{
                        senhaEdit = valor;
                    }

                    axios.put("/api/usuarios/"+this.currendEdit, {
                        name: nomeEdit,
                        phone: telefoneEdit,
                        profile: document.getElementById("depProfile").value,
                        department: document.getElementById("depUser").value,
                        email: emailEdit,
                        password: senhaEdit
                    }).then(data => {
                        if(data.status ==200){
                            window.location.reload();
                        }
                        console.log(data);
                    }).catch(error => {
                        console.log(error);
                    });
                    this.currendEdit = 0;
            }else{
                axios.post('/api/usuarios', {
                    name: this.name,
                    phone: this.phone,
                    position: this.position,
                    profile: document.getElementById("depProfile").value,
                    department: document.getElementById("depUser").value,
                    email: this.email,
                    password: this.password
                }).then(data=>{
                    if(data.status ==201){
                        window.location.reload();
                     }
                })


            }
            this.currendEdit = 0;

        },
        deptParse(idDept){
            for (let index = 0; index < this.departments.length; index++) {
                if (this.departments[index].id == idDept) {
                    return this.departments[index].nome;
                }

            }
        },
        handleEdit(value){

                document.getElementById("idName").placeholder = value.nome;
                document.getElementById("idPhone").placeholder = value.telefone;
                document.getElementById("idEmail").placeholder = value.email;
                document.getElementById("idPassword").placeholder = value.senha;

                document.getElementById("idName").value = value.nome;
                document.getElementById("idPhone").value = value.telefone;
                document.getElementById("idEmail").value = value.email;
                document.getElementById("idPassword").value = value.senha;

                document.getElementById("depProfile").value = value.perfil;
                document.getElementById("depUser").value = value.id_departamento;

                document.getElementById("cadastra").value = "Editar";



                this.currendEdit = value.id;

            }
    },
};
</script>
