<template>
    <app-layout title="Payment">

        <div v-if="tpAction == 0" class="py-8">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="flex lg:justify-between border-b-2 border-gray-700 pb-1 pt-5">
                    <h2 class="text-2xl text-gray-600 font-bold">Pagos</h2>
                    <div class="text-center flex-auto">
                    <input
                        type="text"
                        name="name"
                        placeholder="Search..."
                        class="
                        w-1/3
                        py-2
                        border-b-2 border-blue-600
                        outline-none
                        focus:border-yellow-400
                        "
                    />
                    </div>

                    <div class="mb-4">
                    <button @click="openPay"
                        type="button"
                        class="flex w-fit bg-gradient-to-r from-cyan-500 to-emerald-500 hover:from-cyan-600 hover:to-emerald-600 
                        focus:outline-none text-white text-xl uppercase font-bold shadow-md rounded-lg mx-auto p-2"
                    >
                        <div class="flex sm:flex-cols-12 gap-2">
                            <div class="col-span-1">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                    />
                                </svg>
                            </div>
                            <div class="col-span-2 pt-1">Nuevo</div>
                        </div>
                    </button>
                </div>
            </div>

                <!-- component -->
                <link
                    href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
                    rel="stylesheet"/>
                <link
                    rel="stylesheet"
                    href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css"/>
                <link
                    rel="stylesheet"
                    href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"/>
                <div class="flex items-center justify-center min-h-full bg-emerald-50">
                    <div class="col-span-12">
                        <div class="overflow-auto lg:overflow-visible">
                            <table class="table text-white border-separate space-y-6 text-sm">
                                <thead class="bg-emerald-600 text-white">
                                    <tr>
                                        <th class="p-3">Id. Empleado</th>
                                        <th class="p-3 text-left">Valor</th>
                                        <th class="p-3 text-left">Fecha</th>
                                        <th class="p-3 text-left">Estado</th>
                                        <th class="p-3 text-left">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(object, index) in arrayData" :key="index" class="bg-emerald-500">
                                        <td class="p-3">{{ object.idEmp }}</td>
                                        <td class="p-3">{{ object.payValue }}</td>
                                        <td class="p-3">{{ object.payDate }}</td>
                                        <td v-if="object.edo == 0" class="p-3">
                                            <i class="fas fa-circle text-red-400 mr-2"></i>Inactivo
                                        </td>
                                        <td v-else class="p-3">
                                            <i class="fas fa-circle text-green-400 mr-2"></i>Activo
                                        </td>
                                        <!-- border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap -->
                                        <td class="p-3">
                                            <a href="#" class="text-emerald-50 hover:text-emerald-800 mr-2">
                                                <i @click="visPay" class="material-icons-outlined text-base" title="Ver">visibility</i>
                                            </a>
                                            <a href="#" class="text-emerald-50 hover:text-emerald-800 mx-2">
                                                <i @click="editPay(object)" class="material-icons-outlined text-base" title="Actualizar">edit</i>
                                            </a>
                                            <a href="#" class="text-emerald-50 hover:text-emerald-800 ml-2">
                                                <i @click="delPay(object)" class="material-icons-round text-base" title="Eliminar">delete_outline</i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="tpAction == 1">
            <!-- component -->
            <!-- This is an example component -->
            <div class="font-sans">
                        <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
                            <div class="relative sm:max-w-sm w-full">
                                <div class="card bg-emerald-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                                <div class="card bg-gray-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                                <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                                    <label v-text="title" for="" class="block mt-3 text-lg text-gray-600 text-center font-semibold">
                                    
                                    </label>
                                    <form method="#" action="#" class="mt-10">
                                                    
                                        <div class="mt-7">                
                                            <input v-model="idEmployee" type="text" placeholder="Identificación del empleado" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0">                           
                                        </div>

                                        <div class="mt-7">                
                                            <input v-for="object in arrayEmp" :key="object.id" 
                                            placeholder="Identificación del empleado" 
                                            class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 
                                            focus:bg-green-100 focus:ring-0" v-model="idEmp">                           
                                            {{object.namEmployee}}
                                        </div>

                                        <div class="mt-7">                
                                            <input v-model="value" type="text" placeholder="Valor a pagar" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0">                           
                                        </div>

                                        <div class="mt-7">                
                                            <input v-model="date" type="date" placeholder="Fecha" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0">                           
                                        </div>

                                        <div class="mt-7 flex">
                                            <label for="enabled" class="inline-flex items-center w-full cursor-pointer">
                                                <input v-model="edo" id="enabled" type="checkbox" class="rounded border-gray-300 text-cyan-600 shadow-sm focus:border-cyan-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="activate" checked>
                                                <span class="ml-2 text-sm text-gray-600">
                                                    Activar
                                                </span>
                                            </label>
                                        </div>
                                                                
                                        <div class="mt-7">
                                            <button v-if="button == false" @click="regPay" class="bg-emerald-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                                Guardar
                                            </button>
                                            <button v-else @click="updPay" class="bg-emerald-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                                Actualizar
                                            </button>
                                        </div>                                        
                            
                                        <div class="mt-7">
                                            <button @click="cerrar" class="bg-gray-400 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                                Cancelar
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div v-if="tpAction==2">
            <!-- component -->
            <div class="flex flex-col space-y-4 min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-emerald-50">
            <div class="flex flex-col p-8 bg-emerald-500 shadow-md hover:shodow-lg rounded-2xl">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-16 h-16 rounded-2xl p-3 border border-emerald-500 text-cyan-400 bg-emerald-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="flex flex-col ml-3">
                            <div class="font-medium leading-none text-white">¿Deseas eliminar este registro {{nameCustom}}?</div>
                            <p class="text-sm text-white leading-none mt-1">Recuerda que este proceso no es reversible
                            </p>
                        </div>
                    </div>
                    <button @click="destroyCustom" class="flex-no-shrink bg-emerald-900 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-emerald-900 text-white rounded-full">Si</button>
                    <button @click="close" class="flex-no-shrink bg-emerald-900 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-emerald-900 text-white rounded-full">No</button>

                </div>
            </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import axios from "axios";
