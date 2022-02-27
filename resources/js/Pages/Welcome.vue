<template>
    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen bg-emerald-50 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                Inicio
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                    Iniciar Sesión
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Registrar
                </Link>
            </template>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 text-emerald-400 font-bold text-3xl sm:justify-start sm:pt-0">
                <span style="color: gray">Finca</span>ElMirador
            </div>

            <!-- component -->
            <div class="max-w-md mx-auto">
                <div class="divide-y divide-gray-400/50">
                    <img src="{{ $image->url_path }}" alt="">
                    <div class="py-8 text-base flex justify-between">
                        <p class="text-xl font-serif text-gray-900 opacity-75">Elige un buen café</p>
                        <div class="relative cursor-pointer gap-4 flex justify-center">
                            <div class="w-8 h-8 bg-[#14532d] transition-all rounded-full block ring-[#14532d] hover:ring-2 ring-offset-1 " ></div>
                            <div class="w-8 h-8 bg-[#15803d] transition-all rounded-full block ring-[#15803d] hover:ring-2 ring-offset-1 " ></div>
                            <div class="w-8 h-8 bg-[#fbbf24] transition-all rounded-full block ring-[#fbbf24] hover:ring-2 ring-offset-1 " ></div>
                            <div class="w-8 h-8 bg-[#dc2626] transition-all rounded-full block ring-[#dc2626] hover:ring-2 ring-offset-1 " ></div>
                            <div class="w-8 h-8 bg-[#881337] transition-all rounded-full block ring-[#881337] hover:ring-2 ring-2 ring-offset-1 " ></div>
                        </div>
                    </div>
                <div class="divide-y divide-gray-400/50"></div>
                </div>
            </div>


            <div class="mt-8 bg-emerald-600 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="color-white" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path fill="white" d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"/></svg>
                            <div class="ml-4 text-lg leading-7 text-white font-semibold">Producción</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-white dark:text-gray-400 text-sm">
                                El Mirador es una finca de producción cafetera. Cuenta con empleados que recolectan el café, para luego ser vendido al comercio.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path fill="white" d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z"/></svg>
                            <div class="ml-4 text-lg leading-7 text-white font-semibold">Vereda VillaMaria</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-white dark:text-gray-400 text-sm">
                                La finca El Mirador se encuentra ubicada en la Vereda VillaMaria. Región donde se produce un café de calidad.
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>

            
        </div>
    </div>
</template>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            Link,
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    })
</script>
