<template>
    <form class="formulario" @submit.prevent="handleSubmit">
        <div class="mb-6 grid gap-4 grid-cols-4 grid-rows-2">
            <div class="col-span-2" id="nome">
                <label class="block">Nome completo</label>
                <input v-model="name" type="text" name="nome" required />
            </div>
            <div id="telefone">
                <label class="block">Telefone</label>
                <input v-model="phone" type="tel" name="telefone" required />
            </div>
            <div id="cargo">
                <label class="block">Cargo</label>
                <input v-model="position" type="text" name="cargo" required />
            </div>
            <!-- <div id="perfil">
                <label class="block">Perfil</label>
                <input v-model="profile" type="text" name="perfil" required />
            </div> -->
            
            <div id="perfil">
                <label class="block">Perfil</label>
                    <div class="mb-3 xl:w-86">
                        <select class ="form-select appearance-none 
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                            <option selected>Selecione um perfil</option>
                            <option id="op1">Usuário</option>
                            <option id="op2">Administrador</option>
                        </select>
                    </div>
            </div>
            <div id="dep">
                <label class="block">Departamento </label>
                    <div class="mb-3 xl:w-86">
                        <select v-model="department" class="form-select appearance-none
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" >
                            <option value="" disabled selected>Selecione um departamento</option>
                            <option v-for="dept in departments" :value="dept.id">
                                {{ dept.nome }}
                            </option>

                        </select>
                    </div>
            </div>

            <div id="email">
                <label class="block">E-mail</label>
                <input v-model="email" type="email" name="email" required />
            </div>
            <div id="senha">
                <label class="block">Senha</label>
                <input v-model="password" type="password" name="senha" required />
            </div>
        </div>

        <div class="text-center">
            <input id="cadastra" type="submit" value="Cadastrar funcionário" />
        </div>
    </form>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: null,
            phone: null,
            position: null,
            profile: null,
            department: null,
            email: null,
            password: null,
            departments:[]
        };
    },
    mounted() {
        axios.get('/api/departamentos')
             .then(data =>{

                this.departments = data.data;
             });

    },
    methods: {
        handleSubmit() {
            console.log(this.department);
            axios.post('/api/usuarios', {
                    name: this.name,
                    phone: this.phone,
                    position: this.position,
                    profile: this.profile,
                    department: this.department,
                    email: this.email,
                    password: this.password
            })/* ,
            alert(
                JSON.stringify(
                    {
                        name: this.name,
                        phone: this.phone,
                        position: this.position,
                        profile: this.profile,
                        department: this.department,
                        email: this.email,
                        password: this.password,
                    },
                    null,
                    2
                )
            ); */
        },
    },
};
</script>


<style scoped>
.formulario {
    width: 100%;
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
}

#cadastra {
    width: 300px;
    height: 40px;
    background: #00cf80;
    border-radius: 6px;
    font-family: "Montserrat", sans-serif;
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 20px;
    color: #ffffff;
    cursor: pointer;
}
</style>
