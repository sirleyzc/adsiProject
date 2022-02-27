<template>
    <app-layout title="Recolección">
        
        <div v-if="tpAction == 0" class="py-8">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="flex lg:justify-between border-b-2 border-gray-500 pb-1 pt-5">
                    <h2 class="text-2xl text-gray-600 font-bold">Recolección</h2>
                    <div class="text-center flex-auto">
                    <input
                        type="text"
                        name="harvest"
                        placeholder="Buscar..."
                        class="
                        w-1/3 py-2 bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100
                        border-b-2 border-emerald-600
                        outline-none
                        focus:border-emerald-400
                        "
                    />
                    </div>

                    <div class="mb-4">
                    <button @click="openHarv"
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
                                <thead class="bg-emerald-500 text-white">
                                    <tr>
                                        <th class="p-3">Fecha</th>
                                        <th class="p-3 text-left">Empleado</th>
                                        <th class="p-3 text-left">Kilos</th>
                                        <th class="p-3 text-left">Total</th>
                                        <th class="p-3 text-left">Estado</th>
                                        <th class="p-3 text-left">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(object, index) in arrayData" :key="index" class="bg-emerald-500">
                                        <td class="p-3">{{ date }}</td>
                                        <td class="p-3">{{ object.idEmp }}</td>
                                        <td class="p-3">{{ object.kilos }}</td>
                                        <td class="p-3">{{ object.dayValue }}</td>
                                        <td v-if="object.edo == 0" class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-3">
                                            <i class="fas fa-circle text-red-400 mr-2"></i>Inactivo
                                        </td>
                                        <td v-else class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-3">
                                            <i class="fas fa-circle text-green-400 mr-2"></i>Activo
                                        </td>
                                        <td class="p-3">
                                            <a href="#" class="text-emerald-50 hover:text-emerald-800 mr-2">
                                                <i @click="visHarv" class="material-icons-outlined text-base" title="Ver">visibility</i>
                                            </a>
                                            <a href="#" class="text-emerald-50 hover:text-emerald-800 mx-2">
                                                <i @click="editHarv(object)" class="material-icons-outlined text-base" title="Actualizar">edit</i>
                                            </a>
                                            <a href="#" class="text-emerald-50 hover:text-emerald-800 ml-2">
                                                <i @click="delHarv(object)" class="material-icons-round text-base" title="Eliminar">delete_outline</i>
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

        <!-- component -->
        <link
            href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
            rel="stylesheet"/> 
        <!-- This is an example component -->
        <div v-if="tpAction == 1" class="font-sans p-8">
            <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
                <div class="relative lg:max-w-lg w-full">
                    <div class="card bg-emerald-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                    <div class="card bg-gray-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                    <div class="relative w-full rounded-3xl px-6 py-4 bg-gray-100 shadow-md">

                        <label v-text="title" for="" class="block mt-3 text-2xl text-gray-700 text-center font-semibold">
                                    
                        </label>
                        <form method="#" action="#" class="mt-10">
                            <div class="shadow overflow-hidden sm:rounded-md px-1 py-2 sm:p-3">
                                <div class="flex flex-col py-3">
                                    <select required class="block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg 
                                    hover:bg-green-100 focus:bg-green-100 focus:ring-0" name="employee" v-model="idEmp">
                                        <option value="" disabled>Seleccione un empleado</option>
                                        <option v-for="object in arrayEmp" :key="object.id" :value="object.id">{{object.namEmployee}}</option>
                                    </select>
                                </div> 

                                <div class="grid grid-cols-4 gap-4">
                                    <div col-span-6 sm:col-span-3>
                                        <input type="text" placeholder="Jornada" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl 
                                        shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0" v-model="timHarv">
                                    </div>
                                    <div col-span-6 sm:col-span-3>
                                        <input type="number" placeholder="Kilos" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl 
                                        shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0" v-model="kilos">
                                    </div>
                                    <div col-span-6 sm:col-span-3>
                                        <input type="text" placeholder="P. Kilo" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl 
                                        shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0" v-model="timVal">
                                    </div>
                                    <div col-span-6 sm:col-span-3>
                                        <button @click="addDetHarv"
                                        type="button"
                                        class="flex w-fit bg-gradient-to-r from-cyan-500 to-emerald-500 hover:from-cyan-600 hover:to-emerald-600 
                                        focus:outline-none text-white text-xl uppercase font-bold shadow-md rounded-lg mx-auto p-2">     
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
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-7 flex">
                                    <label for="enabled" class="inline-flex items-center w-full cursor-pointer">
                                        <input v-model="edo" id="enabled" type="checkbox" class="rounded border-gray-300 text-cyan-600 shadow-sm focus:border-cyan-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="activate" checked>
                                        <span class="ml-2 text-sm text-gray-600">
                                            Activar
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-span-4">
                                <div class="overflow-auto sm:overflow-visible">
                                    <table class="table table-auto w-full text-white border-separate space-y-6 text-md">
                                        <thead class="bg-emerald-500 text-white">
                                            <tr>
                                                <th class="p-3">Jornada</th>
                                                <th class="text-right p-3">Kilos</th>
                                                <th class="text-right p-3">Valor kilo</th>
                                                <th class="text-right p-3">Subtotal</th>
                                                <th class="text-right p-3 rounded-r-lg">Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr v-for="(object, index) in arrayData" :key="index" class="bg-emerald-500">
                                                <td class="p-3">{{ object.timHarv }}</td>
                                                <td class="text-right p-1">{{ object.kilos }}</td>
                                                <td class="text-right p-1">{{ object.timVal }}</td>
                                                <td class="text-right p-1">{{ object.kilos * object.timVal }}</td>
                                                <td class="p-1 rounded-r-lg">
                                                    <a href="#" class="text-emerald-50 hover:text-emerald-800 mx-2">
                                                        <i @click="editData(object)" class="material-icons-outlined text-base" title="Actualizar">edit</i>
                                                    </a>
                                                    <a href="#" class="text-emerald-50 hover:text-emerald-800 ml-2">
                                                        <i @click="delData(object)" class="material-icons-round text-base" title="Eliminar">delete_outline</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>

                                        <tfoot class="bg-emerald-500 text-white">
                                            <tr v-for="(object, index) in arrayData" :key="index">
                                                <td colspan="4" class="text-right uppercase p-2"><b>Total</b></td>
                                                <td class="text-right rounded-r-lg p-2">{{ object.dayValue + object.kilos * object.timVal }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="mt-7 mb-5">
                                <button class="bg-gradient-to-r from-cyan-500 to-emerald-500 w-full py-3 rounded-xl text-white 
                                shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x 
                                hover:scale-105"  v-if="button == false" @click="regHarv">
                                    Guardar
                                </button>
                                <button class="bg-gradient-to-r from-cyan-500 to-emerald-500 w-full py-3 rounded-xl text-white 
                                shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x 
                                hover:scale-105" v-else @click="updHarv">
                                    Actualizar
                                </button>
                            </div>    

                            <div class="mt-7 mb-5">
                                <button class="bg-gray-400 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none 
                                transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105" @click="cerrar">
                                    Cerrar
                                </button>
                            </div>   
                        </form> 
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
            idUser: 1,
            timHarv:"",
            kilos:"",
            timVal:"",
            value: "",
            date: "",
            edo: "",
            arrayData: [],
            arrayDataDet: [],
            arrayEmp: [],
            button: true,
        }
    },


    methods: {

        listData() {
            let me = this;
            var url = "/api/harvest/data";

            axios
            .get(url)
            .then(function (response) {
                var answer = response.data;
                me.arrayData = answer.harv;
                me.arrayDataDet = answer.harv;
            })
            .catch(function (error) {
                console.log(error);
            });
        },

       /*  listDataDet() {
            let me = this;
            var url = "/api/harvest/data";

            axios
            .get(url)
            .then(function (response) {
                var answer = response.data;
                me.arrayDataDet = answer.harv;
            })
            .catch(function (error) {
                console.log(error);
            });
        }, */

        getEmp() {
            let me = this;
            var url = "/api/employee/getemployee";
            axios
            .get(url)
            .then(function(response) {
                var answer = response.data;
                me.arrayEmp = answer.emp;
            }) 
            .catch(function (error) {
                console.log(error);
            });
        },
        
        openHarv() {
            this.title = "Registrar recolección";
            this.tpAction = 1;
            this.button = false;
            this.edo = true;
            this.clean();
        },
        addDetHarv() {
            this.arrayDataDet.push({timHarv:this.timHarv,kilos:this.kilos,timVal:this.timVal});
                 Swal.fire(
                    '¡Registro nuevo!',
                    'La recolección fue agregada con éxito, Recuerda presionar guardar cuando termines ...',
                    'info'
                    )
        },

        regHarv() {
            let me = this;
            var url = "/api/harvest/register";

            axios
            .post(url, {
                idEmp: this.idEmp,
                idUser:this.IdUser,
                value: this.value,  
                edo: this.edo,
                // timHarv: this.timHarv,
                // kilos: this.kilos,
                // timVal: this.timVal,
                data:this.arrayDataDet
            })
            .then(function (response) {
               // me.listData();
                Swal.fire(
                    '¡Registro nuevo!',
                    'La recolección fue registrado con éxito',
                    'info'
                    )
                me.close();
            })
            .catch(function (error) {
                console.log(error.message);
            });
        },

       editHarv(data = []) {
            this.tpAction = 1;
            this.id = data["id"];
            this.idEmp = data["idEmployee"];
            this.name = data["namEmployee"];
            this.phone = data["phone"];
            this.address = data["address"];
            this.date = data["datAdmission"];
            this.edo = data["edo"];
        },

        editData(data = []) {
            this.timHarv = data["timHarv"];
            this.kilos = data["kilos"];
            this.timVal = data["timVal"];
        },

        delData(data = []) {
            this.timHarv = "";
            this.kilos = "";
            this.timVal = "";
        },

        updHarv() {
            let me = this;
            var url = "/api/employee/update";
            axios
            .put(url, {
                id: this.id,
                idEmp: this.idEmp,
                name: this.name,
                phone: this.phone,
                address: this.address,
                datAdmission: this.date,
                edo: this.edo
            })
            .then(function (response) {
                me.listData();
                Swal.fire(
                    '¡Registro actualizado!',
                    'El empleado fue actualizado correctamente',
                    'info'
                    )
                me.close();
            })
            .catch(function (error) {
                console.error(error.message);
            });
        },

        delHarv(data = []) {
            this.tpAction = 2;
            this.id = data["id"];
            this.nameEmp = data["namEmployee"];
        },

        destroyHarv() {
            let me = this;
            var url = "/api/employee/delete";

            axios
            .post(url, {
                id: this.id,
            })
            .then(function (response) {
                me.listData();
                Swal.fire(
                    '¡Registro eliminado!',
                    'El empleado fue eliminado con éxito',
                    'info'
                    )
                me.close();
            })
            .catch(function (error) {
                console.log(error.message);
            });
        },

        clean() {
            this.idEmp = "";
            this.idUser = "";
            this.date = "";
            this.value = ""; 
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

	tr td:nth-child(n+6),
	tr th:nth-child(n+6) {
		border-radius: 0 .625rem .625rem 0;
	}

	tr td:nth-child(1),
	tr th:nth-child(1) {
		border-radius: .625rem 0 0 .625rem;
	}
</style>