import Swal from 'sweetalert2'

export default defineComponent({
    components: {
        AppLayout,
    },

    data() {
        return {
            tpAction: 0,
            id: 0,
            title: "",
            idEmp: "",
            idEmployee: "",
            nameCustom: "",
            value: "",
            date: "",
            edo: "",
            arrayData: [],
            arrayEmp: [],
            button: true,
        }
    },


    methods: {

        listData() {
            let me = this;
            var url = "/api/payment/data";

            axios
            .get(url)
            .then(function (response) {
                var answer = response.data;
                me.arrayData = answer.pay;
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        getEmp() {
            let me = this;
            var url = "/api/employee/getemployee";
            axios.get(url, function (response) {
                var answer = response.data;
                me.arrayEmp = answer.emp ;
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        openPay() {
            this.title = "Registrar Pago";
            this.tpAction = 1;
            this.button = false;
            this.edo = true;
            this.clean();
        },
        
        regPay() {
            let me = this;
            var url = "/api/payment/register";

            axios
            .post(url, {
                idEmp: this.idEmployee,
                value: this.value,
                date: this.date,   
                edo: this.edo
            })
            .then(function (response) {
                me.listData();
                Swal.fire(
                    '¡Pago nuevo!',
                    'El pago fue registrado con éxito',
                    'info'
                    )
                me.close();
            })
            .catch(function (error) {
                console.log(error.message);
            });
        },

        visPay() {
            Swal.fire(
            'Pago',
            )
        },

        editPay(data = []) {
            this.title = "Actualizar Pago"; 
            this.tpAction = 1;
            this.id = data["id"];
            this.idEmployee = data["idEmp"];
            this.value = data["payValue"];
            this.date = data["payDate"];
            this.edo = data["edo"];
        },

        updPay() {
            let me = this;
            var url = "/api/payment/update";
            axios
            .put(url, {
                id: this.id,
                idEmp: this.idEmployee,                
                value: this.value,
                date: this.date,
                edo: this.edo
            })
            .then(function (response) {
                me.listData();
                Swal.fire(
                    '¡Registro actualizado!',
                    'El pago fue actualizado correctamente',
                    'info'
                    )
                me.close();
            })
            .catch(function (error) {
                console.error(error.message);
            });
        },

        delPay(data = []) {
            this.tpAction = 2;
            this.id = data["id"];
            this.nameCustom = data["name"];
        },

        destroyPay() {
            let me = this;
            var url = "/api/payment/delete";

            axios
            .post(url, {
                id: this.id,
            })
            .then(function (response) {
                me.listData();
                Swal.fire(
                    '¡Registro eliminado!',
                    'El pago fue eliminado correctamente',
                    'info'
                    )
                me.close();
            })
            .catch(function (error) {
                console.log(error.message);
            });
        },

        clean() {
            this.idEmployee = "";
            this.value = "";
            this.date = ""; 
            this.edo = "";
        },

        close() {
            this.tpAction = 0;
        }
    },

    mounted() {
        this.listData();
        this.getEmp();
    },
});
</script>

<style>
	.table {
		border-spacing: 0 15px;
	}

	i {
		font-size: 1rem !important;
	}

	.table tr {
		border-radius: 20px;
	}

	tr td:nth-child(n+5),
	tr th:nth-child(n+5) {
		border-radius: 0 .625rem .625rem 0;
	}

	tr td:nth-child(1),
	tr th:nth-child(1) {
		border-radius: .625rem 0 0 .625rem;
	}
</style>
