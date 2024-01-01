<template>
    <div>
        <h1 class="text-center"> Players </h1>
        <div class="container">
            <form @submit.prevent="addPlayer" class="form-container">
                <div class="mb-3">
                    <label for="playerName" class="form-label">Player Name:</label>
                    <input v-model="playerName" type="text" class="form-control" id="playerName" required />
                </div>
                <div class="mb-3">
                    <label for="playerPosition" class="form-label">Player Position:</label>
                    <select v-model="playerPosition" class="form-select" id="playerPosition" required>
                        <option value="" disabled>Select Player Position</option>
                        <option value="forward">Forward</option>
                        <option value="midfielder">Midfielder</option>
                        <option value="defender">Defender</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="playerNumber" class="form-label">Player Number:</label>
                    <input v-model="playerNumber" type="text" class="form-control" id="playerNumber" required />
                </div>
                <!-- Display validation errors -->
                <div v-if="validationErrors.length > 0" class="alert alert-danger my-4" role="alert">
                    <ul>
                        <li v-for="error in validationErrors" :key="error">
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <button type="submit" class="btn btn-primary">Add Player</button>
            </form>

        </div>

        <hr />

        <h2 class="text-center">All Players</h2>
        <PlayersTable :players="players" />
    </div>
</template>

<script>
import PlayersTable from '../components/PlayersTable.vue';
import { usePlayersStore } from '../stores/PlayersStore';

export default {
    components: {
        PlayersTable,
    },
    data() {
        return {
            playerName: '',
            playerPosition: '',
            playerNumber: '',
            validationErrors: [],
        };
    },
    methods: {
        async addPlayer() {
            const store = usePlayersStore();
            const playerData = {
                name: this.playerName,
                position: this.playerPosition,
                number: this.playerNumber,
            };

            try {
                await store.addPlayer(playerData);
                this.playerName = '';
                this.playerPosition = '';
                this.playerNumber = '';
                this.validationErrors = [];

            } catch (error) {
                if (error.errors) {
                    this.validationErrors = Object.values(error.errors).flat();
                }
            }
        },

    },
};
</script>

<style scoped>
.text-center {
    text-align: center;
}

.container {
    max-width: 800px;
    margin: 0 auto;
}

.form-container {
    text-align: left;
    margin-top: 20px;
}
</style>
