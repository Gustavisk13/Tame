<template>
    <form @submit.prevent="handleSubmit">
        <label for="name" id="nomep">Nome</label>
        <div id="nomediv">
            <input v-model="name" type="text" name="name" id="name" required>
            <input type="submit" value="Cadastrar categoria"/>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            name: null,
        }
    },
    methods: {
        handleSubmit() {
            alert(this.name);
        },
    },
}
</script>

<style scoped>
    #nomediv{
        margin-top: 8px;

        display: flex;
        gap: 24px;
    }

    #nomep{
        color: #515151;
    }

    #name{
        height: 40px;
        width: 601px;
        border-color: #E0E0E0;
        border-radius: 5px;
        border: 1px solid #E0E0E0;
    }

    input[type="submit"]{
        width: 300px;
        height: 40px;
        background: #00CF80;
        color: rgb(255, 255, 255);
        font-size: 15px;
        font-family:'Montserrat',sans-serif;
        border: 7px solid #00CF80;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
    }
</style>
