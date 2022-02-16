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
                                <p class="font-semibold text-gray-600 text-center text-3xl">Recolección</p>
                                </div>
                                <div class="flex flex-col px-4 py-5">
                                    <p class="mb-2 h-5 font-semibold text-xl ml-1 text-gray-700">Empleado</p>
                                    <select  type="text" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg 
                                    hover:bg-green-100 focus:bg-green-100 focus:ring-0" >
                                        <option value="0">Luis Alberto Pedraza</option>
                                        <option value="1">Pedro Jose Marín</option>
                                    </select>
                                    </div> 
                                    <div class="flex flex-col px-4 py-5">
                                        <label class="font-semibold text-xl ml-1 text-gray-700">Jornada</label>
                                        <select type="text" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0" >
                                            <option value="0">Mañana</option>
                                            <option value="1">Tarde</option>
                                        </select>
                                    </div>
                                            <div class="flex flex-col px-4 py-5">
                                                <label class="font-semibold text-xl  text-gray-700">Kilos recolectados</label>
                                                <input type="number" placeholder="kg" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0">
                                            </div>
                                            <div class="flex flex-col px-4 py-5">
                                            <label class="font-semibold text-xl text-gray-700">Fecha de recolección</label>
                                            <input type="date" placeholder="0" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0" >
                                            </div>

                                            <div class="mt-7 mb-5">
                                            <button class="bg-gradient-to-r from-cyan-500 to-emerald-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                                Guardar
                                            </button>
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
