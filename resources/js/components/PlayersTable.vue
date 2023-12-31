<template>
    <div class="container">
        <div v-if="loading" class="loader">Loading...</div>
        <table v-if="players.length > 0" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(player, key) in players" :key="player.id">
                    <td>{{ key + 1 }}</td>
                    <td>{{ player.name }}</td>
                    <td>{{ player.position }}</td>
                    <td>{{ player.number }}</td>
                    <td>
                        <button @click="editPlayer(player)" class="btn btn-primary btn-sm">Edit</button>
                        <button @click="deletePlayer(player.id)" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-else>
            <p>No players available. Please add more players.</p>
        </div>
    </div>
</template>

<script>
import { useProductStore } from '../stores/PlayersStore';

const store = useProductStore();

export default {
    data() {
        return {
            players: [],
            loading: true,
        };
    },
    mounted() {
        this.fetchPlayers(store);
    },
    methods: {
        async fetchPlayers(store) {
            try {
                await store.fetchPlayers();
                this.players = store.players;
            } finally {
                this.loading = false;
            }
        },
        async editPlayer(player) {
            // Implement your logic for editing a player
            console.log('Editing player:', player);
        },
        async deletePlayer(playerId) {
            const store = useProductStore();

            const confirmed = window.confirm('Are you sure you want to delete this player?');

            if (confirmed) {
                try {
                    await store.deletePlayer(playerId);
                    await this.fetchPlayers(store);
                } catch (error) {
                    console.error('Error deleting player:', error);
                }
            }
        },

    },
};
</script>

<style scoped>
.container {
    max-width: 800px;
    margin: 0 auto;
}

.loader {
    text-align: center;
    padding: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th,
.table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
}

/* Style for action buttons */
.table button {
    margin-right: 5px;
    cursor: pointer;
    padding: 5px 10px;
}
</style>
