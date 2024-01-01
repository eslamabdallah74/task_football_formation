<template>
    <div class="linup-selector">
        <label for="lineupselect">Select Formation:⚽ </label>
        <select id="lineupselect" v-model="selectedLineup" @change="onLineupChange">
            <option disabled value="">Please select linup</option>\
            <option v-for="linup in lineups" :key="linup.id" :value="linup.plan">{{ linup.plan }}</option>
        </select>
    </div>
</template>
  
<script>
import { useLineUpStore } from '../stores/LineUpStore';

const plans = useLineUpStore();

export default {
    data() {
        return {
            selectedLineup: '',
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

            } finally {
                this.loading = false;
            }
        },
        onLineupChange() {
            const store = useLineUpStore();
            store.setSelectedLineup(this.selectedLineup);
        },
    }
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
  