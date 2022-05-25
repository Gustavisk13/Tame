<template>
    <section class="pt-12 pb-24 px-24 w-full">
        <div class="flex align-center justify-between">
            <h1 class="font-bold">Seja bem vindo, <span>{{usuario}}</span></h1>

            <h2>Departamento: <span class="font-bold">{{depto}}</span></h2>
        </div>

        <ul class="columns-list mt-11 mb-6 w-full list-none overflow-x-auto flex gap-5 justify-between">
            <li
                :key="column.title"
                v-for="column in columns"
                class="tasks-column p-4 rounded-lg overflow-y-auto flex-auto basis-80 shrink-0"
            >
                <p
                    class="mb-10 py-1 px-4 rounded-full text-white text-base font-medium inline-block"
                    :style="{ background: column.color }"
                >
                    {{ column.title }}
                </p>

                <draggable
                    item-key="id"
                    tag="transition-group"
                    :component-data="{
                        tag: 'ul',
                        name: 'flip-list',
                        type: 'transition-group',
                        id: column.id,
                        name: !drag ? 'flip-list' : null,
                    }"
                    v-model="column.tasks"
                    v-bind="dragOptions"
                    @start="drag = true"
                    @end="drag = false"
                    @add="handleChangeTaskColumn"
                >
                    <template #item="{ element }">
                        <li
                            :id="element.id"
                            class="mt-3 relative bg-white shadow rounded pl-5 py-3 pr-3 border border-white cursor-move"
                        >
                            <div
                                class="w-2 rounded-tl rounded-bl absolute top-0 bottom-0 left-0"
                                :style="{ background: column.color }"
                            ></div>

                            <div class="flex justify-between">
                                <p
                                    class="text-gray-800 font-semibold tracking-wide text-sm"
                                >
                                    {{ element.title }}
                                </p>
                                <img
                                    class="w-6 h-6 rounded-full ml-3"
                                    :src="element.userAvatar"
                                    alt="Avatar"
                                >
                            </div>

                            <div class="my-4 flex items-center">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.96954 4.50008C2.87801 5.71917 2.26689 7.29351 2.25005 8.92977C2.20857 12.6686 5.26118 15.743 9.00005 15.7501C12.7336 15.7571 15.7501 12.7326 15.7501 9.00008C15.7501 5.32484 12.8127 2.3341 9.15825 2.25008C9.13769 2.24942 9.11719 2.25291 9.098 2.26033C9.07881 2.26776 9.06131 2.27898 9.04655 2.29332C9.03178 2.30766 9.02006 2.32482 9.01207 2.34379C9.00408 2.36275 8.99999 2.38313 9.00005 2.40371V5.34383" :stroke="column.color" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.20478 9.79562L5.42743 5.82296C5.38901 5.76792 5.37118 5.70111 5.37708 5.63424C5.38298 5.56737 5.41223 5.50472 5.45969 5.45725C5.50716 5.40978 5.56981 5.38054 5.63668 5.37464C5.70355 5.36874 5.77036 5.38657 5.8254 5.42499L9.79806 8.20233C10.0417 8.37783 10.2065 8.6422 10.2568 8.93826C10.307 9.23431 10.2387 9.53825 10.0666 9.78433C9.8945 10.0304 9.63244 10.1988 9.33711 10.2532C9.04178 10.3075 8.73692 10.2434 8.48849 10.0748C8.37864 9.99863 8.28267 9.90421 8.20478 9.79562Z" :fill="column.color"/>
                                </svg>

                                <div
                                    class="ml-2 py-1 px-2 border rounded-full text-xs"
                                    :style="{ borderColor: column.color }"
                                >
                                    {{ formatStopwatch(element) }}
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-400 text-sm font-medium">
                                    {{element.created_at.toLocaleDateString('pt-BR', {
                                        day: '2-digit',
                                        month: 'long',
                                    })}}
                                </span>

                                <div
                                    class="py-1 px-2 rounded-full flex items-center justify-center"
                                    :style="{ background: lightenBgColors[column.color] }"
                                >
                                    <div
                                        class="mr-2 w-1.5 h-1.5 rounded-full"
                                        :style="{ background: column.color }"
                                    ></div>
                                    <span
                                        class="text-xs font-medium"
                                        :style="{ color: column.color }"
                                    >
                                        {{ element.id }}
                                    </span>
                                </div>
                            </div>
                        </li>
                    </template>
                </draggable>
            </li>
        </ul>

        <p class="text-2xl text-right">
            {{ currentDate }}
        </p>
    </section>
</template>

<script>
import axios from 'axios';
import draggable from 'vuedraggable';

