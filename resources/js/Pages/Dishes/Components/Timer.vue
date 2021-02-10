<template>
    <span v-if="ready" class="text-green-500">¡Preparado!</span>
    <span v-else>{{ minutes }} minutos {{ seconds }} segundos</span>
</template>

<script>
    import dayjs from 'dayjs'
    import duration from 'dayjs/plugin/duration'

    dayjs.extend(duration)

    export default {
        props: {
            dishes: {
                type: Array,
            }
        },
        data() {
            return {
                interval:null,
                minutes: 0,
                seconds: 0,
                ready: 0,
                duration: 0,
            }
        },
        props:{
            date: {
                required:true
            }
        },
        mounted() {
            this.interval = setInterval(() => {
                this.updateDiffs();
            }, 1000);

            this.updateDiffs();
        },
        destroyed() {
            clearInterval(this.interval);
        },
        methods: {
            updateDiffs() {

                this.duration = dayjs.duration(dayjs(this.date).diff(dayjs()));

                this.minutes = this.duration.minutes();
                this.seconds = this.duration.seconds();

                this.ready = this.minutes <= 0 && this.seconds <= 0 ? 1 : 0;
                this.ready == 1 ? clearInterval(this.interval) : '';
            }
        }
    }
</script>
