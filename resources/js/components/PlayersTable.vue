<template>
    <div class="container-fluid">
        <div v-if="loading" class="loader">Loading...</div>
        <table v-if="store.players.length > 0" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Number</th>
                    <th v-if="!home">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(player, key) in store.players" :key="player.id">
                    <td>{{ key + 1 }}</td>
                    <td>
                        <template v-if="editingPlayerId === player.id">
                            <input v-model="editedPlayer.name" type="text" required />
                        </template>
                        <template v-else>
                            {{ player.name }}
                        </template>
                    </td>
                    <td>
                        <template v-if="editingPlayerId === player.id">
                            <select v-model="editedPlayer.position" required>
                                <option value="forward">Forward</option>
                                <option value="midfielder">Midfielder</option>
                                <option value="defender">Defender</option>
                            </select>
                        </template>
                        <template v-else>
                            {{ player.position }}
                        </template>
                    </td>
                    <td>
                        <template v-if="editingPlayerId === player.id">
                            <input v-model="editedPlayer.number" type="text" required />
                        </template>
                        <template v-else>
                            {{ player.number }}
                        </template>
                    </td>
                    <template v-if="!home">
                        <td>
                            <template v-if="editingPlayerId === player.id">
                                <button @click="savePlayer(player.id)" class="btn btn-success btn-sm">Save</button>
                            </template>
                            <template v-else>
                                <button @click="editPlayer(player)" class="btn btn-primary btn-sm">Edit</button>
                            </template>
                            <button @click="deletePlayer(player.id)" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </template>

                </tr>
            </tbody>
        </table>
        <div v-else>
            <p>No players available. Please add more players.</p>
        </div>
    </div>
</template>

<script>
import { usePlayersStore } from '../stores/PlayersStore';

const store = usePlayersStore();

export default {
    props: {
        home: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            players: [],
            loading: true,
            editingPlayerId: null,
            editedPlayer: {
                name: '',
                position: '',
                number: '',
            },
            editedPlayerErrors: {},
            store
        };
    },
    mounted() {
        store.fetchPlayers()
        this.loading = false;
    },
    methods: {
        editPlayer(player) {
            this.editingPlayerId = player.id;
            this.editedPlayer = { ...player };
        },
        async savePlayer(playerId) {
            try {
                await store.updatePlayer(playerId, this.editedPlayer);
                await this.fetchPlayers(store);
                this.cancelEdit();
            } catch (error) {
                if (error.errors) {
                    this.editedPlayerErrors = Object.values(error.errors).flat();
                    window.confirm(this.editedPlayerErrors)
                } else {
                    console.error('Error saving player:', error);
                }
            }
        },

        cancelEdit() {
            this.editingPlayerId = null;
            this.editedPlayer = { name: '', position: '', number: '' };
        },
        async deletePlayer(playerId) {
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
