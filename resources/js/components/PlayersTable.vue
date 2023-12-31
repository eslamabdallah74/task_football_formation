<template>
  <div class="container">
    <div v-if="loading" class="loader">Loading...</div>
    <table v-if="players.length > 0" class="table">
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
    <div v-else>
      <p>No players available. Please add more players.</p>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { useProductStore } from '../stores/PlayersStore';

export default {
  data() {
    return {
      players: [],
      loading: true,
    };
  },
  mounted() {
    const store = useProductStore();
    this.fetchPlayers(store);
  },
  methods: {
    async fetchPlayers(store) {
      try {
        await store.fetchPlayers();
        this.players = store.players;
      } finally {
        // Set loading to false regardless of the outcome
        this.loading = false;
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
</style>
