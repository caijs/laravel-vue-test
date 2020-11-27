<template>
  <div class="row">
    <div class="col-lg-8 m-auto">
      <card :title="$t('add_player')">
        <form @submit.prevent="register" @keydown="form.onKeydown($event)">
          <!-- First Name -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('first_name') }}</label>
            <div class="col-md-7">
              <input v-model="form.first_name" :class="{ 'is-invalid': form.errors.has('first_name') }" class="form-control" type="text" name="first_name">
              <has-error :form="form" field="first_name" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('last_name') }}</label>
            <div class="col-md-7">
              <input v-model="form.last_name" :class="{ 'is-invalid': form.errors.has('last_name') }" class="form-control" type="text" name="last_name">
              <has-error :form="form" field="last_name" />
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-7 offset-md-3 d-flex">
              <!-- Submit Button -->
              <v-button :loading="form.busy">
                {{ $t('register') }}
              </v-button>
            </div>
          </div>
        </form>
      </card>
    </div>
  </div>
</template>

<script>
import Form from 'vform'
// import axios from 'axios'

export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('add_player') }
  },

  data: () => ({
    form: new Form({
      first_name: '',
      last_name: ''
    })
  }),

  methods: {
    async register () {
      // Register the player.
      const { data } = await this.form.post(`/api/teams/${this.$route.params.id}/players`)
      if (data) this.form.reset()
    }
  }
}
</script>
