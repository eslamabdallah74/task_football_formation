import { defineStore } from "pinia";
export const usePlayersStore = defineStore("ProductStore", {
    state: () => {
        return {
            players: [],
        }
    },
    getters: {
        getPlayers(state) {
            return state.players
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
        async updatePlayer(playerId, playerData) {
            try {
                const response = await fetch(`/api/players/${playerId}`, {
                    method: 'PUT',
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
            } catch (error) {
                console.error('Error editing player:', error);
            }
        },


        async deletePlayer(playerId) {
            try {
                const response = await fetch(`/api/players/${playerId}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json'
                    },
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    return Promise.reject(errorData);
                }

            } catch (error) {
                console.error('Error deleting player:', error);
            }
        },
        async fetchPlayers() {
            try {
                const response = await fetch('/api/players');
                const data = await response.json();
                this.players = data.players;
                console.log('fetch is working');
            } catch (error) {
                console.error('Error fetching players:', error);
            }
        },
    },

});
