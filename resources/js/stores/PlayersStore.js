    import { defineStore } from "pinia";
    export const useProductStore = defineStore("ProductStore", {
        state: () => {
            return {
                players: [],
            }


        },
        actions: {
            async fetchPlayers() {
                try {
                    const response = await fetch('/api/players');
                    const data = await response.json();
                    this.players = data.players;
                } catch (error) {
                    console.error('Error fetching players:', error);
                }
            },
        },

        // getters
    });
