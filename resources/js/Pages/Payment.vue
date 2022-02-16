<template>
    <app-layout title="Payment">

           <!-- component -->
            <!-- This is an example component -->
            <div class="font-sans p-8">
                <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
                    <div class="relative lg:max-w-lg w-full">
                        <div class="card bg-emerald-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                        <div class="card bg-gray-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                        <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                            <div class="flex flex-row justify-between p-6 border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
                                <p class="font-semibold text-gray-800 text-3xl">Pagos</p>
                                <div class=" flex justify-end text-center">
                                    <p class="mb-1 font-semibold text-xl mr-2 mt-2 text-gray-700">Fecha</p>
                                    <input type="date" class="flex justify-end p-3 mb-5 w-fit bg-white border border-gray-200 outline-none rounded shadow-sm h4"/>
                                </div> 
                                </div>
                                <div class="flex flex-col px-4 py-5">
                                    <p class="mb-2 h-5 font-semibold text-xl ml-1 text-gray-700">Empleado</p>
                                    <select  type="text" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg 
                                    hover:bg-green-100 focus:bg-green-100 focus:ring-0" >
                                        <option value="0">Luis Alberto Pedraza</option>
                                        <option value="1">Pedro Jose Marín</option>
                                    </select> 
                                    <div class="flex flex-col sm:flex-row items-center mb-5 sm:space-x-5">
                                        <div class="w-full sm:w-1/2">
                                        <label class="font-semibold text-xl ml-1 text-gray-700">Jornada</label>
                                        <select type="text" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0" >
                                            <option value="0">Mañana</option>
                                            <option value="1">Tarde</option>
                                        </select>
                                        </div>
                                        <div class="mb-4 mt-6 flex space-x-4 m-10  ">
                                            <div class="w-full sm:w-1/2">
                                                <label class="font-semibold text-xl  text-gray-700">Precio</label>
                                                <input type="number" placeholder="$0.00" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0">
                                            </div>
                                            <div class="w-full sm:w-1/2">
                                            <label class="font-semibold text-xl text-gray-700">Cantidad</label>
                                            <input type="number" placeholder="0" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0" >
                                            </div>

                                                <div class="mb-4 mt-6 flex space-x-4 m-10"> 
                                                    <button type="button" class="flex w-fit bg-gradient-to-r from-cyan-500 to-emerald-500 
                                                    hover:from-cyan-600 hover:to-emerald-600 focus:outline-none text-white text-xl uppercase 
                                                    font-bold shadow-md rounded-lg mx-auto p-2"
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
                                                    </div>
                                                    </button>
                                                </div>    
                                        </div>
                                    </div>
                                    <hr />
                      
                                    <table class="table text-white border-separate space-y-6 text-sm">
                                        <thead class="bg-emerald-600 text-white">
                                            <tr>
                                                <th class="p-3">Fecha</th>
                                                <th class="p-3 text-left">Jornada</th>
                                                <th class="p-3 text-left">Precio</th>
                                                <th class="p-3 text-left">Kilos</th>
                                                <th class="p-3 text-left">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-emerald-500">
                                                <td class="p-3">Lunes, 2022-02-16</td>
                                                <td class="p-3">Mañana</td>
                                                <td class="p-3">600</td>
                                                <td class="p-3">100</td>
                                                <td class="p-3">$60.000</td>
                                            </tr>
                                            <tr>
                                                <td class="bg-emerald 600" colspan="4" align="center">TOTAL</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class=" flex justify-end text-center">
                                    <button type="button" class="bg-gradient-to-r from-cyan-500 to-emerald-500 hover:from-cyan-600 hover:to-emerald-600 
                                focus:outline-none text-white text-md font-bold shadow-md rounded-lg p-3 ml mb-4 mr-4">Guardar</button>
                                </div>  
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
            nameCust: "",
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
