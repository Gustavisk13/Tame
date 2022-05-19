<template>
    <section class="pt-12 pb-24 px-24 w-full">
        <div class="flex align-center justify-between">
            <h1 class="font-bold">Seja bem vindo, <span>Fulano</span></h1>

            <h2>Departamento: <span class="font-bold">Financeiro</span></h2>
        </div>

        <ul class="mt-11 mb-6 w-full list-none overflow-x-auto flex gap-5 justify-between">
            <li
                :key="column.title"
                v-for="column in columns"
                class="p-4 rounded-lg overflow-y-auto flex-auto basis-80 shrink-0"
            >
                <p
                    class="mb-10 py-1 px-4 rounded-full text-white text-base font-medium inline-block"
                    :style="{ background: column.color }"
                >
                    {{ column.title }}
                </p>
            </li>
        </ul>

        <p class="text-2xl text-right">
            {{ currentDate }}
        </p>
    </section>
</template>

<script>
export default {
    data() {
        return {
            columns: [
                {
                    title: 'Em espera',
                    color: '#040491',
                },
                {
                    title: 'Em progresso',
                    color: '#f77f00',
                },
                {
                    title: 'Homologação',
                    color: '#ff477e',
                },
                {
                    title: 'Finalizado',
                    color: '#00cf80',
                },
            ],
            currentDate: '',
            timer: null,
        }
    },
    methods: {
        formatDate(rawDate) {
            const fullDate = rawDate.toLocaleDateString('pt-BR', {
                day: '2-digit',
                month: 'long',
                year: 'numeric',
            });
            const fullHours = String(rawDate.getHours()).padStart(2, '0');
            const fullMinutes = String(rawDate.getMinutes()).padStart(2, '0');

            return `${fullDate}, ${fullHours}:${fullMinutes}`;
        },
        getCurrentDate() {
            this.currentDate = this.formatDate(new Date());
        },
    },
    mounted() {
        // Mostra a data atual assim que a tela é carregada
        this.currentDate = this.formatDate(new Date());

        // Inicia um timer para atualizar a data a cada 60 segundos
        this.timer = setInterval(() => {
            this.getCurrentDate();
        }, 60000);
    },
    beforeUnmount() {
        clearInterval(this.timer);
    }
}
</script>

<style lang="scss" scoped>
    @import '../../sass/_variables.scss';

    h1 {
        font-size: 28px;

        span {
            color: $green-color;
        }
    }

    h2 {
        font-size: 24px;

        span {
            color: $green-color;
        }
    }

    li {
        height: 650px;
        background: #f0f2f3;
    }
</style>
