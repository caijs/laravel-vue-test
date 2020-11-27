<template>
  <card :title="$t('players')">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="player in team.players" :key="player.id">
          <td>{{ player.id }}</td>
          <td>{{ player.first_name }}</td>
          <td>{{ player.last_name }}</td>
          <td>{{ player.created_at | formatDate }}</td>
          <td>{{ player.updated_at | formatDate }}</td>
          <td>
            <button type="button" class="btn btn-sm btn-primary" @click="updatePlayer(player.id)">
              <i class="fa fa-plus-square" />
              {{ $t('update') }}
            </button>
          </td>
        </tr>
        <tr>
          <td>
            <button type="button" class="btn btn-sm btn-success" @click="addPlayer">
              <i class="fa fa-plus-square" />
              {{ $t('add_player') }}
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </card>
</template>

<script>
import axios from 'axios'

export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('players') }
  },

  data () {
    return {
      team: {}
    }
  },

  created () {
    this.loadPlayers()
  },

  methods: {
    loadPlayers () {
      axios.get(`/api/teams/${this.$route.params.id}`).then(({ data }) => (this.team = data.data))
    },

    updatePlayer (id) {
      this.$router.push({ name: 'update_player', params: { teamId: this.$route.params.id, playerId: id } })
    },

    addPlayer () {
      this.$router.push({ name: 'add_player', params: { id: this.$route.params.id } });
    }
  }
}
</script>
