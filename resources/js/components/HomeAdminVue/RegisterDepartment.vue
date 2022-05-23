<template>
    <form @submit.prevent="handleSubmit">
        <div class="row">
            <div class="nomedep">
                <span>Nome</span>
                <input v-model="name" type="text" required>
            </div>
            <div class="nomeger">
                <span>Nome do Gerente</span>
                <input v-model="managerName" type="text" required>
            </div>
        </div>
        <div class="botaocadastrar">
            <button type="submit" class="cadastrar">
                Cadastrar departamento
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                name: null,
                managerName: null,
            }
        },
        methods: {
            handleSubmit() {
                alert(JSON.stringify({ name: this.name, managerName: this.managerName }, null, 2));
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
