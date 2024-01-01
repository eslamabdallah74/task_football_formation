import { defineStore } from "pinia";
export const useLineUpStore = defineStore("LineUpStore", {
    state: () => {
        return {
            lineups: [],
            selectedLineup: '',
        }

    },
    actions: {
        async fetchLineUps() {
            try {
                const response = await fetch('/api/lineups');
                const data = await response.json();
                this.lineups = data.lineups;
            } catch (error) {
                console.error('Error fetching lineups:', error);
            }
        },
        setSelectedLineup(selectedLineup) {
            this.selectedLineup = selectedLineup;
        },
    },

    // getters
});
