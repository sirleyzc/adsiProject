<template>
    <Link :href="'/'">
        <div class="flex justify-center pt-8 text-emerald-400 font-bold text-3xl sm:justify-start sm:pt-0">
            <span style="color: gray">Finca</span>ElMirador
        </div>
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
