<template>
    <div class="container">
        <div class="row">
            <div v-if="goalkeeper" class="col-12">
                <!-- Goalkeeper -->
                <div class="player-box col-12 my-4 goalkeeper">
                    <span class="player-name">{{ goalkeeper.name }}</span>
                    <span class="player-number">{{ goalkeeper.number }}</span>

                </div>
            </div>
            <!-- Defenders -->
            <div v-for="player in defenders" :key="player.id" :class="getColClass(defenders.length)">
                <div class="player-box defenders my-5">
                    <span class="player-name">{{ getName(player.name) }}</span>
                    <span class="player-number">{{ player.number }}</span>

                </div>
            </div>
            <!-- Midfielders -->
            <div v-for="player in midfielders" :key="player.id" :class="getColClass(midfielders.length)">
                <div class="player-box midfielders my-5">
                    <span class="player-name">{{ getName(player.name) }}</span>
                    <span class="player-number">{{ player.number }}</span>

                </div>
            </div>
            <!-- forward -->
            <div v-for="player in forward" :key="player.id" :class="getColClass(forward.length)">
                <div class="player-box forward my-5">
                    <span class="player-name">{{ getName(player.name) }}</span>
                    <span class="player-number">{{ player.number }}</span>

                </div>
            </div>

        </div>
    </div>
</template>


<script>
export default {
    props: {
        players: Array,
        fieldWidth: Number,
        fieldHeight: Number,
    },
    computed: {
        forward() {
            return this.players.filter((player) => player.position === 'forward');
        },
        midfielders() {
            return this.players.filter((player) => player.position === 'midfielder');
        },
        defenders() {
            return this.players.filter((player) => player.position === 'defender');
        },
        goalkeeper() {
            return {
                number: '1',
                name: 'El Hadry',
            };
        },

    },
    methods: {
        getColClass(playerCount) {
            // Dynamically calculate the column class based on the number of players
            const columnSizes = [12, 6, 4, 3];
            const defaultSize = 3; // Default to col-md-3 if more than 4 players
            if (playerCount === 5) return `col-md-2`;
            return `col-md-${playerCount <= columnSizes.length ? columnSizes[playerCount - 1] : defaultSize}`;
        },
        getName(fullName) {
            const parts = fullName.split(' ');
            return parts.length > 0 ? parts[0] : fullName;
        },
    },
};
</script>
<style scoped>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.row {
    display: flex;
    flex-wrap: wrap;
}

.line {
    margin-bottom: 16px;
    /* Adjust as needed */
}

.player-box {
    position: relative;
    display: grid;
    place-items: center;
    border-radius: 4px;
    color: white;
    height: 70px;
}

.goalkeeper {
    width: 100%;
    background-color: black;
    /* Blue */
}

.defenders {
    width: 100%;
    background-color: #2196F3;
    /* Blue */
}

.midfielders {
    width: 100%;
    background-color: #4CAF50;
    /* Light Green */
}

.forward {
    width: 100%;
    background-color: #FFC0CB;
    /* Light Red */
}

.player-number {
    border: 1px solid black;
    padding: 4px;
    border-radius: 4px;
}
</style>
