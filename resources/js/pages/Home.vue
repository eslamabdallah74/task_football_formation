<template>
    <div class="home-container my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 md-9 field-section">
                    <img src="/public/images/football_field.jpg" alt="Football Field" class="img-fluid" />
                </div>

                <div class="col-md-6 md-3">
                    <div class="mb-4">
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

export default {
    components: {
        LinupSelector,
        PlayersTable,
    },
};
</script>
  