<template>
  <card :title="$t('teams')">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Number of Players</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="team in teams" :key="team.id">
          <td>{{ team.id }}</td>
          <td>{{ team.name }}</td>
          <td>{{ team.playerCounts }}</td>
          <td>{{ team.created_at | formatDate }}</td>
          <td>{{ team.updated_at | formatDate }}</td>
          <td>
            <button type="button" class="btn btn-sm btn-primary" @click="viewPlayers(team.id)">
              <i class="fa fa-plus-square" />
              View Players
            </button>
          </td>
        </tr>
        <tr>
          <td>
            <button type="button" class="btn btn-sm btn-success" @click="addTeam">
              <i class="fa fa-plus-square" />
              {{ $t('add_team') }}
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
    return { title: this.$t('teams') }
  },

  data () {
    return {
      teams: []
    }
  },

  created () {
    this.loadTeams()
  },

  methods: {
    loadTeams () {
      axios.get('/api/teams').then(({ data }) => (this.teams = data));
    },

    viewPlayers (id) {
      this.$router.push({ name: 'players', params: { id } })
    },

    addTeam () {
      this.$router.push({ name: 'add_team' })
    }
  }
}
</script>
