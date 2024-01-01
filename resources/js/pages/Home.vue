<template>
    <div class="home-container my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 md-9 field-section" style="position: relative;">
                    <img src="/public/images/football_field.jpg" alt="Football Field" class="img-fluid field" />

                    <FormationDisplay :players="filteredPlayers" />
                </div>

                <div class="col-md-6 md-3">
                    <div class="m-2">
                        <LinupSelector />
                    </div>

                    <PlayersTable :home="true" />

                </div>

            </div>
        </div>
    </div>
</template>

<script>
import LinupSelector from '../components/LinupSelector.vue';
import PlayersTable from '../components/PlayersTable.vue';
import FormationDisplay from '../components/FormationDisplay.vue';
import { useLineUpStore } from '../stores/LineUpStore';
import { usePlayersStore } from '../stores/PlayersStore';

export default {
    data() {
        return {
            filteredPlayers: [],
        };
    },
    components: {
        LinupSelector,
        PlayersTable,
        FormationDisplay,
    },
    computed: {
        selectedLineup() {
            return useLineUpStore().selectedLineup;
        },
    },
    watch: {
        selectedLineup(newSelectedLineup, oldSelectedLineup) {
            this.filterPlayers(newSelectedLineup);
        },
    },
    methods: {
        filterPlayers(selectedLineup) {
            const store = usePlayersStore();
            const [defendersCount, midfieldersCount, attackersCount] = selectedLineup.split('-').map(Number);

            const defenders = store.players.filter(player => player.position === 'defender');
            const midfielders = store.players.filter(player => player.position === 'midfielder');
            const attackers = store.players.filter(player => player.position === 'forward');

            if (defenders.length < defendersCount || midfielders.length < midfieldersCount || attackers.length < attackersCount) {
                alert("Current players can't fit this formation, Please add more players to the");
                this.filteredPlayers = [];
                return;
            }

            const filteredDefenders = defenders.slice(0, defendersCount);
            const filteredMidfielders = midfielders.slice(0, midfieldersCount);
            const filteredAttackers = attackers.slice(0, attackersCount);

            this.filteredPlayers = [...filteredDefenders, ...filteredMidfielders, ...filteredAttackers];
        },

    },
};
</script>

<style>
.field {
    position: absolute;
    width: 100%;
    height: auto;
}
</style>
