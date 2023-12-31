<template>
    <div>
        <h1>Add Players Page</h1>
        <p>This is the page to add players.</p>
        <form @submit.prevent="addPlayer">
            <label for="playerName">Player Name:</label>
            <input v-model="playerName" type="text" id="playerName" required />
            <button type="submit">Add Player</button>
        </form>

        <hr />

        <h2>All Players</h2>
        <PlayersTable :players="players" />

    </div>
</template>

<script>
import PlayersTable from '../components/PlayersTable.vue';

export default {
  components: {
    PlayersTable,
  },
};
</script>
