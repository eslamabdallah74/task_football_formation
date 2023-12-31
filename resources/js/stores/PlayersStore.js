import { defineStore } from "pinia";
export const useProductStore = defineStore("ProductStore", {
    state: () => {
        return {
            players: [],
        }


    },
    actions: {
        async addPlayer(playerData) {
            try {
                const response = await fetch('/api/players', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(playerData),
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    return Promise.reject(errorData);

                }

                await this.fetchPlayers();
            } catch (error) {
                console.error('Error adding player:', error);
            }
        },

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
