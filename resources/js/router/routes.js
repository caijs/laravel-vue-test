function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'welcome', component: page('welcome.vue') },

  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },

  { path: '/home', name: 'home', component: page('home.vue') },
  { path: '/team/register', name: 'add_team', component: page('team/addTeam.vue') },
  { path: '/player/register/:id', name: 'add_player', component: page('player/addPlayer.vue') },
  { path: '/player/update/:teamId/:playerId', name: 'update_player', component: page('player/updatePlayer.vue') },
  { path: '/team/:id', name: 'players', component: page('team/team.vue') },
  { path: '*', component: page('errors/404.vue') }
]
