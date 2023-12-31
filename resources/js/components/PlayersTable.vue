<template>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Number</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="player in players" :key="player.id">
                <td>{{ player.name }}</td>
                <td>{{ player.position }}</td>
                <td>{{ player.number }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { useProductStore } from '../stores/PlayersStore';

export default {
    data() {
        return {
            players: [],
        };
    },
    mounted() {
        const store = useProductStore();
        this.fetchPlayers(store);
    },
    methods: {
        async fetchPlayers(store) {
            await store.fetchPlayers();
            this.players = store.players;
        },
    },
};
</script>


<style scoped>
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
</style>
