<template>
    <div id="landing-page">
        <section id="parallax-landing" class="parallax-window" data-parallax="scroll"
                 :data-image-src="randomBackground">
            <div class="container">
                <section id="search-character">
                    <h1>WoW Completion for everyone</h1>
                    <p class="subtext">Pick a character using the form below</p>
                    <Form class="search-form" :action="searchCharacterUrl" method="post">
                        <input autocomplete="off" type="hidden">
                        <input type="hidden" :value="server.region" name="region">
                        <input type="hidden" :value="server.name" name="serverName">
                        <select v-model="server" @change="filterByServer" class="input select" name="server"
                                id="server">
                            <option :value="{region: null,name: null}" selected>--
                            </option>
                            <optgroup v-for="(serverGroup, region) in servers" :label="region">
                                <option v-for="server in serverGroup" :value="server">{{ server.name }}</option>
                            </optgroup>
                        </select>
                        <div @mouseover="usernameListVisible = true" class="server-choice">
                            <input @input="filterByUsername" @focus="usernameListVisible = true"
                                   @blur="usernameListVisible = false"
                                   v-model="username" type="text"
                                   :class="{dropdown: usernameListVisible}" class="input text server-input"
                                   placeholder="Username" name="username" autocomplete="off">
                            <div v-show="usernameListVisible" class="server-list">
                                <p v-if="!characters.length">No results</p>
                                <p v-for="character in characters" @click="bindUsername(character)">
                                    {{ character.username }}</p>
                            </div>
                        </div>
                        <button type="submit" class="btn">Go !</button>
                    </Form>
                </section>
            </div>
        </section>
        <section class="section static news">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nibh nulla, tristique in fringilla et,
                dapibus tristique massa. Praesent tincidunt justo nec neque faucibus imperdiet. Sed pulvinar ex
                ante, a
                pharetra nisi commodo at. Nunc sit amet tristique felis. Interdum et malesuada fames ac ante ipsum
                primis in faucibus. Suspendisse hendrerit ipsum vestibulum, sagittis nunc eget, imperdiet mi. Morbi
                imperdiet volutpat malesuada. In hac habitasse platea dictumst. Ut et semper ante, in tristique
                libero.
            </p>
            <br>
        </section>
    </div>
</template>

<script>
export default {
    props: [
        'searchCharacterUrl',
        'serversProp',
        'charactersProp',
    ],
    data()
    {
        return {
            backgrounds: [
                'images/ardenweald-01.jpg',
                'images/bastion-01.jpg',
                'images/revendreth-01.jpg',
                'images/maldraxxus-01.jpg'
            ],
            characters: {},
            servers: {},
            serverListVisible: false,
            usernameListVisible: false,
            server: {
                region: null,
                name: null
            },
            username: '',
        }
    },
    mounted()
    {
        this.servers = JSON.parse(this.serversProp)
        this.characters = JSON.parse(this.charactersProp)
    },
    computed: {
        randomBackground: function ()
        {
            let random = Math.floor(Math.random() * this.backgrounds.length)
            return this.backgrounds[random]
        },
    },
    methods: {
        bindUsername: function (character)
        {
            this.username = character.username
            this.serverListVisible = false
            this.usernameListVisible = false
        },
        filterByServer: function ()
        {
            if (this.server.name) {
                axios.get(`http://local.wow-completionist:3030/api/filter-server/${this.server.region}/${this.server.name}`)
                    .then(response =>
                    {
                        console.log(response.data)
                        this.characters = response.data
                    })
            }
        },
        filterByUsername: function ()
        {
            if (this.server.name && this.username !== '') {
                axios.get(`http://local.wow-completionist:3030/api/filter-username/${this.server.region}/${this.server.name}/${this.username}`)
                    .then(response =>
                    {
                        console.log(response.data)
                        this.characters = response.data
                    })
            }
        }
    },
}
</script>
