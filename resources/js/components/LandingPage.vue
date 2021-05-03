<template>
    <div id="landing-page">
        <section id="parallax-landing" class="parallax-window" data-parallax="scroll"
                 :data-image-src="randomBackground">
            <div class="container">
                <section id="search-character">
                    <h1>WoW Completion for everyone</h1>
                    <p class="subtext">Pick a character using the form below</p>
                    <Form class="search-form" :action="searchCharacterUrl" method="post">
                        <select v-model="region" class="input select" name="region" id="region">
                            <option value="null" selected>--</option>
                            <option value="US">US</option>
                            <option value="EU">EU</option>
                            <option value="TW">TW</option>
                            <option value="KR">KR</option>
                            <option value="CN">CN</option>
                        </select>
                        <div @mouseover="serverListVisible = true" class="server-choice">
                            <input @focus="serverListVisible = true" @blur="serverListVisible = false"
                                   v-model="server" type="text"
                                   :class="{dropdown: serverListVisible}" class="input text server-input"
                                   placeholder="Server" name="server">
                            <div v-show="serverListVisible" class="server-list">
                                <p v-if="!listServers.length">No results</p>
                                <p v-for="server in listServers" @click="bindServer(server)">
                                    {{ server.region }}-{{ server.server }}</p>
                            </div>
                        </div>
                        <div @mouseover="usernameListVisible = true" class="server-choice">
                            <input @focus="usernameListVisible = true" @blur="usernameListVisible = false"
                                   v-model="username" type="text"
                                   :class="{dropdown: usernameListVisible}" class="input text server-input"
                                   placeholder="Username" name="username">
                            <div v-show="usernameListVisible" class="server-list">
                                <p v-if="!filteredCharacters.length">No results</p>
                                <p v-for="character in filteredCharacters" @click="bindUsername(character)">
                                    {{ character.region }}-{{ character.server }} {{ character.username }}</p>
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
        'searchCharacterUrl'
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
            characters: [
                {
                    username: 'Iraldin',
                    server: 'Ul',
                    region: 'EU'
                },
                {
                    username: 'Iraldin',
                    server: 'Ulda',
                    region: 'EU'
                },
                {
                    username: 'Iraldin',
                    server: 'Uldama',
                    region: 'US'
                },
                {
                    username: 'Iraldin',
                    server: 'Uldaman',
                    region: 'EU'
                },
                {
                    username: 'Lincce',
                    server: 'Drek\'thar',
                    region: 'EU'
                },
                {
                    username: 'Nil',
                    server: 'Drek\'thar',
                    region: 'EU'
                }
            ],
            serverListVisible: false,
            usernameListVisible: false,
            region: null,
            server: 'U',
            username: 'I',
        }
    },
    computed: {
        randomBackground: function ()
        {
            let random = Math.floor(Math.random() * this.backgrounds.length)
            return this.backgrounds[random]
        },
        filteredCharacters: function ()
        {
            return this.characters.filter(character =>
            {
                let region = !this.region || character.region === this.region
                let server = character.server.startsWith(this.server)
                let username = character.username.startsWith(this.username)
                return region && server && username
            }).slice(0, 5)
        },
        listServers: function ()
        {
            let charactersSet = new Set()
            let characters = this.filteredCharacters
            for (let i = 0; i < characters.length; i++)
                charactersSet.add({
                    region: characters[i].region,
                    server: characters[i].server
                })

            return [...charactersSet].sort((a, b) => a.server.localeCompare(b.server))
        },
    },
    methods: {
        bindServer: function (server)
        {
            this.region = server.region
            this.server = server.server
            this.serverListVisible = false
            this.usernameListVisible = false
        },
        bindUsername: function (character)
        {
            this.region = character.region
            this.server = character.server
            this.username = character.username
            this.serverListVisible = false
            this.usernameListVisible = false
        }
    },
}
</script>