export default {
    components: {
        draggable,
    },
    computed: {
        dragOptions() {
            return {
                animation: 200,
                group: "description",
                disabled: false,
                ghostClass: "ghost"
            };
        }
    },
    data() {
        return {
            drag: false,
            chamados: null,
            usuario: null,
            depto: null,
            columns: [
                {
                    id: 'waiting',
                    title: 'Em espera',
                    color: '#040491',
                    tasks: [],
                },
                {
                    id: 'progress',
                    title: 'Em progresso',
                    color: '#f77f00',
                    tasks: [],
                },
                {
                    id: 'review',
                    title: 'Homologação',
                    color: '#ff477e',
                    tasks: [],
                },
                {
                    id: 'done',
                    title: 'Finalizado',
                    color: '#00cf80',
                    tasks: [],
                },
            ],
            currentDate: new Date().toLocaleDateString('pt-BR', {
                day: '2-digit',
                month: 'long',
                year: 'numeric',
            }),
            lightenBgColors: {
                '#040491': '#d4d9f4',
                '#f77f00': '#fde5cc',
                '#ff477e': '#ffdae5',
                '#00cf80': '#ccf5e6',
            },
        }
    },
    methods: {
        formatStopwatch(task) {
            const hours = String(Math.floor(task.stopwatch / 3600)).padStart(2, '0');
            const minutes = String(Math.floor((task.stopwatch - (hours * 3600)) / 60)).padStart(2, '0');
            const seconds = String(task.stopwatch - (hours * 3600) - (minutes * 60)).padStart(2, '0');

            return `${hours}:${minutes}:${seconds}`;
        },
        handleChangeTaskColumn(event) {
            const columnId = event.to.id;
            const task = event.item._underlying_vm_;
            var stat;

            if (columnId === 'progress') {
                this.startTimer(task);
            } else {
                this.stopTimer(task);
            }


            if (columnId === 'waiting') {
                stat = 'OP';
            }
            else if(columnId === 'progress') {
                stat = 'PR';
            }
            else if(columnId === 'review') {
                stat = 'HM';
            }else{
                stat = 'OK';
            }

            axios.get('/api/chamados/'+task.id)
                 .then(data=>{
                    data.data.status = stat;
                    axios.put('/api/chamados/'+task.id, data.data)
                         .then(data=>{
                             console.log(data.data);
                         });
                 });
        },
        startTimer(task) {
            task.timer = setInterval(() => {
                task.stopwatch++;
            }, 1000);
        },
        stopTimer(task) {
            clearInterval(task.timer);
        },
    },
    mounted(){
            axios.get('/api/chamados')
                 .then(data=>{
                     this.chamados = data.data;

                     for (let index = 0; index < this.chamados.length; index++) {
                         var taskObj = {
                            id: this.chamados[index].id,
                            title: this.chamados[index].titulo,
                            userAvatar: 'https://avatars.dicebear.com/api/miniavs/tame.svg?b=lightblue',
                            created_at: new Date(this.chamados[index].created_at),
                            timer: null,
                            stopwatch: 0
                        }
                        console.log(taskObj);
                        if (this.chamados[index].status == 'OP') {
                            this.columns[0].tasks.push(taskObj);
                        }
                        else if(this.chamados[index].status == 'PR'){
                            this.columns[1].tasks.push(taskObj);
                        }
                        else if(this.chamados[index].status == 'HM'){
                            this.columns[2].tasks.push(taskObj);
                        }
                        else if(this.chamados[index].status == 'OK'){
                            this.columns[3].tasks.push(taskObj);
                        }

                     }
                 });

            var cArr = document.cookie.split(';');
            for(var i=0;i < cArr.length;i++) {
            var cookie = cArr[i].split("=",2);
            cookie[0] = cookie[0].replace(/^\s+/,"");
            if (cookie[0] == 'usuario'){ this.usuario = cookie[1];}
            if (cookie[0] == 'depto'){ this.depto = cookie[1];}
            }

            if(this.depto =="null"){
                this.depto = "N/A";
            }
    },
    beforeUnmount() {
        this.columns.forEach(column => {
            column.tasks.forEach(task => {
                clearInterval(task.timer);
            });
        });
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

    .columns-list {
        &::-webkit-scrollbar {
            height: 12px;
            background: transparent;
        }

        &::-webkit-scrollbar-track {
            border-radius: 10px;
            background-clip: content-box;
        }

        &::-webkit-scrollbar-thumb {
            background: #bfc4ce;
            border-radius: 10px;
        }
    }

    .flip-list-move {
        transition: transform 0.5s;
    }
    .no-move {
        transition: transform 0s;
    }
    .ghost {
        opacity: 0.5;
        background: #f7fafc;
        border: 1px solid #4299e1;
    }

    .tasks-column {
        height: 650px;
        background: #f0f2f3;

        ul {
            height: 100%;
        }

        &::-webkit-scrollbar {
            width: 0;
            display: none;
        }

        &::-webkit-scrollbar-track {
            border-radius: 10px;
            background-clip: content-box;
        }

        &::-webkit-scrollbar-thumb {
            background: #bfc4ce;
            border-radius: 10px;
        }
    }
</style>
