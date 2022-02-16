<template>
    <app-layout title="Pagos">

        <div class="overflow-x-auto mb-4">
            <div class="flex justify-center mt-2 items-center antialiased">
                <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
                    <div class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
                        <p class="font-semibold text-gray-800 text-3xl">Pagos</p>
                            <div class=" flex justify-end text-center">
                                    <p class="mb-1 font-semibold text-xl mr-2 text-gray-700">Fecha</p>
                                    <input type="date" class="flex justify-end p-5 mb-5 bg-white border border-gray-200 outline-none rounded shadow-sm h-12"/>
                            </div> 
                    </div>
                        <div class="flex flex-col px-4 py-5 bg-gray-50">
                            <p class="mb-2 h-5 font-semibold text-xl ml-1 text-gray-700">Empleado</p>
                            <select  type="text" class="mt-1 block w-full border-none bg-emerald-50 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:ring-0" >
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
                       <!--  <div class="flex items-center justify-center min-h-full bg-emerald-50">
                    <div class="col-span-12">
                        <div class="overflow-auto lg:overflow-visible"> -->
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
                        <!-- </div>
                    </div>
                </div> -->
                        <!-- <table class="content-start table-automin-w-min w-full table-fixed rounded-t-lg mb-3  bg-gray-200 text-gray-800">
                                <tr class="text-left border-b-2 border-gray-300">
                                    <th class="px-4 py-3">Fecha</th>
                                    <th class="px-4 py-3">Jornada</th>
                                    <th class="px-4 py-3">Kilos</th>
                                    <th class="px-4 py-3">Kilos</th>
                                    <th class="px-4 py-3">Cantidad</th>
                                <th class="px-4 py-3">Subtotal</th>
                                </tr>
                
                            <tr class="bg-gray-100 border-b border-gray-200">
                                <td class="px-4 py-3">123</td>
                                <td class="px-4 py-3">Televisor</td>
                            <td class="px-4 py-3">999000</td>
                                <td class="px-4 py-3">1</td>
                                <td class="px-4 py-3">999000</td>
                            </tr>
                            <tr>
                                <td class="text-xl text-bold px-4 py-3" colspan="4" align="center">TOTAL</td>
                            </tr>

                        </table> -->
                        
                        </div>
                        <div class=" flex justify-end text-center">
                            <button type="button" class="bg-gradient-to-r from-cyan-500 to-emerald-500 hover:from-cyan-600 hover:to-emerald-600 
                        focus:outline-none text-white text-md font-bold shadow-md rounded-lg p-3 ml mb-4 mr-4">Guardar</button>
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
})
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

