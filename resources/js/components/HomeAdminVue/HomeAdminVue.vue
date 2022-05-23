<template>
    <section class="pt-12 pb-24 px-24 w-full">
        <div class="flex align-center justify-between">
            <h1 class="font-bold">Seja bem vindo, <span>Ciclano</span></h1>

            <h2 class="font-bold">Administrador</h2>
        </div>

        <tabs>
            <tab id="cadastrar-funcionario" name="Cadastrar funcionário">
                <register-employee></register-employee>
            </tab>
            <tab id="cadastrar-departamento" name="Cadastrar departamento">
                <register-department></register-department>
            </tab>
            <tab id="cadastrar-categoria" name="Cadastrar categoria">
                <register-category></register-category>
            </tab>
        </tabs>

        <p class="mt-12 text-2xl text-right">
            {{ currentDate }}
        </p>
    </section>
</template>

<script>
import { Tabs, Tab } from 'vue3-tabs-component';

import RegisterCategory from './RegisterCategory.vue';
import RegisterDepartment from './RegisterDepartment.vue';
import RegisterEmployee from './RegisterEmployee.vue';

export default {
    components: {
        RegisterCategory,
        RegisterDepartment,
        RegisterEmployee,
        Tab,
        Tabs,
    },
    data() {
        return {
            currentDate: new Date().toLocaleDateString('pt-BR', {
                day: '2-digit',
                month: 'long',
                year: 'numeric',
            }),
        }
    },
}
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables.scss';

    h1 {
        font-size: 28px;

        span {
            color: $green-color;
        }
    }

    h2 {
        font-size: 24px;
        color: $green-color;
    }
</style>
