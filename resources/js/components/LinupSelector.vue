<template>
    <div class="linup-selector">
        <label for="lineupselect">Select Linup:</label>
        <select id="lineupselect" v-model="selectedLinup" @change="onLinupChange">
            <option disabled value="">Please select linup</option>\
            <option v-for="linup in lineups" :key="linup.id" :value="linup.id">{{ linup.plan }}</option>
        </select>

    </div>
</template>
  
<script>
import { useLineUpStore } from '../stores/LineUpStore';

const plans = useLineUpStore();

export default {
    data() {
        return {
            selectedLinup: '',
            lineups: []
        };
    },
    mounted() {
        this.fetchPlans(plans);
    },
    methods: {
        async fetchPlans(plans) {
            try {
                await plans.fetchLineUps();
                this.lineups = plans.lineups;
                console.log(this.lineups);

            } finally {
                this.loading = false;
            }
        },
    },

};
</script>
  
<style scoped>
.linup-selector {
    margin-top: 20px;
}

#lineupselect {
    width: 200px;
}
</style>
  